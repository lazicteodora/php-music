<?php

?>

<head>
    <title>Music Base</title>
    <link rel="icon" href="../img/icon.png">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <style>
        .title-text {
            font-size: xx-large;
        }

        .nav-text {
            font-size: large;
            font-weight: 600;
        }

        .icon-card {
            max-height: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }

        .radius-card {
            border-radius: 20px;
        }

        .form {
            padding: 10px;
            margin-left: 25%;
            width: 50%;
            text-align: center;
            border-radius: 15px;
        }

        .artist {
            margin-left: 45%;
            max-width: 10%;
            height: auto;
        }
    </style>
</head>

<body class="indigo accent-1">
    <nav class="grey accent-3 darken-3">
        <div class="container">
            <a href="index.php" class="title-text">MusicBase</a>
            <ul class="right hide-on-small-and-down navul">
                <li>
                    <a href="songs.php" class="btn white indigo-text accent-3 nav-text z-depth-0">
                        All Songs
                    </a>
                </li>
                <li>
                    <a href="add.php" class="btn white indigo-text accent-3 nav-text z-depth-0">
                        Add A Song
                    </a>
                </li>
            </ul>
        </div>
    </nav>
