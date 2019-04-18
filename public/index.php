<?php
    header('Content-type: text/plain');

    // Initialize composer autoload and Dotenv package
    require __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
    $dotenv->load();

    //
    $domain = rtrim(getenv('REDIRECT_TO'), '/');
    $append = filter_var(getenv('REDIRECT_WITH_REQUEST_URI'), FILTER_VALIDATE_BOOLEAN);
    $request = getenv('REQUEST_URI');

    $new_url = rtrim($domain, '/');
    if ($append) {
        $new_url .= getenv('REQUEST_URI');
    }

    header('Location: ' . $new_url);
