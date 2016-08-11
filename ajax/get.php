<?php
require_once ('../inc/config/connection.php');

$type = $_GET['type'];
$sql = '';
$result = 'nothing here';

if($type == 'empty'){
    $sql = 'SELECT * FROM clientservertest';
} else if($type == 'five') {
    $sql =  'SELECT * FROM markers';
}

try{
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
/*
$file = 'something.json';
file_put_contents($file,json_encode($result));
*/
echo json_encode($result);



/*
$sql = $db->prepare("SELECT $tbl_markers.id,$tbl_markers.lat,$tbl_markers.lng,$tbl_markers.date,$tbl_markers.time,
            $tbl_pokemon.name,$tbl_pokemon.type,$tbl_pokemon.id as pokemon_id,$tbl_users.first_name,$tbl_users.last_name, $tbl_markers.votes_score, $tbl_markers.user_id 
            FROM $tbl_markers                
            LEFT JOIN $tbl_users ON $tbl_users.id=$tbl_markers.user_id
            LEFT JOIN $tbl_pokemon ON $tbl_pokemon.id=$tbl_markers.pokemon_id WHERE $tbl_markers.votes_score > -2 $filter2 order by $tbl_markers.date desc LIMIT $limitPokemon");
*/
