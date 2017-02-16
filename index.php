<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <h1 class="display-1 main_header">Tick Tack Toe</h1>
        </div>
        <div class="row row_centered">
            <div id="0" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
            <div id="1" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
            <div id="2" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
        </div>
        <div class="row row_centered">
            <div id="3" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
            <div id="4" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
            <div id="5" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
        </div>
        <div class="row row_centered">
            <div id="6" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
            <div id="7" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
            <div id="8" class="btn btn-default col-md-4 col-xs-4 col_centered cellGame"></div>
        </div>
        <div class="row row_centered">
            <button id="startBtn" class="btn btn-success col-md-12 col_centered btnStart">START</button>
            <div id="waitingDiv" class="col-md-12 col_centered waitingDiv" hidden>Waiting player</div>
        </div>
        <div class="row row_centered">
            <div class="col-xs-12  col-md-12 col_centered">
                <input type="text" class="input_name" placeholder="Enter your name" maxlength="15" id="userName">
            </div>
        </div>
    </div>
</body>
</html>