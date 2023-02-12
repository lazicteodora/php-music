<?php

$artists[] = 'Post Malone';
$artists[] = 'The Beatles';
$artists[] = 'Madonna';
$artists[] = 'Sam Smith';
$artists[] = 'Dua Lipa';
$artists[] = 'Kanye West';
$artists[] = 'The Weeknd';
$artists[] = 'Stromae';



if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $suggestion = "";

    if ($query !== "") {
        $query = strtolower($query);
        $length = strlen($query);

        foreach ($artists as $artist) {
            if (stristr($query, substr($artist, 0, $length))) {
                if ($suggestion == "") {
                    $suggestion = $artist;
                } else {
                    $suggestion .= ", $artist";
                }
            }
        }
    }
    if ($suggestion == "") {
        echo 'No suggestions';
    } else {
        echo $suggestion;
    }
}
