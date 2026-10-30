<?php
// docker/patch-php81.php

echo "Applying PHP 8.1 compatibility patches...\n";

// 1. Patch HandleExceptions.php to ignore deprecations
$handleExceptionsFile = __DIR__ . '/../vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php';
if (file_exists($handleExceptionsFile)) {
    $content = file_get_contents($handleExceptionsFile);
    $content = str_replace(
        'error_reporting(-1);',
        'error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);',
        $content
    );
    $content = str_replace(
        "public function handleError(\$level, \$message, \$file = '', \$line = 0, \$context = [])\n    {",
        "public function handleError(\$level, \$message, \$file = '', \$line = 0, \$context = [])\n    {\n        if (in_array(\$level, [E_DEPRECATED, E_USER_DEPRECATED])) { return; }",
        $content
    );
    $content = str_replace(
        "public function handleError(\$level, \$message, \$file = '', \$line = 0, \$context = [])\r\n    {",
        "public function handleError(\$level, \$message, \$file = '', \$line = 0, \$context = [])\r\n    {\r\n        if (in_array(\$level, [E_DEPRECATED, E_USER_DEPRECATED])) { return; }",
        $content
    );
    file_put_contents($handleExceptionsFile, $content);
    echo "Patched HandleExceptions.php\n";
}

// 2. Helper to add #[\ReturnTypeWillChange] before methods
function patchReturnTypeWillChange($filePath, $methods) {
    if (!file_exists($filePath)) {
        return;
    }
    $content = file_get_contents($filePath);
    foreach ($methods as $method) {
        $pattern = '/(\n\s*)(public\s+function\s+' . preg_quote($method, '/') . '\s*\()/';
        $replacement = '$1#[\ReturnTypeWillChange]$1$2';
        if (!str_contains($content, '#[\ReturnTypeWillChange]') || !preg_match('/#\[\\\\ReturnTypeWillChange\]\s+public\s+function\s+' . preg_quote($method, '/') . '/', $content)) {
            $content = preg_replace($pattern, $replacement, $content);
        }
    }
    file_put_contents($filePath, $content);
    echo "Patched " . basename($filePath) . "\n";
}

$base = __DIR__ . '/../vendor/laravel/framework/src/Illuminate/';
patchReturnTypeWillChange($base . 'Collections/Collection.php', ['offsetExists', 'offsetGet', 'offsetSet', 'offsetUnset', 'count', 'getIterator', 'jsonSerialize']);
patchReturnTypeWillChange($base . 'Support/Collection.php', ['offsetExists', 'offsetGet', 'offsetSet', 'offsetUnset', 'count', 'getIterator', 'jsonSerialize']);
patchReturnTypeWillChange($base . 'Container/Container.php', ['offsetExists', 'offsetGet', 'offsetSet', 'offsetUnset']);
patchReturnTypeWillChange($base . 'Config/Repository.php', ['offsetExists', 'offsetGet', 'offsetSet', 'offsetUnset']);
patchReturnTypeWillChange($base . 'Routing/RouteCollection.php', ['count', 'getIterator']);
patchReturnTypeWillChange($base . 'Http/Request.php', ['offsetExists', 'offsetGet', 'offsetSet', 'offsetUnset']);
patchReturnTypeWillChange($base . 'Session/SessionManager.php', ['count', 'getIterator', 'offsetExists', 'offsetGet', 'offsetSet', 'offsetUnset']);

echo "PHP 8.1 compatibility patches applied successfully!\n";
