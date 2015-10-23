<?php

$title = $_GET['title'];
$rating_id = $_GET['rating_id'];
$genre_id= $_GET['genre_id'];

// 1. Establish DB Connection
// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

$mysqli = new mysqli($host, $username, $password, $database);

if($mysqli->connect_errno){
    exit("DB Connection Error: " . $mysqli->connect_errno);
}
// 2. Generate & Submit SQL
$sql = "SELECT *
        FROM dvd_titles, ratings, genres
        WHERE dvd_titles.rating_id = ratings.rating_id
          AND dvd_titles.genre_id = genres.genre_id
          AND title LIKE '%$title%'";

if(strtolower($rating_id) != 'all'){
    $sql = $sql . " AND dvd_titles.rating_id = $rating_id";
}

if(strtolower($genre_id) != 'all'){
    $sql = $sql . " AND dvd_titles.genre_id = $genre_id";
}

//echo "<hr>$sql<hr>";

$results = $mysqli->query($sql);
if(!$results){
    exit("SQL Error: " . $mysqli->error);
}

// 3. Display data
echo "Your search returned " . mysqli_num_rows($results) . " results.<br><br>";
?>

<table>
    <tr>
        <td></td>
        <td></td>
        <td>Title</td>
        <td>Genre</td>
        <td>Rating</td>
    </tr>

    <?php
    while($row = $results->fetch_array(MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td><a href='wk9_dvd_delete.php?dvd_title_id=" . $row['dvd_title_id'] . "' onclick='return confirm(\"Are you sure you want to delete " . $row['title'] . "?\")'>[DELETE]</a></td>";
        echo "<td><a href='wk9_dvd_edit.php?dvd_title_id=" . $row['dvd_title_id'] . "'>[EDIT]</a></td>";
        echo "<td><a href='wk9_dvd_details.php?dvd_title_id=" . $row['dvd_title_id'] . "'>" . $row['title'] . "</a></td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>






