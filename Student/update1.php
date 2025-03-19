<?php 
include("../configASL.php");
    function updateLabStatus($al) {
    date_default_timezone_set("Your/Timezone");
    $current_time = date("H:i:s");
    $sql_check = "SELECT `end` FROM `labs` WHERE `Status`=1";
    $result = mysqli_query($al, $sql_check);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $end_time = $row['end'];
        if ($current_time >= $end_time) {
            $sql_update = "UPDATE `labs` SET `Status`=0, `start`='00:00:00', `end`='00:00:00' WHERE `Status`=1";
            mysqli_query($al, $sql_update);
        }
    }
}
?>
hello