<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isola game</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
        }

        h1 {
            position: absolute;
            top: 10vh;
            width: 10vw;
            left: 45vw;
            display: flex;
            justify-content: center;
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
            backdrop-filter: blur(0.5rem);
        }

        .center-play-opt {
            position: absolute;
            width: 30vw;
            height: 30vh;
            left: 35vw;
            top: 35vh;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        #play {
            margin-left: calc(calc(100% - 10rem) /2);
            margin-right: calc(calc(100% - 12rem) /2);
            width: 10rem;
            cursor: pointer;
            padding: 0.375rem 1rem;
            border-radius: 0.375rem;
            border: none;
            font-family: inherit;
            font-weight: 600;
            color: white;
            background-color: black;
            transform: scale(1.2);
            transition: 300ms linear;
            margin-top: -5rem;
        }

        #play:hover {
            background-color: green;
        }

        h2 {
            margin-left: calc(calc(100% - 13rem) /2);
            margin-right: calc(calc(100% - 13rem) /2);
            width: 13rem;
            color: green;
            text-decoration: solid;
            font-size: 1.75rem;
        }

        .played {
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="play">
        <div class="center-play-opt">
            <h2>Wanna play ?</h2>
            <button id="play" value="play">
                Play
            </button>
        </div>
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
    <script>

        window.onload = function (e_load) {

            if (localStorage.getItem("turn") != undefined
                && localStorage.getItem("game_over") != undefined
                && localStorage.getItem("pion1_position") != undefined
                && localStorage.getItem("pion2_position") != undefined
                && localStorage.getItem("square_played") != undefined
            ) {
                var turn = localStorage.getItem("turn");
                var game_over = localStorage.getItem("game_over");
                var pion1_position = localStorage.getItem("pion1_position");
                var pion2_position = localStorage.getItem("pion2_position");
                var square_played = JSON.parse(localStorage.getItem("square_played"));


                if (square_played != undefined && square_played.length > 0) {
                    for (let index = 0; index < square_played.length; index++) {
                        const square = square_played[index];
                        // // console.log(square);
                        let y = square.y;
                        let x = square.x;
                        let row = document.querySelectorAll(".row")[y];
                        let col = row.querySelectorAll(".col")[x];
                        if (row != undefined && col != undefined) {
                            col.classList.add("played");
                        }
                    }
                }
            } else {
                square_played = []
                turn = "pion1";
                game_over = false;
                pion1_position = { y: 6, x: 3 };
                pion2_position = { y: 0, x: 3 };
            }


            if (game_over) {
                localStorage.clear();
                document.getElementsByClassName("play")[0].style.display = "";
            }
        }

        document.querySelector("#play").addEventListener("click", (e_play) => {
            document.getElementsByClassName("play")[0].style.display = "none";
            var square_played = []
            var turn = "pion1";
            var game_over = false;
            var pion1_position = { y: 6, x: 3 };
            var pion2_position = { y: 0, x: 3 };

            localStorage.setItem("turn", turn);
            localStorage.setItem("game_over", game_over);
            localStorage.setItem("pion1_position", JSON.stringify(pion1_position));
            localStorage.setItem("pion2_position", JSON.stringify(pion2_position));
            localStorage.setItem("square_played", JSON.stringify(square_played));
        });

        for (let row_index = 0; row_index < document.querySelectorAll(".row").length; row_index++) {
            const row_element = document.querySelectorAll(".row")[row_index];
            var index_col_targeted = [];
            row_element.addEventListener("click", (e_row) => {
                if (localStorage.getItem("turn") != undefined
                    && localStorage.getItem("game_over") != undefined
                    && localStorage.getItem("pion1_position") != undefined
                    && localStorage.getItem("pion2_position") != undefined
                ) {

                    var turn = localStorage.getItem("turn");
                    var game_over = localStorage.getItem("game_over");
                    var pion1_position = JSON.parse(localStorage.getItem("pion1_position"));
                    var pion2_position = JSON.parse(localStorage.getItem("pion2_position"));
                    var square_played = JSON.parse(localStorage.getItem("square_played"));

                } else {
                    square_played = []
                    turn = "pion1";
                    game_over = false;
                    pion1_position = { y: 6, x: 3 };
                    pion2_position = { y: 0, x: 3 };
                }
                index_col_targeted = [].indexOf.call(row_element.querySelectorAll('.col'), e_row.target);
                // // console.log(typeof index_col_targeted);

                if (typeof index_col_targeted == "number") {
                    if (turn == "pion1") {
                        if (pion1_position != undefined) {
                            // console.log("in", pion1_position)
                            let y;
                            let x;
                            ({ y, x } = pion1_position);
                            // console.log(x, y);
                            if ((y <= 5 && y >= 1) && (x >= 1 && x <= 5)) {
                                let is_mooving_good = false;
                                if (row_index == (y + 1) || row_index == (y - 1) || row_index == y) {
                                    is_mooving_good = true;
                                    // console.log("in .");
                                    if (index_col_targeted == (x + 1) || index_col_targeted == (x - 1) || index_col_targeted == x) {
                                        // console.log("in .2");
                                        is_mooving_good = true;
                                    } else {
                                        is_mooving_good = false;
                                    }

                                    if (index_col_targeted == x && row_index == y) {
                                        is_mooving_good = false;
                                    }
                                }


                                // console.log(is_mooving_good);

                                // console.log("ogx", x, "ogy", y);
                                // console.log("x", index_col_targeted, "y", row_index);

                                if (is_mooving_good) {
                                    // moove the coin
                                    let row = document.querySelectorAll(".row")[row_index];
                                    let element = row.querySelectorAll(".col")[index_col_targeted];
                                    // console.log(is_mooving_good, element);
                                    if (!element.classList.contains("played")) {
                                        let current_coin = document.querySelector("#col-cont-pion1");
                                        // console.log(current_coin);
                                        // element.appendChild(current_coin);
                                        current_coin.remove();
                                        element.classList.add("played");
                                        element.innerHTML = "<div class=\"col-cont\" id=\"col-cont-pion1\"><div class=\"pion1\"></div></div>";
                                        // color the current square
                                        // update coords var and localstorage
                                        // update turn var and localstorage
                                        let coordsAroundX = [(x - 1), x, (x + 1)];
                                        let coordsAroundY = [(y - 1), y, (y + 1)];
                                        console.log(coordsAroundX, coordsAroundY);
                                        let flagtOver = true;
                                        for (let indexX = 0; indexX < coordsAroundX.length; indexX++) {
                                            const elementX = coordsAroundX[indexX];
                                            for (let indexY = 0; indexY < coordsAroundY.length; indexY++) {
                                                const elementY = coordsAroundY[indexY];
                                                console.log("xy :  ", ("" + elementX + elementY));
                                                if (("" + x + y) != ("" + elementX + elementY)) {
                                                    let rowTargeted = undefined;
                                                    let elementTargeted = undefined;
                                                    if (document.querySelectorAll(".row")[elementY] != undefined) {
                                                        rowTargeted = document.querySelectorAll(".row")[elementY];
                                                    }
                                                    if (rowTargeted != undefined && document.querySelectorAll(".col")[elementX] != undefined) {
                                                        elementTargeted = rowTargeted.querySelectorAll(".col")[elementX];
                                                    }
                                                    console.log(rowTargeted, elementTargeted);
                                                    if (elementTargeted != undefined && rowTargeted != undefined && !elementTargeted.classList.contains("played")) {
                                                        console.log(elementTargeted, false);
                                                        flagtOver = false;
                                                    }
                                                }

                                            }
                                        }
                                        game_over = flagtOver;
                                        pion1_position = { y: row_index, x: index_col_targeted };
                                        square_played.push(pion1_position)
                                        turn = "pion2";
                                        // game_over = false;

                                        localStorage.setItem("turn", turn);
                                        localStorage.setItem("game_over", game_over);
                                        localStorage.setItem("pion1_position", JSON.stringify(pion1_position));
                                        localStorage.setItem("square_played", JSON.stringify(square_played));

                                    }
                                }
                            } else {
                                // console.log("in else");
                                let is_mooving_good = false;
                                if (row_index == (y + 1) || row_index == (y - 1) || row_index == y) {
                                    is_mooving_good = true;
                                    // console.log("in .");
                                    if (index_col_targeted == (x + 1) || index_col_targeted == (x - 1) || index_col_targeted == x) {
                                        // console.log("in .2");
                                        is_mooving_good = true;
                                    } else {
                                        is_mooving_good = false;
                                    }

                                    if (index_col_targeted == x && row_index == y) {
                                        is_mooving_good = false;
                                    }
                                }


                                // console.log(is_mooving_good);

                                // console.log("ogx", x, "ogy", y);
                                // console.log("x", index_col_targeted, "y", row_index);

                                if (is_mooving_good) {
                                    // moove the coin
                                    let row = document.querySelectorAll(".row")[row_index];
                                    let element = row.querySelectorAll(".col")[index_col_targeted];
                                    // console.log(is_mooving_good, element);
                                    if (!element.classList.contains("played")) {
                                        let current_coin = document.querySelector("#col-cont-pion1");
                                        // console.log(current_coin);
                                        // element.appendChild(current_coin);
                                        current_coin.remove();
                                        element.classList.add("played");
                                        element.innerHTML = "<div class=\"col-cont\" id=\"col-cont-pion1\"><div class=\"pion1\"></div></div>";
                                        // color the current square
                                        // update coords var and localstorage
                                        // update turn var and localstorage
                                        let coordsAroundX = [(x - 1), x, (x + 1)];
                                        let coordsAroundY = [(y - 1), y, (y + 1)];
                                        console.log(coordsAroundX, coordsAroundY);
                                        let flagtOver = true;
                                        for (let indexX = 0; indexX < coordsAroundX.length; indexX++) {
                                            const elementX = coordsAroundX[indexX];
                                            for (let indexY = 0; indexY < coordsAroundY.length; indexY++) {
                                                const elementY = coordsAroundY[indexY];
                                                console.log("xy :  ", ("" + elementX + elementY));
                                                if (("" + x + y) != ("" + elementX + elementY)) {
                                                    let rowTargeted = undefined;
                                                    let elementTargeted = undefined;
                                                    if (document.querySelectorAll(".row")[elementY] != undefined) {
                                                        rowTargeted = document.querySelectorAll(".row")[elementY];
                                                    }
                                                    if (rowTargeted != undefined && document.querySelectorAll(".col")[elementX] != undefined) {
                                                        elementTargeted = rowTargeted.querySelectorAll(".col")[elementX];
                                                    }
                                                    console.log(rowTargeted, elementTargeted);
                                                    if (elementTargeted != undefined && rowTargeted != undefined && !elementTargeted.classList.contains("played")) {
                                                        console.log(elementTargeted, false);
                                                        flagtOver = false;
                                                    }
                                                }
                                            }
                                        }
                                        game_over = flagtOver;
                                        pion1_position = { y: row_index, x: index_col_targeted };
                                        square_played.push(pion1_position)
                                        turn = "pion2";
                                        // game_over = false;

                                        localStorage.setItem("turn", turn);
                                        localStorage.setItem("game_over", game_over);
                                        localStorage.setItem("pion1_position", JSON.stringify(pion1_position));
                                        localStorage.setItem("square_played", JSON.stringify(square_played));

                                    }
                                }
                            }
                        }
                    } else {
                        if (pion2_position != undefined) {
                            // console.log("in", pion1_position)
                            let y;
                            let x;
                            ({ y, x } = pion2_position);
                            // console.log(x, y);
                            if ((y <= 5 && y >= 1) && (x >= 1 && x <= 5)) {
                                let is_mooving_good = false;
                                if (row_index == (y + 1) || row_index == (y - 1) || row_index == y) {
                                    is_mooving_good = true;
                                    // console.log("in .");
                                    if (index_col_targeted == (x + 1) || index_col_targeted == (x - 1) || index_col_targeted == x) {
                                        // console.log("in .2");
                                        is_mooving_good = true;
                                    } else {
                                        is_mooving_good = false;
                                    }

                                    if (index_col_targeted == x && row_index == y) {
                                        is_mooving_good = false;
                                    }
                                }


                                // console.log(is_mooving_good);

                                // console.log("ogx", x, "ogy", y);
                                // console.log("x", index_col_targeted, "y", row_index);

                                if (is_mooving_good) {
                                    // moove the coin
                                    let row = document.querySelectorAll(".row")[row_index];
                                    let element = row.querySelectorAll(".col")[index_col_targeted];
                                    // console.log(is_mooving_good, element);
                                    if (!element.classList.contains("played")) {
                                        let current_coin = document.querySelector("#col-cont-pion2");
                                        // console.log(current_coin);
                                        // element.appendChild(current_coin);
                                        current_coin.remove();
                                        element.classList.add("played");
                                        element.innerHTML = "<div class=\"col-cont\" id=\"col-cont-pion2\"><div class=\"pion2\"></div></div>";
                                        // color the current square
                                        // update coords var and localstorage
                                        // update turn var and localstorage
                                        // x-1 x x+1
                                        // y-1 y y+1
                                        let coordsAroundX = [(x - 1), x, (x + 1)];
                                        let coordsAroundY = [(y - 1), y, (y + 1)];
                                        console.log(coordsAroundX, coordsAroundY);
                                        let flagtOver = true;
                                        for (let indexX = 0; indexX < coordsAroundX.length; indexX++) {
                                            const elementX = coordsAroundX[indexX];
                                            for (let indexY = 0; indexY < coordsAroundY.length; indexY++) {
                                                const elementY = coordsAroundY[indexY];
                                                console.log("xy :  ", ("" + elementX + elementY));
                                                if (("" + x + y) != ("" + elementX + elementY)) {
                                                    let rowTargeted = undefined;
                                                    let elementTargeted = undefined;
                                                    if (document.querySelectorAll(".row")[elementY] != undefined) {
                                                        rowTargeted = document.querySelectorAll(".row")[elementY];
                                                    }
                                                    if (rowTargeted != undefined && document.querySelectorAll(".col")[elementX] != undefined) {
                                                        elementTargeted = rowTargeted.querySelectorAll(".col")[elementX];
                                                    }
                                                    console.log(rowTargeted, elementTargeted);
                                                    if (elementTargeted != undefined && rowTargeted != undefined && !elementTargeted.classList.contains("played")) {
                                                        console.log(elementTargeted, false);
                                                        flagtOver = false;
                                                    }
                                                }
                                            }
                                        }
                                        game_over = flagtOver;
                                        pion2_position = { y: row_index, x: index_col_targeted };
                                        square_played.push(pion2_position)
                                        turn = "pion1";

                                        // game_over = false;

                                        localStorage.setItem("turn", turn);
                                        localStorage.setItem("game_over", game_over);
                                        localStorage.setItem("pion2_position", JSON.stringify(pion2_position));
                                        localStorage.setItem("square_played", JSON.stringify(square_played));

                                    }
                                }
                            } else {
                                // console.log("in else");
                                let is_mooving_good = false;
                                if (row_index == (y + 1) || row_index == (y - 1) || row_index == y) {
                                    is_mooving_good = true;
                                    // console.log("in .");
                                    if (index_col_targeted == (x + 1) || index_col_targeted == (x - 1) || index_col_targeted == x) {
                                        // console.log("in .2");
                                        is_mooving_good = true;
                                    } else {
                                        is_mooving_good = false;
                                    }

                                    if (index_col_targeted == x && row_index == y) {
                                        is_mooving_good = false;
                                    }
                                }


                                // console.log(is_mooving_good);

                                // console.log("ogx", x, "ogy", y);
                                // console.log("x", index_col_targeted, "y", row_index);

                                if (is_mooving_good) {
                                    // moove the coin
                                    let row = document.querySelectorAll(".row")[row_index];
                                    let element = row.querySelectorAll(".col")[index_col_targeted];
                                    // console.log(is_mooving_good, element);
                                    if (!element.classList.contains("played")) {
                                        let current_coin = document.querySelector("#col-cont-pion2");
                                        // console.log(current_coin);
                                        // element.appendChild(current_coin);
                                        current_coin.remove();
                                        element.classList.add("played");
                                        element.innerHTML = "<div class=\"col-cont\" id=\"col-cont-pion2\"><div class=\"pion2\"></div></div>";
                                        // color the current square
                                        // update coords var and localstorage
                                        // update turn var and localstorage
                                        let coordsAroundX = [(x - 1), x, (x + 1)];
                                        let coordsAroundY = [(y - 1), y, (y + 1)];
                                        console.log(coordsAroundX, coordsAroundY);
                                        let flagtOver = true;
                                        for (let indexX = 0; indexX < coordsAroundX.length; indexX++) {
                                            const elementX = coordsAroundX[indexX];
                                            for (let indexY = 0; indexY < coordsAroundY.length; indexY++) {
                                                const elementY = coordsAroundY[indexY];
                                                console.log("xy :  ", ("" + elementX + elementY));
                                                if (("" + x + y) != ("" + elementX + elementY)) {
                                                    let rowTargeted = undefined;
                                                    let elementTargeted = undefined;
                                                    if (document.querySelectorAll(".row")[elementY] != undefined) {
                                                        rowTargeted = document.querySelectorAll(".row")[elementY];
                                                    }
                                                    if (rowTargeted != undefined && document.querySelectorAll(".col")[elementX] != undefined) {
                                                        elementTargeted = rowTargeted.querySelectorAll(".col")[elementX];
                                                    }
                                                    console.log(rowTargeted, elementTargeted);
                                                    if (elementTargeted != undefined && rowTargeted != undefined && !elementTargeted.classList.contains("played")) {
                                                        console.log(elementTargeted, false);
                                                        flagtOver = false;
                                                    }
                                                }
                                            }
                                        }
                                        game_over = flagtOver;
                                        pion2_position = { y: row_index, x: index_col_targeted };
                                        localStorage.setItem("game_over", flagtOver);
                                        square_played.push(pion2_position)
                                        turn = "pion1";
                                        // game_over = false;

                                        localStorage.setItem("turn", turn);
                                        localStorage.setItem("game_over", game_over);
                                        localStorage.setItem("pion2_position", JSON.stringify(pion2_position));
                                        localStorage.setItem("square_played", JSON.stringify(square_played));

                                    }
                                }
                            }

                        }
                    }
                }
                if (game_over) {
                    localStorage.clear();
                    document.getElementsByClassName("play")[0].style.display = "";
                    document.querySelector(".plateau").innerHTML = '       <div class="row">
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
        </div>';
                }
            });
        }


    </script>
</body>

</html>