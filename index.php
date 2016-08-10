<!DOCTYPE html>
<html>
<head>
    <title>Server vs Client</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="static/src/style.css">
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
            <h2>Minimal delay: empty json vs empty mysql read</h2>
            <div class="container">
                <div class="col-sm-2 col-sm-offset-4">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Load JSON</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
                <div class="col-sm-2 ">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Load Table</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
            </div>
        </div>
        <!-- FRAME 2 -->
        <div id="frame_2">
            <h2>Query 5000 markers: client json vs php mysql</h2>
            <div class="container">
                <div class="col-sm-2 col-sm-offset-4">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Load JSON</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
                <div class="col-sm-2 ">
                    <div class="row">
                        <button class="btn btn-default" type="submit">Load Table</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
            </div>
        </div>
        <!-- FRAME 3 -->
        <div id="frame_3">
            <h2>Client write speed</h2>
            <div class="container">
                <div class="col-sm-2 col-sm-offset-4">
                    <div class="row">
                        <button class="btn btn-default" type="submit">json write 5000</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
                <div class="col-sm-2 ">
                    <div class="row">
                        <button class="btn btn-default" type="submit">json update 50</button>
                    </div>
                    <input class="text-center" placeholder="result"> </input>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
