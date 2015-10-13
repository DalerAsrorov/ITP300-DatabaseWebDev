<?php
// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_daler";
$password = "usc2015";
$database = "asrorov_class_schedule_db";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
    exit("DB Connection Error: " . mysqli_connect_error());
}

// 2. Generate & Submit SQL
$sql_titles = "SELECT *
                FROM titles";

$sql_types = "SELECT *
               FROM types";

$results_titles = mysqli_query($conn, $sql_titles);
if(!$results_titles){
    exit("SQL Error: " . mysqli_error($conn));
}

$results_types = mysqli_query($conn, $sql_types);
if(!$results_types){
    exit("Genres SQL Error: " . mysqli_error($conn));
}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="get" action="schedule_results.php">
    Title:
    <select name="title_id">
        <option></option>
        <?php
        while($row = mysqli_fetch_array($results_titles)){
            echo "<option value='" . $row["title_id"] . "'>" . $row["title"] . "</option>";
        }
        ?>

    </select>
    <br/>

    Type:
    <select name="type_id">

        <option></option>
        <?php
        while($row = mysqli_fetch_array($results_types)){
            echo "<option value='" . $row["type_id"] . "'>" . $row["type"] . "</option>";
        }
        ?>

    </select>
    <br/>

    <input type="submit">
</form>
</body>
</html>