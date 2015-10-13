<?php

// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
    exit("DB Connection Error: " . mysqli_connect_error($conn));
}

// 2. Generate & Submit SQL
$title = $_GET['title'];
$genre_id = $_GET['genre_id'];
$rating_id = $_GET['rating_id'];
$sound_id = $_GET['sound_id'];
$label_id = $_GET['label_id'];
$format_id = $_GET['format_id'];

$form_path = 'http://asrorov.student.uscitp.com/itp300/assignment6/dvd_form.php';

if (empty($title)) {
    exit("The title is empty. Plese try again: " . "<a href=$form_path>Back</a>");
}
if (empty($genre_id )) {
    exit("The genre is empty. Plese try again: " . "<a href=$form_path>Back</a>");
}
if (empty($sound_id )) {
    exit("The sound is empty. Plese try again: " . "<a href=$form_path>Back</a>");
}
if (empty($label_id)) {
    exit("The label is empty. Plese try again: " . "<a href=$form_path>Back</a>");
}
if (empty($format_id)) {
    exit("The format is empty. Plese try again: " . "<a href=$form_path>Back</a>");
}
if (empty($rating_id)) {
    exit("The rating is empty. Plese try again: " . "<a href=$form_path>Back</a>");
}

$sql = "INSERT INTO dvd_titles (title, genre_id, rating_id, sound_id, label_id, format_id)
        VALUES ('$title', $genre_id, $rating_id, $sound_id, $label_id, $format_id);";

$results = mysqli_query($conn, $sql);
if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
} else {
    echo "The movie $title has been added to your databases. Go to <a href='dvd_search.php'>Search </a> page
        to make sure it was added.";
}
?>







