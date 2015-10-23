<?php

$dvd_title_id = $_GET['dvd_title_id'];

// Trap to stop the page if dvd_title_id was not passed to this page.
if(empty($dvd_title_id)){
    header("Location: dvd_search.php");
}


$dvd_title_id = $_GET['dvd_title_id'];
$title = $_GET['title'];
$genre_id = $_GET['genre_id'];
$label_id = $_GET['label_id'];
$sound_id = $_GET['sound_id'];
$format_id = $_GET['format_id'];
$rating_id = $_GET['rating_id'];
$award = $_GET['award'];

// 1. Establish DB Connection
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

$title = mysqli_real_escape_string($conn, $title);

$sql = "UPDATE dvd_titles
        SET title = '$title', genre_id = $genre_id, label_id = $label_id, sound_id = $sound_id, format_id = $format_id,
            rating_id = $rating_id, award = '$award'
        WHERE dvd_title_id = $dvd_title_id";

echo "<hr>$sql<hr>";

$results = mysqli_query($conn, $sql);

if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
} else {
    echo "Record $title was successfully updated. ";
    echo "Click <a href='dvd_search.php'>here</a> to search for it and check if it was added.";
}

// 3. Display Data.



