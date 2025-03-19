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

if(isset($_SESSION["sem"])){
    $sam=$_SESSION["sem"];
}
else{
    echo"<script>alert('sghjdgsh')</script>";
}

if(isset($_POST['lab'])){ 
  $lab = $_POST['lab'];
  setcookie("mycokiee2",$lab,time()+ 10800);
  $sql2="select * from `labs` where `Status`=1";
  $res3 = mysqli_query($al, $sql2);
  if(mysqli_num_rows($res3)>=1)
	{
    ?>
<script type="text/javascript">
alert("Already Lab is Ongoing");
window.location='tech.php';
</script><?php } else{
   $start_time = $_POST['start_time'];
   $end_time = $_POST['end_time'];
   
   $start = strtotime($start_time);
   $end = strtotime($end_time);
   $duration = ($end - $start) / 60; 
  $sql1 = "UPDATE `labs` SET `Status`=1, `start`='$start_time', `end`='$end_time' ,`duration`=$duration WHERE `Labs`='$lab' AND `sem`='$sam'";
  $res2 = mysqli_query($al, $sql1);
   if($res2){
  ?>
  <script type="text/javascript">
  alert("Succesfully Updated");
  window.location='tech.php';
  </script><?php
} else{ ?>
<script type="text/javascript">
  alert("failed");
  window.location='tech.php';
</script><?php } }}?>
<!doctype html>
<html>
<head>
<link href="admin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="sty.css">

    <link rel="stylesheet" href="drop.css">  
    <title>Custom Dropdown Select Menu</title> 
    <style type="text/css">
         
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
.login h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
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
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  float: left;
  font-color:white;
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
<body style="background:#063247">
    <div class="login">
<form method="POST">

<div class="select-menu">
          <h2>Choose LAB</h2>
          <label style="color:white;font-size:20px;">Sem:</label>
          <input type="text"  style=" display: flex;
    height: 55px;
    width:400px;
    cursor: pointer;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    background: #fff;"  disabled value="<?php echo $sam?>"> 
    <br><br>
         <label style="color:white;font-size:20px;">Lab:</label>
          <select name="lab" style=" display: flex;
    height: 55px;
    width:400px;
    cursor: pointer;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    background: #fff;"  id="lab" >
                            <option disabled selected value>--select your option--</option>
                            <?php
                    $sql2 ="SELECT DISTINCT `Labs` FROM `labs` WHERE `sem`='$sam'";
                     $res = mysqli_query($al, $sql2);
                     while ($row2 = mysqli_fetch_assoc($res)) {
                        echo "<option value=" . $row2['Labs'] . ">" . $row2['Labs'] . "</option>";
                     } ?>
                        </select>
                        <br><br>
                        <label style="color:white;font-size:20px;">Start Time:</label>
    <input type="time" name="start_time" style=" display: flex; height: 55px; width:400px; cursor: pointer; padding: 0 16px; border-radius: 8px; align-items: center; background: #fff;">
    <br><br>
    <label style="color:white;font-size:20px;">End Time:</label>
    <input type="time" name="end_time" style=" display: flex; height: 55px; width:400px; cursor: pointer; padding: 0 16px; border-radius: 8px; align-items: center; background: #fff;">
    <br><br>
     <button type="submit" onclick="this.form.submit();">
      <span></span>
      <span></span>
      <span></span>
      <span></span> 
Submit
        
</button>
    </div>
  </form>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="drop.js"></script>       
</body>
</html>