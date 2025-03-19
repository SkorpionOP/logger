<?php
include("../configASL.php");
session_start();
 $user = $_SESSION['aid'];
$sql = "SELECT * FROM `admin` WHERE `aid`='$user';";
$res1 = mysqli_query($al, $sql);
if(!mysqli_num_rows($res1) > 0) {
    header("location: ./../logout.php");
    exit; 
} 


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

<link href="admin.css" rel="stylesheet" type="text/css" />  
<link href="styler1.css" rel="stylesheet" type="text/css" />

 <style>
       .container{
color:#fff;
margin-left: 80PX;
  max-width: 700px;
  width: 100%;
               height:auto;
  background: #063247;

  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 0 20px 5px #211121;
}
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
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  float: left;
  font-color:white;
}
     table, tr, td
{
  border:1px solid rgba(0,0,0,1.00);
  border-collapse:collapse;
  border-spacing: 300px;
  border-color:#ffff;
  font-family:"Trebuchet MS";
  font-size:13.7px;
  padding:10px;
}

.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  color:white;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid white;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
 background:transparent;
}

</style>
</head>

<body style="background: #063247;">
  <nav>
         <label class="logo">Admin Panel</label>
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
           
        <br>
        <br>
<div class="login">

  <form action="" method="POST">  
     <div class="container" align="center" style="background:#063247; color:black;   box-shadow: 0 3px 15px rgba(0,0,0,.8);"> 

       
  <div class="title" style="color:white;">SEARCH BY</div><br><br>
        <div class="content" style="color:white;">
<br>
     
        <div class="user-details" >
            <div class="input-box" >
            <span class="details" >ENTER BATCH NO.</span>
         <input type="text" value="@Bool IS NULL" placeholder="Enter your Batch.. Ex:20173" name="batch" required ></span>
          </div>
  
        </div>
           
<button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span> 
Search
        
</button>

</form>
</div>
</div>

</div>

<br>
<br>


<br>
<br>
    
</div> 
            <br>
            <br>
            <div class="login">
<form>
   <div class="container" align=center style="background:#063247; box-shadow: 0 3px 15px rgba(0,0,0,.8);
   margin-left: 950PX;overflow: scroll;
    MARGIN-TOP:-400PX;"> 
  <div class="title" style="color:white;margin-top:0px;margin-bottom:50px;">View Student </div>
    <br>
<br>
<br><br>
	<table border="0" cellpadding="10px" cellspacing="20" border:2; style="color:whitesmoke; " >
    <tr style="font-weight:bold;">
    <td>Sr. No.</td>
    <td> BATCH </td>
    <td>NAME</td>
    <td>PIN NO</td>
    <td>GENDER</td>
    <td>PHONE</td>
     <td>DELETE</td>      
    
    </tr>
    <?php
	$sr=1;

  if(!empty($_POST))
{


$batch=$_POST['batch'];
 

  if($batch=="@Bool IS NULL")
  {
    
   $h=mysqli_query($al,"select * from student ");
 
  }
  else
  {
    
     $h=mysqli_query($al,"select * from student where st_year='$batch' ");
  }

  
	while($j=mysqli_fetch_array($h))
	{
		?>
        <tr>
        <td><?php echo $sr;$sr++;?></td>
        <td><?php echo $j['st_year'];?></td>
        <td><?php echo $j['st_name'];?></td>
        <td><?php echo $j['st_pin'];?></td>
        <td><?php echo $j['gender'];?></td>
        <td><?php echo $j['st_phone'];?></td>
        <td align="center"><a href="delete.php?del=<?php echo $j['st_pin'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
        </tr>
     <?php }
     }
      ?>
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
</body>
</html>