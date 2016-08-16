<?php
require_once ('../inc/config/connection.php');

//Fire PHP
require_once (__DIR__ . '/../inc/fire-php/lib/FirePHPCore/fb.php');
ob_start();

// PHP Fastcache
use phpFastCache\CacheManager;
use phpFastCache\Core\phpFastCache;
require __DIR__ . '/../inc/fast-cache/src/autoload.php';
CacheManager::setDefaultConfig([
    "path" => sys_get_temp_dir(),
]);
$InstanceCache = CacheManager::getInstance('files'); // alt: memcache

//Global Vars
$sql = '';
$stmt = '';
$result = 'nothing here';
$type = false; if( isset($_GET['type']) ) { $type = $_GET['type']; }
$cache = false; if (isset($_GET['cache'])) { $cache = $_GET['cache']; }
$markers = '';

//Queries
if ($type == 'empty') {
    $sql = 'SELECT * FROM clientservertest';
} else if ($type == 'five') {
    $sql = 'SELECT * FROM markers';
} else {
    $sql = "SELECT *, 
    ( 6371 * acos( cos( radians(51.2192) ) * cos( radians( lat ) ) * cos( radians( lng ) 
    - radians(4.4029) ) + sin( radians(51.2192) ) * sin( radians( lat ) ) ) ) AS distance 
    FROM markers
    HAVING distance < 5;
    ";
}

//FASTCACHE
if($type == 'fast_cache') {
    fb('cashing',FirePHP::TRACE);
    $key = "marker_test";
    $cached_markers = $InstanceCache->getItem($key);
    //setup config
    if (is_null( $cached_markers->get() ) ) {
        fb('is null');
        try{
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $cached_markers->set($stmt->fetchAll(PDO::FETCH_ASSOC))->expiresAfter(10);
            $InstanceCache->save($cached_markers);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        fb('is not null');
    }
    echo json_encode( array("data" => $cached_markers) );
//NON FASTCACHE
} else {
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
}


//voer bewerking uit op $markers

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