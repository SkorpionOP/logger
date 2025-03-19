<?php
include("../configASL.php");
$id1=$_GET['update'];
mysqli_query($al,"UPDATE `labs` set `status`=0 where `Labs`='$id1'");
?>
<script type="text/javascript">
alert("Successfully Updated");
window.location='tech.php';
</script>