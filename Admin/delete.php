<?php
include("../configASL.php");
$id=$_GET['del'];
mysqli_query($al,"delete from student where st_pin='$id'");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='viewst.php';
</script>
