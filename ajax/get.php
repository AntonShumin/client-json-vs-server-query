<?php
require_once ('../inc/config/connection.php');
require_once ('cache_master.php');

$type = $_GET['type'];
$cache = $_GET['cache'];
$sql = '';
$stmt = '';
$result = 'nothing here';



if($type == 'empty'){
    $sql = 'SELECT * FROM clientservertest';
} else if($type == 'five') {
    $sql =  'SELECT * FROM markers';
} else if($type == 'five_dist') {
    $sql =
    "SELECT *, 
    ( 6371 * acos( cos( radians(51.2192) ) * cos( radians( lat ) ) * cos( radians( lng ) 
    - radians(4.4029) ) + sin( radians(51.2192) ) * sin( radians( lat ) ) ) ) AS distance 
    FROM markers
    HAVING distance < 5;
    ";
}

try{
    if($cache && file_exists('something.json') ){
        $json =
        echo json_encode(json_decode(file_get_contents('something.json'),true ));
    } else {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        if($cache) {
            file_put_contents('something.json',json_encode($result));
        }

    }

} catch (PDOException $e) {
    echo $e->getMessage();
}
