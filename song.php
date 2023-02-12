<?php

include('config/db_connect.php');

if (isset($_GET['id'])) {
    $songid = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM song WHERE id='$songid'";
    $result = mysqli_query($conn, $query);
    $song = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $query = "SELECT * FROM artist WHERE id={$song['artistid']}";
    $result = mysqli_query($conn, $query);
    $artist = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}

if (isset($_POST['delete'])) {
    $songid = mysqli_real_escape_string($conn, $_POST['songid']);
    $artistid = mysqli_real_escape_string($conn, $_POST['artistid']);

    $query = "DELETE FROM song WHERE id = $songid AND artistid = $artistid";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php if ($song == null) : ?>

    <h1 class="center">There is no such song in database!</h1>
    <div class="center">
        <a href="index.php" class="btn center grey accent-2">Return</a>
    </div>

<?php else : ?>

    <div class="container center">
        <div class="card z-depth-0 radius-card" style="padding-bottom: 30px;">
            <img src="<?php echo $artist['img']; ?>" alt="icon" class="icon-card">
            <h3><?php echo $song['title']; ?></h3>
            <h4>by <?php echo $artist['name']; ?></h4>
            <h5>Album: <?php echo $song['album']; ?></h5>
            <h5>Genre: <?php echo $song['genre']; ?></h5>
            <h5>Released in: <?php echo $song['year']; ?></h5>
            <h5>Song duration: <?php echo $song['duration']; ?></h5>


            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="padding-top:20px">
                <input type="hidden" name="songid" value="<?php echo $songid; ?>">
                <input type="hidden" name="artistid" value="<?php echo $artist['id']; ?>">
                <input type="submit" name="delete" value="delete" class="btn center indigo darken-2">
            </form>

        </div>
    </div>

<?php endif; ?>

<?php include('templates/footer.php'); ?>

</html>