<?php
include("configASL.php");
session_start();
if(!empty($_POST))
{
	$aid=($_POST['aid']);
	$pass=($_POST['pass']);
	$sql=mysqli_query($al,"select * from admin where aid='$aid'and password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$aid;
    session_regenerate_id(true);
		header("location:Admin/home.php");
    
	}
  
	else
	{
    $sql1=mysqli_query($al,"select * from student where st_pin='$aid'and password='$pass'");
    if(mysqli_num_rows($sql1)== 1)
    {
      $_SESSION['st_pin']=$_POST['aid'];
		header("location:Student/stlog.php");
    }}
		?>
        <script type="text/javascript">
		alert("Incorrect ID or Password");
		</script>
      <?php


}

?>
<!doctype html>
<html>
<head>

<title>DLLB</title>
<link href="log.css" rel="stylesheet" type="text/css" />

</head>

<body>


<div class="login">
  <h2 style=" letter-spacing: 2px;">LOGIN</h2>
<form method="post" action="" >
    <div class="mydiv">
      <input type="text" name="aid" required="" placeholder="ENTER ID">
    </div>
    <div class="mydiv">
      <input type="password" name="pass" required="" placeholder="PASSWORD">
    </div>
    <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
       LOGIN 
    </button>
           
  </form>
</div>


</body>
</html>