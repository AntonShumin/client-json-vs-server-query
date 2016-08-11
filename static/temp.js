function toRad(x) {
    return x * Math.PI / 180;
}

var r = 6371;
var lat1 = 1;
var lon1 = 1;
var lat2 = 2;
var lon2 = 2;

//has a problem with the .toRad() method below.
var x1 = lat2-lat1;
var dLat = x1.toRad();
var x2 = lon2-lon1;
var dLon = x2.toRad();
var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) *
    Math.sin(dLon/2) * Math.sin(dLon/2);
var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
var d = r * c;


( 6371 * acos( cos( radians($lat) ) * cos( radians( $tbl_markers.lat ) ) * cos( radians( $tbl_markers.lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( $tbl_markers.lat ) ) ) ) AS distance
