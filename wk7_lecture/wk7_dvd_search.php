<?php
// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_zune_dvd";
$password = "usc2015";
$database = "asrorov_dvd_db";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
    exit("DB Connection Error: " . mysqli_connect_error());
}

// 2. Generate & Submit SQL
$sql_ratings = "SELECT *
        FROM ratings";

$sql_genres = "SELECT * FROM genres";


$results_ratings = mysqli_query($conn, $sql_ratings);
if(!$results_ratings){
    exit("SQL Error: " . mysqli_error($conn));
}

$results_genres = mysqli_query($conn, $sql_genres);
if(!$results_genres) {
    exit("Genre SQL Error: " . mysqli_error($conn));
}

?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="get" action="wk7_dvd_results.php">
        Title: <input type="text" name="title">
        <br/>
        Rating:
        <select name="rating_id">
            <!--            <option value="2">NR</option>-->
            <!--            <option value="3">NC-17</option>-->
            <!--            <option value="4">NR</option>-->

            <?php
            while($row = mysqli_fetch_array($results_ratings)){
                echo "<option value='" . $row["rating_id"] . "'>" . $row["rating"] . "</option>";
            }
            ?>

        </select>
        <br/>

        Genre:
        <select name="genre_id">
            <!--            <option value="2">NR</option>-->
            <!--            <option value="3">NC-17</option>-->
                       <option value="4">NR</option>
            <?php
            while($row = mysqli_fetch_array($results_genres)){
                echo "<option value='" . $row["genre_id"] . "'>" . $row["genre"] . "</option>";
                echo "<option value='" . $row['genre_id'] . "'>" . $row['genre'] . "</option>";
            }
            ?>

        </select>
        <br/>
        <input type="submit">
    </form>
</body>
</html>