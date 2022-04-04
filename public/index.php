<?php
    // Initialize composer autoload and Dotenv package
    require __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..');
    $dotenv->load();

    // Get the .env variables
    $domain = rtrim(getenv('REDIRECT_TO'), '/');
    $append = filter_var(getenv('REDIRECT_WITH_REQUEST_URI'), FILTER_VALIDATE_BOOLEAN);

    // Build the new url to redirect to
    $new_url = rtrim($domain, '/');
    if ($append) {
        $new_url .= getenv('REQUEST_URI');
    }

    // Permanent 301 redirection
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . $new_url);
