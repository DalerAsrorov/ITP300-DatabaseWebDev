<?php

$dvd_title_id = $_GET['dvd_title_id'];
if(empty($dvd_title_id)){
    header("Location: wk8_dvd_search.php");
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

// 2. Generate & submit SQL.
$sql_select = "SELECT title
               FROM dvd_titles
               WHERE dvd_title_id = $dvd_title_id";

$sql = "DELETE FROM dvd_titles
        WHERE dvd_title_id = $dvd_title_id";

//echo "$sql<hr>";

$results_select = mysqli_query($conn, $sql_select);
if(!$results_select){
    exit("Select SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_array($results_select);
$title = $row['title'];

$results = mysqli_query($conn, $sql);
if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
} else {
    echo "DVD <strong>$title</strong> was successfully deleted. <a href='dvd_search.php'>Go back to search page</a>";
}






