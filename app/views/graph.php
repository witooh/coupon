<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/bootstrap.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" style="text-align:center;margin-top:40px;">
                    <button class="btn btn-primary filter" data-chart="0">Monthly</button>
                    <button class="btn btn-primary filter" data-chart="1">Weekly</button>
                </div>
            </div>
            <div class="row-fluid">
                <div id="graph" class="span12" style="height: 600px;"></div>
            </div>
        </div>

        <script type="text/javascript" src="public/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="public/js/graph.js"></script>
    </body>
</html>