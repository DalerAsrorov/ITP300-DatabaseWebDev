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

$sql_genres = "SELECT *
               FROM genres";

$sql_sounds = "SELECT *
               FROM sounds";

$sql_labels= "SELECT *
               FROM labels";

$sql_formats = "SELECT *
               FROM formats";

$results_ratings = mysqli_query($conn, $sql_ratings);
if(!$results_ratings){
    exit("SQL Error: " . mysqli_error($conn));
}

$results_genres = mysqli_query($conn, $sql_genres);
if(!$results_genres){
    exit("Genres SQL Error: " . mysqli_error($conn));
}

$results_labels = mysqli_query($conn, $sql_labels);
if(!$results_labels){
    exit("Genres SQL Error: " . mysqli_error($conn));
}

$results_sounds = mysqli_query($conn, $sql_sounds);
if(!$results_sounds){
    exit("Genres SQL Error: " . mysqli_error($conn));
}

$results_formats = mysqli_query($conn, $sql_formats);
if(!$results_formats){
    exit("Genres SQL Error: " . mysqli_error($conn));
}

$results_ratings = mysqli_query($conn, $sql_ratings);
if(!$results_ratings){
    exit("Genres SQL Error: " . mysqli_error($conn));
}

?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="get" action="dvd_insert.php">
    Title: <input type="text" name="title">
    <br/>
    Rating:
    <select name="rating_id">
        <option> </option>
        <?php
        while($row = mysqli_fetch_array($results_ratings)){
            echo "<option value='" . $row["rating_id"] . "'>" . $row["rating"] . "</option>";
        }
        ?>

    </select>
    <br/>

    Genre:
    <select name="genre_id">

        <option> </option>
        <?php
        while($row = mysqli_fetch_array($results_genres)){
            echo "<option value='" . $row["genre_id"] . "'>" . $row["genre"] . "</option>";
        }
        ?>

    </select>
    <br/>

    Label:
    <select name="label_id">

        <option > </option>
        <?php
        while($row = mysqli_fetch_array($results_labels)){
            echo "<option value='" . $row["label_id"] . "'>" . $row["label"] . "</option>";
        }
        ?>

    </select>
    <br/>

    Sound:
    <select name="sound_id">

        <option > </option>
        <?php
        while($row = mysqli_fetch_array($results_sounds)){
            echo "<option value='" . $row["sound_id"] . "'>" . $row["sound"] . "</option>";
        }
        ?>

    </select>
    <br/>

    Format:
    <select name="format_id">

        <option > </option>
        <?php
        while($row = mysqli_fetch_array($results_formats)){
            echo "<option value='" . $row["format_id"] . "'>" . $row["format"] . "</option>";
        }
        ?>
    </select>
    <br>

    <br>
    <input type="submit">
</form>
</body>
</html>