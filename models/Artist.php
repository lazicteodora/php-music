<?php

class Artist
{
    public $id;
    public $name;
    public $nationality;
    public $year;
    public $img;

    public function __construct(
        $id,
        $name,
        $nationality,
        $year,
        $img
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->nationality = $nationality;
        $this->year = $year;
        $this->img = $img;
    }
}

function returnArtistId($artist)
{
    switch ($artist) {
        case 'Post Malone':
            return 1;
            break;
        case 'The Beatles':
            return 2;
            break;
        case 'Madonna':
            return 3;
            break;
        case 'Sam Smith':
            return 4;
            break;
        case 'Dua Lipa':
            return 5;
            break;
        case 'Kanye West':
            return 6;
            break;
        case 'The Weeknd':
            return 7;
            break;
        case 'Stromae':
            return 8;
            break;
    }
}
