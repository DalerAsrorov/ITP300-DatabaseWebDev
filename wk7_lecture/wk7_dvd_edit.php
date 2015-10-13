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

if(mysqli_connect_errno($conn)){
    exit("DB Connection Error: " . mysqli_connect_error());
}

// 2. Generate & Submit SQL.
$sql = "SELECT *
        FROM dvd_titles
        WHERE dvd_title_id = $dvd_title_id";

$results = mysqli_query($conn, $sql);
if(!$results) {
    exit("SQL ERROR: " . mysqli_connect_error($conn));
}

$sql_genres = "SELECT *
        FROM dvd_titles
        WHERE dvd_title_id = $dvd_title_id";

$results = mysqli_query($conn, $sql);
if(!$results) {
    exit("SQL ERROR: " . mysqli_connect_error($conn));
}


// 3. Display data.
$row_genres = mysqli_fetch_array($results);
$row_genres = mysqli_fetch_array($results);
?>

<form method="get" action="wk7_dvd_update.php">
    Title: <input type="text" name="title" value="<?php echo $row['title']; ?>">
    <br>
    Genre:
    <select name="genre_id">
        <?php
        while($row_genres = mysqli_fetch_array($results_genres)){
            if ($row_genres['genre_id'] == $row['genre_id']) {
                echo "<option selected='1' value='" . $row_genres["genre_id"] . "'>" . $row_genres["genre"] . "</option>";
            } else {
                echo "<option value='" . $row_genres["genre_id"] . "'>" . $row_genres["genre"] . "</option>";
            }

        }
        ?>
    </select>
    <br>
    <input type="hidden" name="dvd_title_id" value="<?php echo $row['dvd_title_id']; ?>">
    <input type="submit">
</form>

