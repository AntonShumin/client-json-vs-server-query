
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
        result = end - start;
        console.log('Uitvoering: ' + result + ' ms');
        return result;
    }
}

/************************
      ajax result
 ************************/
function response(data,selector) {
    var result = timer(false) + ' ms';
    console.log(data);
    var selector_name = selector+' input';
    $(selector_name).val(result);
}

/************************
          onLoad
 ************************/
$(function () {
    var php_get_url = 'ajax/get.php';
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
        $('.five_json input').val('works');
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
               response(data,'.five_table');
           }
       });
    });





});

