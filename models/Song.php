<?php

class Song
{
    public $id;
    public $artistid;
    public $title;
    public $album;
    public $genre;
    public $year;
    public $duration;

    public function __construct(
        $id,
        $artistid,
        $title,
        $album,
        $genre,
        $year,
        $duration
    ) {
        $this->id = $id;
        $this->artistid = $artistid;
        $this->title = $title;
        $this->album = $album;
        $this->genre = $genre;
        $this->year = $year;
        $this->duration = $duration;
    }

    public function createSong(){

        $host = 'localhost';
        $user = 'teodora';
        $password = 'teodora';
        $database = 'music';
        $conn = mysqli_connect($host, $user, $password, $database);

        $query = "INSERT INTO song(artistid, title, album, genre, year, duration)
        VALUES('$this->artistid', '$this->title', '$this->album', '$this->genre',
            '$this->year', '$this->duration')";

        if (mysqli_query($conn, $query)) {
            header('Location: index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
