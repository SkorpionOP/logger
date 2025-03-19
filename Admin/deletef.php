<?php
include("../configASL.php");
$idf=$_GET['delf'];
mysqli_query($al,"delete from feedback where st_pin='$idf'");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='feedback.php';
</script>
