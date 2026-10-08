<?php
    require_once EXCEPTIONS_PATH . 'exceptions.php';

    define('SETTINGS_COOKIE_NAME', 'user_settings');

    define('DEFAULT_SETTINGS', readJsonFile(ROM_PATH . 'default_settings.json'));

    define('ALLOWED_SETTINGS', [
        'theme',
        'language'
    ]);

    define('ALLOWED_VALUES', [
        'theme'    => ['light', 'dark'],
        'language' => ['en-GB', 'pt-BR']
    ]);
    
    function getUserSettings(){
        $settings = DEFAULT_SETTINGS;

        $cookieJson = $_COOKIE[SETTINGS_COOKIE_NAME] ?? null;
        if($cookieJson === null) return $settings;

        try{
            $overrides = decodeJson($cookieJson);
        } catch (JsonHandlerException $e){
            return $settings;
        }

        if(!is_array($overrides)) return $settings;

        foreach(ALLOWED_SETTINGS as $setting){
            if(isset($overrides[$setting]) && in_array($overrides[$setting], ALLOWED_VALUES[$setting], true)) {
                $settings[$setting] = $overrides[$setting];
            }
        }

        return $settings;
    }

    function setUserSettings($key, $value) {
        if(!in_array($key, ALLOWED_SETTINGS, true)) {
            throw new SettingsHandlerException("Unknown setting: " . $key);
        }

        if(!in_array($value, ALLOWED_VALUES[$key], true)) {
            throw new SettingsHandlerException("Invalid value for " . $key . ":" . $value);
        }

        $currentSettings = getUserSettings();
        $currentSettings[$key] = $value;
        $encodedSettings = encodeJson($currentSettings);
    
        setcookie(
            SETTINGS_COOKIE_NAME,
            $encodedSettings,
            time() + 60 * 60 * 24 * 365,
            '/'
        );

        return true;
    }

    function clearUserSettings() {
        setcookie(
            SETTINGS_COOKIE_NAME,
            '',
            time() - 1,
            '/'
        );
    }
?>