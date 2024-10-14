<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isola game</title>
    <style>
        h1 {
            position: absolute;
            top: 10vh;
            width: 10vw;
            left: 45vw;
            display: flex;
            justify-content: center;
            font-family: 'Courier New', Courier, monospace;
            color: brown;
            font-weight: 600;
            user-select: none;
        }

        .plateau {
            display: flex;
            width: 50vh;
            height: 50vh;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            top: 25vh;
            left: calc(calc(100vw - 50vh)/2);
        }

        .row {
            width: 100%;
            display: flex;
        }

        .row:first-child {
            border-top: 1px solid green;
        }

        .col:last-child {
            border-right: 1px solid green;
        }

        .col {
            position: relative;
            width: calc(50vh / 7);
            height: calc(50vh / 7);
            border-bottom: 1px solid green;
            border-left: 1px solid green;
        }

        .col-cont {
            width: calc(50vh / 7);
            height: calc(50vh / 7);
        }

        .col:hover {
            background-color: green;
            cursor: pointer;
        }

        .pion1 {
            position: absolute;
            width: calc(calc(50vh / 7) - 10px);
            height: calc(calc(50vh / 7) - 10px);
            left: 5px;
            top: 5px;
            border-radius: 50%;
            background-color: red;
        }

        .pion2 {
            position: absolute;
            width: calc(calc(50vh / 7) - 10px);
            height: calc(calc(50vh / 7) - 10px);
            left: 5px;
            top: 5px;
            border-radius: 50%;
            background-color: bisque;
        }

        .play {
            width: 100vw;
            height: 100vh;
            z-index: 100;
            background-color: rgba(245, 40, 145, 0.42);
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
</head>

<body>
    <div class="play">
        <h2>Play</h2>
        <button id="play">
            
        </button>
    </div>
    <h1>Isola</h1>
    <div class="plateau">
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
                <div class="col-cont" id="col-cont-pion2" style="background:green;">
                    <div class="pion2"></div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
                <div class="col-cont" id="col-cont-pion1" style="background:green;">
                    <div class="pion1"></div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>