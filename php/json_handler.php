<?php
    require_once EXCEPTIONS_PATH . 'exceptions.php';

    // READ AND WRITE FUNCTIONS
    function readJsonFile($file_path){
        $data = file_get_contents($file_path);

        if ($data === false) {
            throw new JsonHandlerException("Couldn't read from file " . $file_path);
        }
        
        try { 
            return decodeJson($data);
        } catch(JsonHandlerException $e) {
            throw new JsonHandlerException("Invalid JSON in " . $file_path, 0, $e);
        }
    }

    function writeJsonFile($file_path, $data){
        try { 
            $encoded = encodeJson($data);
        } catch(JsonHandlerException $e) {
            throw new JsonHandlerException("Encoding failed for " . $file_path, 0, $e);
        }

        $result = file_put_contents($file_path, $encoded, LOCK_EX);

        if($result === false){
            throw new JsonHandlerException("Failed to write data into " . $file_path);
        }
        
        return true;
    }
    
    // DECODE AND ENCODE FUNCTIONS
    function decodeJson($json){
        try {
            return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch(JsonException $e) {
            throw new JsonHandlerException($e->getMessage(), $e->getCode(), $e);
        }
    }

    function encodeJson($data){
        try { 
            return json_encode($data, JSON_THROW_ON_ERROR);
        } catch(JsonException $e) {
            throw new JsonHandlerException($e->getMessage(), $e->getCode(), $e);
        }
    }
?>