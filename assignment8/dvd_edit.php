<?php

$dvd_title_id = $_GET['dvd_title_id'];

// Trap to stop the page if dvd_title_id was not passed to this page.
if(empty($dvd_title_id)){
    header("Location: dvd_search.php");
}

// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
    exit("DB Connection Error: " . mysqli_connect_error());
}

// 2. Generate & Submit SQL.
// SQL statement pulling all information for record with specified dvd_title_id.
$sql = "SELECT *
        FROM dvd_titles
        WHERE dvd_title_id = $dvd_title_id";

$results = mysqli_query($conn, $sql);
if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
}

$sql_genres = "SELECT *
               FROM genres";

$sql_sounds = "SELECT *
               FROM sounds";

$sql_labels= "SELECT *
               FROM labels";

$sql_formats = "SELECT *
               FROM formats";

$sql_ratings = "SELECT *
                FROM ratings";


$results_genres = mysqli_query($conn, $sql_genres);
if(!$results_genres){
    exit("Genres SQL Error: " . mysqli_error($conn));
}

$results_sounds = mysqli_query($conn, $sql_sounds);
if(!$results_sounds){
    exit("SQL Error: " . mysqli_error($conn));
}

$results_labels = mysqli_query($conn, $sql_labels);
if(!$results_labels){
    exit("SQL Error: " . mysqli_error($conn));
}

$results_formats = mysqli_query($conn, $sql_formats);
if(!$results_formats){
    exit("SQL Error: " . mysqli_error($conn));
}

$results_ratings = mysqli_query($conn, $sql_ratings);
if(!$results_ratings){
    exit("SQL Error: " . mysqli_error($conn));
}

// 3. Display data.
$row = mysqli_fetch_array($results);
?>

<form method="get" action="dvd_update.php">
    Title: <input type="text" name="title" value="<?php echo $row['title']; ?>">
    <br>
    Genre:
    <select name="genre_id">
        <?php
        while($row_genres = mysqli_fetch_array($results_genres)){
            if($row_genres['genre_id'] == $row['genre_id']){
                echo "<option selected='1' value='" . $row_genres["genre_id"] . "'>" . $row_genres["genre"] . "</option>";
            } else {
                echo "<option value='" . $row_genres["genre_id"] . "'>" . $row_genres["genre"] . "</option>";
            }
        }
        ?>
    </select>
    <br>

    Label:
    <select name="label_id">
        <?php
        while($row_labels = mysqli_fetch_array($results_labels)){
            if($row_labels['label_id'] == $row['label_id']){
                echo "<option selected='1' value='" . $row_labels["label_id"] . "'>" . $row_labels["label"] . "</option>";
            } else {
                echo "<option value='" . $row_labels["label_id"] . "'>" . $row_labels["label"] . "</option>";
                }
            }
        ?>

    </select>
    <br/>

    Sound:
    <select name="sound_id">
        <?php
        while($row_sounds = mysqli_fetch_array($results_sounds)){
            if($row_sounds['sound_id'] == $row['sound_id']){
                echo "<option selected='1' value='" . $row_sounds["sound_id"] . "'>" . $row_sounds["sound"] . "</option>";
            } else {
                echo "<option value='" . $row_sounds["sound_id"] . "'>" . $row_sounds["sound"] . "</option>";
            }
        }
        ?>

    </select>
    <br/>

    Format:
    <select name="format_id">
        <?php
        while($row_formats = mysqli_fetch_array($results_formats)){
            if($row_formats['format_id'] == $row['format_id']){
                echo "<option selected='1' value='" . $row_formats["format_id"] . "'>" . $row_formats["format"] . "</option>";
            } else {
                echo "<option value='" . $row_formats["format_id"] . "'>" . $row_formats["format"] . "</option>";
            }
        }
        ?>
    </select>
    <br>

    Rating:
    <select name="rating_id">
        <?php
        while($row_ratings = mysqli_fetch_array($results_ratings)){
            if($row_ratings['rating_id'] == $row['rating_id']){
                echo "<option selected='1' value='" . $row_ratings["rating_id"] . "'>" . $row_ratings["rating"] . "</option>";
            } else {
                echo "<option value='" . $row_ratings["rating_id"] . "'>" . $row_ratings["rating"] . "</option>";
            }
        }
        ?>

    </select>
    <br>

    Award:
    <input name="award" value="<?php echo $row['award']; ?>">

    <input type="hidden" name="dvd_title_id" value="<?php echo $row['dvd_title_id']; ?>">

    <br><br>
    <input type="submit"> <!-- SUBMIT button -->
</form>

