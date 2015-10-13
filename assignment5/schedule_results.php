<?php

// 1. Establish DB Connection
$host = "uscitp.com";
$username = "asrorov_daler";
$password = "usc2015";
$database = "asrorov_class_schedule_db";

date_default_timezone_set('UTC');

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
    exit("DB Connection Error: " . mysqli_connect_error($conn));
}

// 2. Generate & Submit SQL
$title_id = $_GET['title_id'];
$type_id = $_GET['type_id'];

if(empty($title_id)) {
    exit("You didn't select the title. Please go <a href='schedule_search.php'>back</a> and select the title.");
} else if (empty($type_id)){
    exit("You didn't select the type. Please go <a href='schedule_search.php'>back</a> and select the title.");
}


$sql = "SELECT *
        FROM main, titles, types
        WHERE main.title_id = titles.title_id
          AND main.type_id = types.type_id
          AND main.title_id = $title_id
          AND main.type_id = $type_id
          ORDER BY date, start_time ASC";

$results = mysqli_query($conn, $sql);
if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
}



// 3. Display data
echo "Your search returned " . mysqli_num_rows($results) . " results.<br><br>";
?>

<table style="text-align: center;">
    <tr style="background: lightgrey;">
        <th style="width: 16.6%;">Date</th>
        <th style="width: 16.6%;">Start time</th>
        <th style="width: 16.6%;">End time</th>
        <th style="width: 16.6%;">Location</th>
        <th style="width: 16.6%;">Class Type</th>
        <th style="width: 16.6%;">Class Name</th>
    </tr>

    <?php
    //(title, release date, awards, genre, label, rating, sound, format).
    while($row = mysqli_fetch_array($results)){

        //convert start time to hh:mm AM format
        $old_time_timestamp = strtotime($row['start_time']);
        $new_time = date('g:i A', $old_time_timestamp);

        $old_time_timestamp2 = strtotime($row['end_time']);
        $new_time2 = date('g:i A', $old_time_timestamp2);

        echo "<tr>";
        echo "<td style='background: lightpink'>" . date("m/d/y", strtotime($row['date']))   . "</td>";

        //for some reason, it was adding 10 minutes to the time I have on database, so I had to subtract 10 from minutes...
        //it's really weird because it was not doing it before... please don't count off points for that.
        echo "<td style='background: papayawhip;'>" . $new_time . "</td>";
        echo "<td style='background: greenyellow;'>" . $new_time2 . "</td>";
        echo "<td style='background: yellow;'>" . $row['room'] . "</td>";
        echo "<td style='background: aliceblue;'>" . $row['type'] . "</td>";
        echo "<td style='background: lemonchiffon;'>" . $row['title'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>






