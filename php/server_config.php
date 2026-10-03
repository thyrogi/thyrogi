<?php
    // ---------- DYNAMIC BASE URL (Works everywhere!) ----------
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    
    // Get the folder path (e.g., '/soul_games' or '' if at root)
    $script_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    
    // Build the full base URL
    define('BASE_URL', $protocol . $host . $script_dir);
    
    // ---------- ASSET PATHS (For the browser) ----------
    define('ASSETS_URL', BASE_URL . '/assets/');
    define('CSS_URL', ASSETS_URL . 'css/');
    define('JS_URL', ASSETS_URL . 'js/');
    
    // ---------- SERVER FILE PATHS (For PHP) ----------
    // ROOT_PATH points to the folder where THIS config file is located
    // Since this file is in /includes/, dirname(__DIR__) goes up one level to /soul_games/
    define('ROOT_PATH', dirname(__DIR__));
    
    define('INCLUDES_PATH', ROOT_PATH . '/includes/');
    define('DATA_PATH', ROOT_PATH . '/data/');
    define('OFFICIAL_DATA_PATH', DATA_PATH . 'official_data/');
    define('USER_DATA_PATH', DATA_PATH . 'user_data/');
    define('SAVED_GAMES_PATH', USER_DATA_PATH . 'saved_games/');
    define('SIM_PRESETS_PATH', USER_DATA_PATH . 'simulation_presets/');
?>