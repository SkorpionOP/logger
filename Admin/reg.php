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
if(isset($_SESSION["lab"])){
  header("location: ./Login.php");
}
if(!empty($_POST))
{ if($_POST['pass']===$_POST['repass']){
    	$batch=$_POST['batch'];
	$st_name=$_POST['name1'];
	$st_pin=$_POST['pin'];

    $phone1=$_POST['phone1'];

        $pass=$_POST['pass'];
      $gender=$_POST['gender'];
	
	$u=mysqli_query($al,"insert into student values('$batch','$st_name','$st_pin','$pass','$gender',$phone1,0)");
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully added');
		</script>
        <?php }
}
else{?>
  <script type="application/javascript">
  alert('Confirm Password is not Same as Password');
  </script><?php  
}
}	
?>
<!doctype html>
<html>
<head>


<link href="admin.css" rel="stylesheet" type="text/css" />     
<link rel="stylesheet" href="styler1.css">
<style>
  .container{

  max-width: 700px;
  width: 100%;
  background-color: #fff;
box-shadow: 0px 5px 10px 20px black;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
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
input{
  color:whitesmoke;
}
</style>
  
</head>

<body style="background: #063247;">
	
     <nav>
         <label class="logo">Registration Panel</label>
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
         </ul>      </nav>
<br>
<br>
<br>
    <center>
<div class="login">
   <div class="container" style="background-color: #063247; color:white;   box-shadow: 0 3px 15px rgba(0,0,0,.8);">
    <div class="title">Registration</div><br><br>
    <div class="content">

      <form action="" method="post">
        <div class="user-details">
            <div class="input-box">
            <span class="details">Batch</span>
            <input type="text" placeholder="Enter your Batch.. Ex:2022" name="batch" required>
          </div>
          <div class="input-box">
              
              <span class="details">Student Name</span>
            <input type="text" placeholder="Enter Student Name" name="name1" required style"color:white;">
          </div>
          <div class="input-box">
            <span class="details">Pin No</span>
            <input type="text" placeholder="Enter Student Pin Number" name="pin" required>
          </div>
          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your Phone number"  name="phone1" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="pass" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="repass"required>
          </div>
        </div>
        <div class="gender-details">
         <input type="radio" name="gender" id="dot-1" value="Male">
         <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-3" value="Other">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender" style="color:white;">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender" style="color:white;">Female</span>
          </label>
    
          </div>
        </div>
      <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>	
Register
        
</button>
      </form>
    </div>
  </div>

<br>
<br>

</center>
</body>
</html>