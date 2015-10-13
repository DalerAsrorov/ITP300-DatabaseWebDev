<?php

    $sql = "SELECT * FROM ratings";

    $results = mysqli_query($conn)
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="get" action="wk6_dvd_results.php">
        Title: <input type="text" name="title">
        <br/>
        Rating:
        <select name="rating_id">
            <option value="2">NR</option>
            <option value="3">NC-17</option>
            <option value="4">NR</option>
        </select>
        <br/>
        <input type="submit">
    </form>
</body>
</html>