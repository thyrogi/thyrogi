<?php
    class JsonHandlerException extends RuntimeException {} 

    // READ AND WRITE FUNCTIONS
    function readJsonFile($jsonPath){
        $data = file_get_contents($jsonPath);

        if ($data === false) {
            throw new JsonHandlerException("Couldn't read from file " . $jsonPath);
        }
        
        try { 
            return decodeJson($data);
        } catch(JsonHandlerException $e) {
            throw new JsonHandlerException("Invalid JSON in " . $jsonPath, 0, $e);
        }
    }

    function writeJsonFile($jsonPath, $data){
        try { 
            $encoded = encodeJson($data);
        } catch(JsonHandlerException $e) {
            throw new JsonHandlerException("Encoding failed for " . $jsonPath, 0, $e);
        }

        $result = file_put_contents($jsonPath, $encoded, LOCK_EX);

        if($result === false){
            throw new JsonHandlerException("Failed to write data into " . $jsonPath);
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