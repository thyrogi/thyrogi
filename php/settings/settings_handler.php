<?php
    define('DEFAULT_SETTINGS', readJsonFile(ROM_PATH . 'default_settings.json'));

    define('ALLOWED_VALUES', [
        'theme'    => ['light', 'dark'],
        'language' => ['en-uk', 'pt-br']
    ]);
    
    define('ALLOWED_THEMES', [
        'light',
        'dark'
    ]);

    define('ALLOWED_LANGUAGES', [
        'en-uk',
        'pt-br'
    ]);
    
    function getUserSettings(){
        $settings = DEFAULT_SETTINGS;

        $cookieJson = $_COOKIE['user_settings'] ?? null;
        if($cookieJson === null) return $settings;

        try{
            $overrides = decodeJson($cookieJson);
        } catch (JsonHandlerException $e){
            return $settings;
        }

        if(!is_array($overrides)) return $settings;

        foreach(ALLOWED_VALUES as $setting){
            if(isset($overrides[$setting]) && in_array($overrides[$setting], ALLOWED_VALUES[$setting], true)) {
                $settings[$setting] = $overrides[$setting];
            }
        }

        return $settings;
    }

    // setUserSettings(key, value)
    function setUserSettings($key, $value) {

    }

    // clearUserSettings()

?>