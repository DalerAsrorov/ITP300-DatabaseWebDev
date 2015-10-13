<?php
/**
 * Created by PhpStorm.
 * User: daler
 * Date: 10/1/15
 * Time: 2:20 PM
 */

$host = "uscitp.com";
$username="asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()) {
    exit("DB Connection Error: " . mysqli_connect_error());
}

//2. Generate & submit SQL
$sql = "SELECT *
        FROM dvd_titles";

$results = mysqli_query($conn, $sql);
if(!$results) {
    exit("SQL Error: " . mysqli_error($conn) );
}

//if($results == FALSE
echo "Your query returned " . mysqli_num_rows($results) . " results <br><br>";

//$row = mysqli_fetch_array($results);

//var_dump($row);
echo $row["title"] . "<br>";

while($row = mysqli_fetch_array($results)) {
    echo $row["dvd_title_id"] . ": " . $row["title"] . "<br>";
}