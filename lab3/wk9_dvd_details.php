<?php

$dvd_title_id = $_GET['dvd_title_id'];
if(empty($dvd_title_id)){
    header("Location: wk9_dvd_search.php");
}

// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

$mysqli = new mysqli($host, $username, $password, $database);

if($mysqli->connect_errno){
    exit("DB Connection Error: " . $mysqli->connect_errno);
}

// 2. Generate & Submit SQL.
$sql = "SELECT *
        FROM dvd_titles
        WHERE dvd_title_id = $dvd_title_id";

$results = $mysqli->query($sql);
if(!$results){
    exit("SQL Error: " . $mysqli->error);
}

// 3. Display data.
$row = $results->fetch_array(MYSQLI_ASSOC);
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
</table>







