<!DOCTYPE html>
<html>
<head>
    <title>Server vs Client</title>
    <!-- jQuery -->
    <script src="static/js/jquery-3.1.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="static/src/style.css">

    <script src="static/js/script.js"></script>
</head>
<body>
    <div class="text-center center-block">

        <!-- TITLE FRAME -->
        <div id="frame_title">
            <h1>Client vs Server</h1>
            <p>Een pintje staat op het spel!</p>
        </div>
        <!-- FRAME 1 -->
        <div id="frame_1">
            <h2>Minimal delay: empty json vs empty mysql table</h2>
            <div class="container">
                <div class="empty_json col-sm-2 col-sm-offset-4">
                    <div class="row">
                        <button  class="btn btn-default" type="submit">Empty JSON</button>
                    </div>
                    <input  class="text-center" placeholder="result"> </input>
                </div>
                <div class="empty_table col-sm-2 ">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Empty mySQL table</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
            </div>
        </div>
        <!-- FRAME 2 -->
        <div id="frame_2">
            <h2>Query 5000 markers: client json vs php mysql</h2>
            <div class="container">
                <div class="five_json col-sm-2 col-sm-offset-4">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Load JSON</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
                <div class="five_table col-sm-2 ">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Query mySQL</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
            </div>
        </div>
        <!-- FRAME 3: Calculations -->
        <div id="frame_3">
            <h2>5k loop calculations</h2>
            <div class="container">
                <p>Empty loop</p>
                <div class="calc_client col-sm-2 col-sm-offset-5">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Client Side</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>

            </div>
            <div class="container">
                <br/><p>Distance calculation</p>
                <div class="calc_client_dist col-sm-2 col-sm-offset-4">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Client Side</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
                <div class="calc_server_dist col-sm-2 ">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Server Side</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
            </div>
        </div>
        <!-- FRAME 4: Server side caching -->
        <div id="frame_3">
            <div class="container">
                <h2>Server side caching (basic)</h2>
                <div class="cache_1 col-sm-2 col-sm-offset-4">
                    <div class="row">
                        <button class="btn btn-default" type="submit">1st load</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
                <div class="cache_2 col-sm-2 ">
                    <div class="row">
                        <button class="btn btn-default" type="submit">2nd load</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
            </div>
            <div class="container">
                <div class="cache_clear col-sm-2 col-sm-offset-5">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Delete File</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FRAME 5: Caching Plugin -->
    </div>
</body>
</html>
