<?php

include('config/db_connect.php');

$query = "SELECT * FROM artist ORDER BY name ASC";
$result = mysqli_query($conn, $query);
$artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

//mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <?php foreach ($artists as $artist) : ?>
            <div class="col s12 m6 l4 xl3">
                <div class="card z-depth-0 radius-card"> 
                    <img src="<?php echo $artist['img']; ?>" alt="artist" class="icon-card">
                    <div class="card-content center">
                        <h5><?php echo htmlspecialchars($artist['name']); ?></h5>
                    </div>
                    <div class="card-action right-align radius-card">
                        <a href="artist.php?id=<?php echo $artist['id']; ?>" class="indigo-text text-darken-2">
                            More Info
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include('templates/footer.php'); ?>

</html>