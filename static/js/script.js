/************************
          onLoad
 ************************/
$(function () {
    $.ajaxSetup({
        cache: false
    });
    var php_get_url = 'ajax/get.php';
    var php_master_url = 'ajax/cache_master.php';
    var json_url ='static/json/';
    /************************
           Step 1: empty
     ************************/
     /*   read empty json  */
    $(document).on('click','.empty_json button',function (e) {
        e.preventDefault();
        timer(true);
        $.getJSON(json_url + '1_json.json', function(data){
            response(data,'.empty_json');
        });
    });

    /*   empty mySQL  */
    $(document).on('click','.empty_table button', function (e) {
        e.preventDefault();
        timer(true);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: php_get_url,
            data: {"type": 'empty'},
            success: function(data) {
                response(data,'.empty_table');
            }
        });
    });

    /************************
          Step 2: 5000
     ************************/
    /*   read 5000 json  */
    $(document).on('click','.five_json button',function (e) {
        e.preventDefault();
        timer(true);
        $.getJSON(json_url + 'json_five.json',function (data) {
            response('5k ingelezen','.five_json');
        })
    });

    /*   query 5000 */
    $(document).on('click','.five_table button', function (e) {
       e.preventDefault();
       timer(true);
       $.ajax({
           type: 'GET',
           dataType: 'json',
           url: php_get_url,
           data: {"type":'five'},
           success: function (data) {
               response('5k query uitgevoerd','.five_table');
           }
       });
    });

    /************************
        Step 3: 5000 calc
     ************************/
    /*   client side empty */
    $(document).on('click','.calc_client button', function (e) {
        e.preventDefault();
        timer(true);
        $.getJSON(json_url+'json_five', function (data){
            var length = data.length;
            for( var i=0; i < length; i++){
                //console.log(data[i].id);
            }
           response('done','.calc_client');
        });

    });

    /*   client side distance */
    $(document).on('click','.calc_client_dist button', function (e) {
        e.preventDefault();
        timer(true);
        count_filtered = 0;
        $.getJSON(json_url+'json_five', function (data){
            var filtered_markers = [];
            var length = data.length;
            for( var i=0; i < length; i++){
                var la1 = data[i].lat;
                var la2 = 51.2192;
                var lo1 = data[i].lng;
                var lo2 = 4.4029;
                var distance = getDistance(la1,la2,lo1,lo2)
                if (distance < 5) {
                    count_filtered++;
                    //console.log(count_filtered+' marker id: '+data[i].id +' '+ distance);
                    filtered_markers.push(data[i]);
                }
            }
            response('Found '+filtered_markers.length+' markers under 5km','.calc_client_dist');
        });
    });
    /*   server side distance */
    $(document).on('click','.calc_server_dist button', function (e) {
        e.preventDefault();
        timer(true);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: php_get_url,
            data: {"type":'five_dist'},
            success: function (data) {
                var length = data.length;
                for( var i=0; i < length; i++){
                    //console.log(i+' marker_id '+data[i].id +' '+ data[i].distance);
                }
                response('found '+data.length+' markers under 5km','.calc_server_dist');
            }
        });
    });
    /************************
        Step 4: caching
    ************************/
    $(document).on('click','.cache_1 button', function (e) {
        e.preventDefault();
        timer(true);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: php_get_url,
            data: {"type":'five_dist', "cache":true},
            success: function (data) {
                if(typeof data === 'string'){

                } else {

                }
                response('maakt niet log','.cache_1');
            }
        });
    });
    $(document).on('click','.cache_clear button',function (e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: php_master_url,
            success: function () {
               console.log('file removed');
            }
        });
    })

});


/************************
           TIMER
 ************************/
var start;
var end;
var result;
function timer(isStart) { /*true=start, false=end*/

    var time = new Date();
    if(isStart){
        start = time;
    } else {
        end = time;
        result = Number(end) - Number(start);
        //console.log('Uitvoering: ' + result + ' ms');
        return result;
    }
}

/************************
       ajax result
 ************************/
function response(data,selector) {
    var result = timer(false) + ' ms';
    //console.log(data);
    var selector_name = selector+' input';
    $(selector_name).val(result);
}

/******************************
 * distance between two points
 ******************************/
function toRad(x) {
    return x * Math.PI / 180;
}
function getDistance(lat1,lat2,lon1,lon2){
    var r = 6371;
    var x = lat2-lat1;
    var dLat = toRad(x);
    var y = lon2-lon1;
    var dLon = toRad(y);
    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
        Math.sin(dLon/2) * Math.sin(dLon/2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = r * c;
    return d;
}




