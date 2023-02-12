<?php

include('config/db_connect.php');

if (isset($_GET['id'])) {
    $artistid = mysqli_real_escape_string($conn, $_GET['id']); // izlacimo iz urla id 
}

$query = "SELECT * FROM artist WHERE id = $artistid"; 
$result = mysqli_query($conn, $query); 
$artist = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$query = "SELECT * FROM song WHERE artistid='$artistid'";
$result = mysqli_query($conn, $query);
$songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php if ($artist == null) : ?>

    <h1 class="center">There is no artist with that ID!</h1>
    <div class="center">
        <a href="index.php" class="btn center grey darken-2">Return</a>
    </div>

<?php else : ?>

    <h1 class="center"><?php echo $artist['name']; ?></h1>
    <img class="artist" src="<?php echo $artist['img']; ?>" alt="">
    <h5 class="center">Born in <?php echo $artist['year']; ?></h5>
    <h5 class="center" style="padding-bottom: 100px;">From <?php echo $artist['nationality']; ?></h5>

    <?php if ($songs == null) { ?>

        <h6 class="center">No songs in database! </h6>

    <?php } else {; ?>

        <div class="container">
            <h5 class="center">Songs in database:</h5>
            <div class="row">
                <?php foreach ($songs as $song) : ?>
                    <div class="col s12 m6 l4 xl3">
                        <div class="card z-depth-0 radius-card">
                            <img src="<?php echo $artist['img']; ?>" alt="icon" class="icon-card">
                            <div class="card-content center">
                                <h5><?php echo htmlspecialchars($song['title']); ?></h5>
                            </div>
                            <div class="card-action right-align radius-card">
                                <a href="song.php?id=<?php echo $song['id']; ?>" class="grey-text accent-2 text-darken-2">
                                    More Info
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php }; ?>

<?php endif; ?>

<?php include('templates/footer.php'); ?>

</html>