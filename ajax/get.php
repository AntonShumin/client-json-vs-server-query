<?php

require_once ('../inc/config/connection.php');

/* PHP Fastcache */
use phpFastCache\CacheManager;
require __DIR__ . '/../inc/phpFastCache/autoload.php';
//$InstanceCache = CacheManager::getInstance('memcache');

/* ******************** */

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

$key = "marker_test";
$markers = CacheManager::get($key);
//setup config
if (is_null( $markers ) ) {
    //$markers  = sql object
    CacheManager::set($key,$markers,600); //0 voor permanent
}
//voer bewerking uit op $markers

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


/*
 * use phpFastCache\CacheManager;

// Include phpFastCache autoloader
require __DIR__ . '/../src/autoload.php';

$InstanceCache = CacheManager::getInstance('memcache');

$key = "product_page";
$CachedString = $InstanceCache->getItem($key);

if (is_null($CachedString->get())) {
    //$CachedString = "APC Cache --> Cache Enabled --> Well done !";
    // Write products to Cache in 10 minutes with same keyword
    $CachedString->set("Memcache Cache --> Cache Enabled --> Well done !")->expiresAfter(5);
    $InstanceCache->save($CachedString);

    echo "FIRST LOAD // WROTE OBJECT TO CACHE // RELOAD THE PAGE AND SEE // ";
    echo $CachedString->get();

} else {
    echo "READ FROM CACHE // ";
    echo $CachedString->get();
}

echo '<br /><br /><a href="/">Back to index</a>&nbsp;--&nbsp;<a href="./' . basename(__FILE__) . '">Reload</a>';

*/