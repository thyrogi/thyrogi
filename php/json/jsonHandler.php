<?php
    // READ AND WRITE FUNCTIONS
    function readJsonFile($jsonPath){
        // reads from a json file
    }

    function writeJsonFile($jsonPath, $data){
        // writes to a json file
    }
    
    // DECODE AND ENCODE FUNCTIONS
    function decodeJson($json){
        if (!isset($json)) die("!!! jsonHandler.php says: JSON string doesn't exist");

        if(json_validate($json)) json_decode($json, true);
 
        die("Invalid JSON string.");
    }

    function encodeJson($json){
        if (!isset($json)) die("!!! jsonHandler.php says: JSON string doesn't exist");

        if(json_validate($json)) return json_encode($json);

        die("Invalid JSON string.");
    }

    // ERROR HANDLING FUNCTIONS
    function getJsonError() {

    }
?>