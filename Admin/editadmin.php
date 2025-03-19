
<?php
include("../configASL.php");
session_start();
if(isset($_SESSION["lab"])){
   header("location: ./Login.php");
 }
 $user = $_SESSION['aid'];
$sql = "SELECT * FROM `admin` WHERE `aid`='$user';";
$res1 = mysqli_query($al, $sql);
if(!mysqli_num_rows($res1) > 0) {
    header("location: ../logout.php");
    exit; 
} 

if(!empty($_POST))
{
	$aid=($_SESSION['aid']);
	$pass=($_POST['pass']);
        $passn=($_POST['pass1']);
    $sql=mysqli_query($al,"select * from admin where password='$pass'");

	if(mysqli_num_rows($sql)>0)
	{
            $u=mysqli_query($al,"update admin set password='$passn' where aid='$aid'");
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
         <label class="logo">Edit Panel</label>
        <ul>
            <li><a class="active" href="home.php">Home</a></li>
            <li>
               <a href="search.php">Search
               <i class="fas fa-caret-down"></i>
               </a>
            
            </li>
            <li>
               <a href="tech.php">Assign Lab
               <i class="fas fa-caret-down"></i>
               </a>
            
            </li>
            <li>
               <a href="#">student view
               <i class="fas fa-caret-down"></i>
               </a>
               <ul>
                  <li style="width:100%;" ><a href="reg.php">Add Student</a></li>
                  <li><a href="viewst.php">Students</a></li>
                
               </ul>
            </li>
            <li><a href="feedback.php">Feedback</a></li>
<li>
               <a href="#">settings
               <i class="fas fa-caret-down"></i>
               </a>
               <ul>
                  <li><a href="editadmin.php">Manage Admin</a></li>
                
               </ul>
            <li><a href="exit1.php">Logout</a></li>
         </ul>
      </nav>

<div class="login" style="margin-left:-300px">
  <h2>Change Password</h2>
<form method="post" action="" >
   <div class="mydiv">
      <input type="text" name="aid" required="" placeholder="Enter Admin Name" style="color:aqua;" value = "<?php echo $user ?>" disabled>
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

<div class="login" style="margin-left:600px">
  <h2>New Admin</h2>
<form method="post" action="user.php" >
   <div class="mydiv">
      <input type="text" name="aid" required="" placeholder="Enter Admin Name" style="color:aqua;" >
     <div class="mydiv">
      <input type="password" name="pass" required="" placeholder="Enter PASSWORD" style="color:aqua;">
          <input type="password" name="pass1" required="" placeholder="Enter Confirm PASSWORD" style="color:aqua;">
     
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
