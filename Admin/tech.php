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

if (isset($_POST['sem'])) {
  $_SESSION['sem'] = $_POST['sem'];
  header("location:tech1.php");
}
?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="drop.css">  
    <title>Custom Dropdown Select Menu</title> 
    <link href="admin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="sty.css">

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
table, tr, td,th
{
	border:1px solid rgba(0,0,0,1.00);
	border-collapse:collapse;
	border-spacing: 300px;
	border-color:#ffff;
	font-family:"Trebuchet MS";
	font-size:13.7px;
	padding:10px;
  color:whitesmoke;
}
table{
  margin-top:50px;
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
.container{
  background: #063247;
color:#fff;
margin-top: -100px;
  max-width: 600px;
          height: auto;
  
           

  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 0px 20px 5px #211121;
}
    </style>
</head>
<body style="background:#063247">
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
    <div class="login">
<form method="POST">
<div class="select-menu">
          <h2>Choose Semester</h2>
        
          <select style=" display: flex;
    height: 55px;
    width:400px;
    cursor: pointer;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    background: #fff;" name="sem" id="sem" onchange="this.form.submit();">
                            <option disabled selected value>--select your semester--</option>
                            <?php
                     $sql2 = "SELECT DISTINCT `sem` FROM `Labs`";
                     $res = mysqli_query($al, $sql2);
                     while ($row2 = mysqli_fetch_assoc($res)) {
                        echo "<option  value=" . $row2['sem'] . ">" . $row2['sem'] . "</option>";
                     } ?>
                        </select>
    
     <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span> 
Submit
        
</button>
    </div>
  </form>
  <center>
  <div class="container">
        <h1>Manage Labs</h1>

        <?php $sql2="SELECT * from `labs` where `status`=1";
$result2=mysqli_query($al,$sql2);
$j=mysqli_fetch_array($result2);
if (!empty($j)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Lab</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql2="SELECT * from `labs` where `status`=1";
$result2=mysqli_query($al,$sql2);
while($j=mysqli_fetch_array($result2)){ ?>

                        <tr>
                            <td><?php echo$j['sem']; ?></td>
                            <td><?php echo$j['Labs']; ?></td>
                            <td>
                                <p style="text-decoration:none;font-size:18px;color:rgba(0,255,4,1.00);">Ongoing</p>
                            </td>
                            <td>
                                <form action="" method="POST" style="display: inline;">
                                    <input type="hidden" name="leave_request_id" value="<?= $request['id'] ?>">
                                    <a href="update.php?update=<?php echo $j['Labs'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">STOP</a>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No Labs Going</p>
        <?php endif; ?>
    </div>
    </center>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="drop.js"></script>

         
</body>
</html>