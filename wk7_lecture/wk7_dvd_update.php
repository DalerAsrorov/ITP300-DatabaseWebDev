<?php
$dvd_title_id = $_GET['dvd_title_id'];
$title = $_GET['title'];
$genre_id = $_GET['genre_id'];


// 2. Generate & Submit SQL
$sql = "UPDATE dvd_titles
        FROM dvd_titles, ratings, genres
        WHERE dvd_titles.rating_id = ratings.rating_id
          AND dvd_titles.genre_id = genres.genre_id";

$results = mysqli_query($conn, $sql);
if (!$results) {
    exit("SQL Error: " . mysqli_error($conn));
}

$title = mysqli_real_escape_string($conn, $title);

$sql = "UPDATE dvd_titles
        SET title='$title', genre_id = $genre_id
        WHERE dvd_title_id = $dvd_title_id";

$results = mysqli_query($conn, $sql);
if(!results) {
    exit("SQL error: " . mysqli_error($conn));
} else {
    echo "Record $dvd_title_id was succcessfully updated.";
}

echo "<hr>$sql<hr>";