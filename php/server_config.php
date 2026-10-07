<?php
    // ============================================================
    //  SERVER CONFIGURATION
    //  Defines file-path and URL constants used across the site.
    //  Should be required once, near the top of every page.
    //  Expected location: thyrogi/php/server_config.php
    // ============================================================

    // ---------- SERVER FILE PATHS (used by PHP) ----------
    // dirname(__DIR__) goes up from thyrogi/php/ to thyrogi/
    define('ROOT_PATH', dirname(__DIR__) . '/');

    define('ASSETS_PATH', ROOT_PATH . 'assets/');
    define('AUDIO_PATH',  ASSETS_PATH . 'audio/');
    define('CSS_PATH',    ASSETS_PATH . 'css/');
    define('FONTS_PATH',  ASSETS_PATH . 'fonts/');
    define('IMAGE_PATH',  ASSETS_PATH . 'img/');
    define('PIECE_PATH',  ASSETS_PATH . 'page_pieces/');
    define('ROM_PATH',    ASSETS_PATH . 'rom/');
    define('LANG_PATH',   ROM_PATH . 'languages/');
    define('RWM_PATH',    ASSETS_PATH . 'rwm/');

    define('JS_PATH',   ROOT_PATH . 'js/');
    define('PHP_PATH',  ROOT_PATH . 'php/');

    define('SETTINGS_PATH', PHP_PATH . 'settings/');

    define('PUBLIC_PATH',        ROOT_PATH . 'public/');
    define('PROJECT_PAGES_PATH', PUBLIC_PATH . 'project_pages/');

    // ---------- URLs (used by the browser) ----------
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        ? 'https://'
        : 'http://';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    // Work out the URL subfolder the site lives in, e.g. "/thyrogi"
    // (or "" if the site is at the domain root). We do this by comparing
    // the filesystem path of the project against the web server's
    // document root. If this ever returns the wrong thing in your
    // environment, replace the if/else below with a hardcoded string.
    $docRoot  = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/\\');
    $rootPath = rtrim(ROOT_PATH, '/\\');

    $docRoot  = str_replace('\\', '/', $docRoot);
    $rootPath = str_replace('\\', '/', $rootPath);

    if ($docRoot !== '' && strpos($rootPath, $docRoot) === 0) {
        $basePath = substr($rootPath, strlen($docRoot)); // e.g. "/thyrogi"
    } else {
        $basePath = '';
    }

    define('BASE_URL', $protocol . $host . $basePath);

    define('ASSETS_URL', BASE_URL . '/assets/');
    define('AUDIO_URL',  ASSETS_URL . 'audio/');
    define('CSS_URL',    ASSETS_URL . 'css/');
    define('FONTS_URL',  ASSETS_URL . 'fonts/');
    define('IMG_URL',    ASSETS_URL . 'img/');
    define('PIECE_URL',  ASSETS_URL . 'page_pieces/');
    define('ROM_URL',    ASSETS_URL . 'rom/');
    define('RWM_URL',    ASSETS_URL . 'rwm/');

    define('JS_URL',            BASE_URL . '/js/');
    define('PUBLIC_URL',        BASE_URL . '/public/');
    define('PROJECT_PAGES_URL', PUBLIC_URL .'project_pages/');
?>