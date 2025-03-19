
<?php
include("../configASL.php");
session_start();
$aid=$_SESSION['st_pin'];
$sql = "select * from student where st_pin='$aid'";
$res1 = mysqli_query($al, $sql);
if(!mysqli_num_rows($res1) > 0) {
    header("location: ./../logout.php");
    exit; 

}  
if(!empty($_POST))
{
	$aid=($_SESSION['aid']);
	$pass=($_POST['pass']);
        $passn=($_POST['pass1']);
    $sql=mysqli_query($al,"select * from student where st_pin='$aid' AND password='$pass'");

	if(mysqli_num_rows($sql)>0)
	{
            $u=mysqli_query($al,"update student set password='$passn' where st_pin='$aid'");
            while($row=mysqli_fetch_assoc($sql))  
    {  
           
		header("location:student_view.php");
            	
        
    } }
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect Admin ID or Password");
		</script>
      <?php
	}
}
?>
<!doctype html>
<html>
<head>

<title>DLLB</title>
<link rel="stylesheet" href="log.css" >
 <link rel="stylesheet" href="admin.css" >
 <style>
       h2 {
  margin: 0 0 50px;
  height: 30px;
  font-size:30px;
  padding: 0;
  color: #fff;
  text-align: center;
}


</style>

<body>

<nav>
         <label class="logo">Student Panel</label>
         <ul>
            <li><a class="active" href="stlog.php">Home</a></li>
            <li>
               <a href="student_view.php">Join Lab
               <i class="fas fa-caret-down"></i>
               </a>
            
            </li>
            <li>
               <a href="#">settings
               <i class="fas fa-caret-down"></i>
               </a>
               <ul>
                  <li><a href="Change_password.php">Change Password</a></li>
               </ul>
</li>
            <li><a href="exit1.php">Logout</a></li>
         </ul>
      </nav>

<div class="login" >
  <h2>Change Password</h2>
<form method="post" action="" >
   <div class="mydiv">
      <input type="text" name="aid" required="" placeholder="Enter Student ID" style="color:aqua;" value = "<?php echo $aid ?>" disabled>
     <div class="mydiv">
      <input type="password" name="pass" required="" placeholder="Enter Old PASSWORD" style="color:aqua;">
          <input type="password" name="pass1" required="" placeholder="Enter New PASSWORD" style="color:aqua;">
     
    </div>
<button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
 submit
        
</button>
           
  </form>
</div>


</body>
</html>
