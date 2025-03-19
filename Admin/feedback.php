<?php
include("../configASL.php");
session_start();
 $user = $_SESSION['aid'];
$sql = "SELECT * FROM `admin` WHERE `aid`='$user';";
$res1 = mysqli_query($al, $sql);
if(!mysqli_num_rows($res1) > 0) {
    header("location: ../logout.php");
    exit; 
} 
if(isset($_SESSION["lab"])){
  header("location: ./Login.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($al,"select * from admin where aid='admin'");
$b=mysqli_fetch_array($a);
$el=$b['ele'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];		
?>
<!doctype html>
<html>
<head>       

<title>log</title>
<link href="styler.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />   

 <style>
     table, tr, td
{
	border:1px solid rgba(0,0,0,1.00);
	border-collapse:collapse;
	border-spacing: 300px;
border-color:#ffff;
	font-family:"Trebuchet MS";
	font-size:14px;
	padding:10px;
}
.login form button {
	background-color:transparent;
height:40px;
width:200px;
border:0px;
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login button:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login button span {
  position: absolute;
  display: block;
}

.login button span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login button span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login button span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login button span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

</style>
</head>

<body style="background: #063247;">
  <nav>
         <label class="logo">Feedback Panel</label>
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
<br>
<br>


    <center>
           
        <br>
        <br>
<div class="login">
<form action="home.php">
     <div class="container" align="center" style="background: #063247; color:white;   box-shadow: 0 3px 15px rgba(0,0,0,.8);"> 

    
  <div class="title">FEEDBACK </div>
    <br>
<br>

	<table border="0" cellpadding="10px" cellspacing="20" border:2; style="color:whitesmoke; " >
    <tr style="font-weight:bold;">
    <td>Sr. No.</td>
    <td>PIN NO</td>
 
    <td>FEEDBACK</td>
     <td>DELETE</td>      
    
    </tr>
    <?php
	$sr=1;
	$h=mysqli_query($al,"select * from feedback ");
	while($j=mysqli_fetch_array($h))
	{
		?>
        <tr>
        <td><?php echo $sr;$sr++;?></td>
           <td><?php echo $j['st_pin'];?></td>
        <td><?php echo $j['feedback'];?></td>
        <td align="center"><a href="deletef.php?delf=<?php echo $j['st_pin'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
        </tr>
     <?php } ?>
     </table>
     <br>
<button type="suubmit" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>	
Back
        
</button>
</form>
<br>
<br>
</div>



<br>
<br>


<br>
<br>
    
</div>       
    <center>
</body>
</html>