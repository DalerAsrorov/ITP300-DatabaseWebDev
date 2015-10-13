<?php
$dvd_title_id = $_GET['dvd_title_id'];
if(empty($dvd_title_id)) {
    exit("DVD Title cannot be empty. <a href='week7_dvd_search.php'> Go Back </a>");
}

// 1. Establish DB Connection.
$host = "uscitp.com";
$username = "asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
    exit("DB Connection Error: " . mysqli_connect_error());
}

//2. Generate & Submit SQL.
$sql = "SELECT *
          FROM dvd_titles
          WHERE dvd_title_id =";

$results = mysqli_query($conn, $sql);
if(!$results) {
    exit("SQL Error: " . mysqli_error($conn));
}

//3. Display data.
$row = mysqli_fetch_array($results);
?>

<table>
    <tr>
        <td>Title: </td>
        <td><?php echo $row['title']; ?></td>
    </tr>
    <tr>
        <td>Release Date: </td>
        <td><?php echo $row['release_date']; ?></td>
    </tr>
</table>
