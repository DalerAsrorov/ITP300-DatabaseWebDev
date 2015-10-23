<?php
// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

//$conn = mysqli_connect($host, $username, $password, $database);


//if($mysqli->connect_errno) {
//    exit("DB Connection Error: " . mysqli_connect_error());
//}

$mysqli = new mysqli($host, $username, $password, $database);

if($mysqli->connect_errno){
    exit("DB Connection Error: " . $mysqli->connect_errno);
}

// 2. Generate & Submit SQL
$sql_ratings = "SELECT *
                FROM ratings";

$sql_genres = "SELECT *
               FROM genres";

$results_ratings = $mysqli->query($sql_ratings);
if(!$results_ratings){
    exit("SQL Error: " . $mysqli->error);
}

$results_genres = $mysqli->query($sql_genres);
if(!$results_genres){
    exit("Genres SQL Error: " . $mysqli->error);
}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="get" action="wk9_dvd_results.php">
        Title: <input type="text" name="title">
        <br/>
        Rating:
        <select name="rating_id">
            <option value="ALL">All</option>
            <?php
            while($row = $results_ratings->fetch_array(MYSQLI_ASSOC)){
                echo "<option value='" . $row["rating_id"] . "'>" . $row["rating"] . "</option>";
            }
            ?>

        </select>
        <br/>

        Genre:
        <select name="genre_id">
            <option value="all">All</option>
            <?php
            while($row = $results_genres->fetch_array(MYSQLI_ASSOC)){
                echo "<option value='" . $row["genre_id"] . "'>" . $row["genre"] . "</option>";
            }
            ?>

        </select>
        <br/>

        <input type="submit">
    </form>
<hr/>
<a href="wk9_dvd_form.php">Add a DVD Record</a>
</body>
</html>