<?php
spl_autoload_register(function ($class) {
    // Define las rutas donde pueden estar las clases
    $paths = [
        __DIR__ . '/controladores/',
        __DIR__ . '/servicios/',
        __DIR__ . '/repositorios/',
        __DIR__ . '/modelos/',
        __DIR__ . '/config/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
?>