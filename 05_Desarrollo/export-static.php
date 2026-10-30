<?php
declare(strict_types=1);

// Ejecutar desde cualquier carpeta: php -n 05_Desarrollo/export-static.php
$source = __DIR__ . '/web';
$destination = dirname(__DIR__) . '/docs';
if (!is_dir($destination)) mkdir($destination, 0777, true);

foreach (glob($source . '/*.php') as $file) {
    $process = proc_open([PHP_BINARY, '-n', $file], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
    if (!is_resource($process)) throw new RuntimeException('No se pudo ejecutar PHP.');
    $html = stream_get_contents($pipes[1]);
    $errors = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    if (proc_close($process) !== 0) throw new RuntimeException($errors);
    $html = preg_replace('/(href=["\'])([^"\']*)\.php(?=[#?"\'])/', '$1$2.html', $html);
    file_put_contents($destination . '/' . basename($file, '.php') . '.html', $html);
}

$assets = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($source . '/assets', FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);
foreach ($assets as $asset) {
    $target = $destination . '/assets/' . substr($asset->getPathname(), strlen($source . '/assets/'));
    if ($asset->isDir()) {
        if (!is_dir($target)) mkdir($target, 0777, true);
    } else {
        copy($asset->getPathname(), $target);
    }
}
file_put_contents($destination . '/.nojekyll', '');
echo "Copia HTML generada en docs/\n";
