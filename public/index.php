<?php
    require_once __DIR__ . '/../php/server_config.php';
    require_once PHP_PATH . 'json_handler.php';

    require_once SETTINGS_PATH . 'settings_handler.php';

    $settings = getUserSettings();
?>

<!DOCTYPE html>
<html lang="<?= $settings['language'] ?>" data-theme="<?= $settings['theme'] ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            // change the title depending on the language
        ?>
        <title></title>
        <link rel="stylesheet" href="<?= CSS_URL ?>main_style.css">
    </head>
    <body>
        <?php require_once '../assets/page_pieces/header.php'; ?>

        oi body

        <?php require_once '../assets/page_pieces/footer.php'; ?>
    </body>
</html>