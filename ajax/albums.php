<?php

$albums[] = 'Future Nostalgia';
$albums[] = 'Dua Lipa';
$albums[] = 'Yeezus';
$albums[] = 'Abbey Road';
$albums[] = 'Revolver';
$albums[] = 'Confessions on a Dance Floor';
$albums[] = 'Ray of Light';
$albums[] = 'Finally Enough Love';
$albums[] = 'Stoney';
$albums[] = 'In The Lonely Hour';
$albums[] = 'Hollywoods Bleeding';
$albums[] = 'Help';
$albums[] = 'Twelve Carat Toothache';
$albums[] = 'After Hours';
$albums[] = 'Racine Carrée';
$albums[] = 'My Beautiful Dark Twisted Fantasy';
$albums[] = 'Graduation';
$albums[] = 'Beerbongs & Bentleys';





if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $suggestion = "";

    if ($query !== "") {
        $query = strtolower($query);
        $length = strlen($query);

        foreach ($albums as $album) {
            if (stristr($query, substr($album, 0, $length))) {
                if ($suggestion == "") {
                    $suggestion = $album;
                } else {
                    $suggestion .= ", $album";
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
