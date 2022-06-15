<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Console</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/console.css">
</head>

<body>
    <div class="console">
        <div class="console-history"></div>
        <div style="display: flex;">
            <input class="console-input" id="console-input"  style="width: 80%;" type="text" autofocus spellcheck="false">
            <button class="console-input" id="execute" style="width: 10%;" onclick="execute(1)">Execute</button>
            <button class="console-input" id="result" style="width: 10%;" onclick="execute(2)">Result</button>
        </div>
    </div>
</body>
<script src="js/console.js"></script>
<script src="console.script.js"></script>
</html>