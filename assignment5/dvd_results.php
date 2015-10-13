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

//remove slashes from the entered search
$title = addslashes($title);


//EXTRA CREDIT: initialzing sql
$sql = "SELECT *
            FROM dvd_titles, ratings, genres, formats, labels, sounds
            WHERE dvd_titles.rating_id = ratings.rating_id
              AND dvd_titles.genre_id = genres.genre_id
              AND dvd_titles.format_id = formats.format_id
              AND dvd_titles.sound_id = sounds.sound_id
              AND dvd_titles.label_id = labels.label_id
              AND dvd_titles.sound_id = sounds.sound_id
              AND dvd_titles.title LIKE '%$title%'";

//if-else statements to concat the sql queries based on the user's search
if ($rating_id < 0 and $genre_id < 0) {
         $sql .= "";

}
else if($rating_id == -1) {
    $sql .= "AND dvd_titles.genre_id = $genre_id";
}

else if($genre_id == -2)
{
    $sql .= "AND dvd_titles.rating_id = $rating_id";
}
else {
    $sql .=  "AND dvd_titles.genre_id = $genre_id
             AND dvd_titles.rating_id = $rating_id";
}

$results = mysqli_query($conn, $sql);

if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
}

// 3. Display data
echo "Your search returned " . mysqli_num_rows($results) . " results.<br><br>";
?>

<table>
    <tr style="background: lightgrey">
        <th style="width: 14.3%">Title</th>
        <th style="width: 14.3%">Release Date</th>
        <th style="width: 14.3%">Genre</th>
        <th style="width: 14.3%">Label</th>
        <th style="width: 14.3%">Rating</th>
        <th style="width: 14.3%">Sound</th>
        <th style="width: 14.3%">Format</th>
    </tr>

    <?php
    //(title, release date, awards, genre, label, rating, sound, format).
    while($row = mysqli_fetch_array($results)){
        echo "<tr>";
        echo "<td style='background: lightpink;'>" . $row['title'] . "</td>";
        echo "<td style='background: papayawhip;'>" . $row['release_date'] . "</td>";
        echo "<td style='background: greenyellow; width: 100px'>" . $row['genre'] . "</td>";
        echo "<td style='background: yellow; width: 100px'>" . $row['label'] . "</td>";
        echo "<td style='background: aliceblue; width: 100px'>" . $row['rating'] . "</td>";
        echo "<td style='background: powderblue; width: 100px'>" . $row['sound'] . "</td>";
        echo "<td style='background: floralwhite; width: 100px'>" . $row['format'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>