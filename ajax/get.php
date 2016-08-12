<?php
use phpFastCache\CacheManager;
require_once ('../inc/config/connection.php');


// Include phpFastCache autoloader
require __DIR__ . '/../inc/autoload.php';

$type = false;
if( isset($_GET['type']) ) {
    $type = $_GET['type'];
}
$cache = false;
if (isset($_GET['cache'])) {
    $cache = $_GET['cache'];
}
$sql = '';
$stmt = '';
$result = 'nothing here';



if ($type == 'empty') {
    $sql = 'SELECT * FROM clientservertest';
} else if ($type == 'five') {
    $sql = 'SELECT * FROM markers';
} else if ($type == 'five_dist') {
    $sql = "SELECT *, 
    ( 6371 * acos( cos( radians(51.2192) ) * cos( radians( lat ) ) * cos( radians( lng ) 
    - radians(4.4029) ) + sin( radians(51.2192) ) * sin( radians( lat ) ) ) ) AS distance 
    FROM markers
    HAVING distance < 5;
    ";
}

try {

    $file ='something.json';
    if ($cache && file_exists($file)) {
        echo json_encode(array("data" => json_decode(file_get_contents('something.json'))));
    } else {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array("data" => $result));
        if ($cache) {
            file_put_contents('something.json', json_encode($result));
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
