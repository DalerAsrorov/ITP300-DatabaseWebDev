<?php

$dvd_title_id = $_GET['dvd_title_id'];

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
$sql = "SELECT *
        FROM dvd_titles, ratings, genres, formats, sounds, labels
        WHERE dvd_title_id = $dvd_title_id
          AND dvd_titles.genre_id = genres.genre_id
          AND dvd_titles.label_id = labels.label_id
          AND dvd_titles.format_id = formats.format_id
          AND dvd_titles.sound_id = sounds.sound_id
          AND dvd_titles.rating_id = ratings.rating_id";

$results = mysqli_query($conn, $sql);
if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
}

// 3. Display data.
$row = mysqli_fetch_array($results);
?>

<table>
    <tr>
        <td>Title: </td>
        <td><?php echo $row['title']; ?></td>
    </tr>
    <tr>
        <td>Release Date:</td>
        <td><?php echo $row['release_date']; ?></td>
    </tr>
    <tr>
        <td>Genre:</td>
        <td><?php echo $row['genre']; ?></td>
    </tr>
    <tr>
        <td>Label:</td>
        <td><?php echo $row['label']; ?></td>
    </tr>
    <tr>
        <td>Rating:</td>
        <td><?php echo $row['rating']; ?></td>
    </tr>
    <tr>
        <td>Sound:</td>
        <td><?php echo $row['sound']; ?></td>
    </tr>
    <tr>
        <td>Format:</td>
        <td><?php echo $row['format']; ?></td>
    </tr>
    <tr>
        <td>Award:</td>
        <td><?php echo $row['award']; ?></td>
    </tr>
</table>
<br>

<a href="dvd_search.php">Go Back to Search</a> <br><br>








