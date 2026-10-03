<?php
    // ---------- DYNAMIC BASE URL (Works everywhere!) ----------
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    
    // Get the folder path
    $script_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    
    // Build the full base URL
    define('BASE_URL', $protocol . $host . $script_dir);
    
    // ---------- ASSET PATHS ----------
    define('ASSETS_URL', BASE_URL . '/assets/');
    define('CSS_URL', ASSETS_URL . 'css/');
    define('JS_URL', ASSETS_URL . 'js/');

    
    define('ROM_PATH' , ASSETS_URL . /rom)
    
    // ---------- SERVER FILE PATHS (For PHP) ----------
    // ROOT_PATH points to the folder where THIS config file is located
    // Since this file is in /includes/, dirname(__DIR__) goes up one level to /soul_games/
    define('ROOT_PATH', dirname(__DIR__));
?>