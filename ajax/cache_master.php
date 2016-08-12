<?php
//code not used
$json = 'json.json';

function json_exists(){
    global $db,$sql;
    if(true) {
        return true;
    } else {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return false;
    }
}