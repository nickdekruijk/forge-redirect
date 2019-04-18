<?php
    // Initialize composer autoload and Dotenv package
    require __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
    $dotenv->load();

    //
    $domain = rtrim(getenv('REDIRECT_TO'), '/');
    $append = filter_var(getenv('REDIRECT_WITH_REQUEST_URI'), FILTER_VALIDATE_BOOLEAN);

    $new_url = rtrim($domain, '/');
    if ($append) {
        $new_url .= getenv('REQUEST_URI');
    }

    // Permanent 301 redirection
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . $new_url);
