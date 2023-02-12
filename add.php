<?php

include('config/db_connect.php');
include('models/Artist.php');
include('models/Song.php');

$title = $artist = $album = $genre = $year = $duration = '';

$errors = [
    'title' => '', 'artist' => '', 'album' => '',
    'genre' => '', 'year' => '', 'duration' => ''
];

if (isset($_POST['add'])) {

    if (empty($_POST['title'])) {
        $errors['title'] = 'Song title is required!';
    } else {
        $title = $_POST['title'];
    }

    include('ajax/artists.php');
    if (empty($_POST['artist'])) {
        $errors['artist'] = 'Artist is required!';
    } else {
        $artist = $_POST['artist'];
        if (!in_array($artist, $artists)) {
            $errors['artist'] = 'No such artist exists!';
            $artist = '';
        }
    }

    include('ajax/albums.php');
    if (empty($_POST['album'])) {
        $errors['album'] = 'Album is required!';
    } else {
        $album = $_POST['album'];
        if (!in_array($album, $albums)) {
            $errors['album'] = 'No such album exists!';
            $album = '';
        }
    }

    if (empty($_POST['genre'])) {
        $errors['genre'] = 'Song genre is required!';
    } else {
        $genre = $_POST['genre'];
    }

    if (empty($_POST['year'])) {
        $errors['year'] = 'Year of releasing is required!';
    } else {
        $yearStr = $_POST['year']; // ono sto je uneto u filed year ce da smesti u prom
        if (strlen($yearStr) != 4 || intval($yearStr) == 1) {
            $errors['year'] = 'Wrong input for year!';
        } else {
            $year = intval($yearStr); 
            if ($year < 1862 || $year > date("Y")) { //if its greather than the current year
                $errors['year'] = 'Wrong input for year!';
            }
        }
    }

    if (empty($_POST['duration'])) {
        $errors['duration'] = 'Song duration is required!';
    } else {
        $duration = $_POST['duration'];
    }


    if (!array_filter($errors)) {
        $artistid = returnArtistId($_POST['artist']);
        $title = $_POST['title'];
        $album = $_POST['album'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $duration = $_POST['duration'];


        $newSong = new Song(
            null,
            $artistid,
            $title,
            $album,
            $genre,
            $year,
            $duration,
            null
        );

        $newSong->createSong();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container">
    <h4 class="center">Post a song</h4>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white form" method="POST">
    
        <label for="title">Song title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>

        <label for="artist">Artist:</label>
        <input type="text" name="artist" value="<?php echo htmlspecialchars($artist) ?>" onkeyup="suggestArtist(this.value)">
        <div class="red-text"><?php echo $errors['artist']; ?></div>
        <p><span id="artistSuggest"></span></p>

        <label for="album">Album:</label>
        <input type="text" name="album" value="<?php echo htmlspecialchars($album) ?>" onkeyup="suggestAlbum(this.value)">
        <div class="red-text"><?php echo $errors['album']; ?></div>
        <p><span id="albumSuggest"></span></p>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="<?php echo htmlspecialchars($genre) ?>" onkeyup="suggestGenre(this.value)">
        <div class="red-text"><?php echo $errors['genre']; ?></div>
        <p><span id="genreSuggest"></span></p>

        <label for="year">Year:</label>
        <input type="text" name="year" value="<?php echo htmlspecialchars($year) ?>">
        <div class="red-text"><?php echo $errors['year']; ?></div>

        <label for="duration">Duration:</label>
        <input type="text" name="duration" value="<?php echo htmlspecialchars($duration) ?>">
        <div class="red-text"><?php echo $errors['duration']; ?></div>

        <div class="center">
            <input type="submit" name="add" value="Post a song" class="btn indigo darken-2">
        </div>
    </form>

</section>

<?php include('templates/footer.php'); ?>

<script>
    function suggestArtist(str = "") {
        if (str.length == 0) {
            document.getElementById("artistSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("artistSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/artists.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestAlbum(str = "") {
        if (str.length == 0) {
            document.getElementById("albumSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("albumSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/albums.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestGenre(str = "") {
        if (str.length == 0) {
            document.getElementById("genreSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("genreSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/genres.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

</html>