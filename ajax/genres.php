<?php

$genres[] = 'Pop';
$genres[] = 'Hip-hop';
$genres[] = 'RnB';
$genres[] = 'Rock';
$genres[] = 'Metal';
$genres[] = 'Folk';
$genres[] = 'Classical';
$genres[] = 'Dance';
$genres[] = 'Trance';
$genres[] = 'Rap';
$genres[] = 'Trap';

$query = $_REQUEST['query'];
$suggestion = "";  // responseText

if ($query !== "") {
    $query = strtolower($query);
    $length = strlen($query);

    foreach ($genres as $genre) {
        if (stristr($query, substr($genre, 0, $length))) {
            if ($suggestion == "") {
                $suggestion = $genre;
            } else {
                $suggestion .= ", $genre";
            }
        }
    }
}
if ($suggestion == "") {
    echo 'No suggestions';
} else {
    echo $suggestion;
}
