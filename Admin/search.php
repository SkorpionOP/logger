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

?>
<!doctype html>
<html>
<head>       

<title>log</title>
<link href="styler1.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
 <style>
     .container{
color:#fff;
margin-left: 80PX;
  max-width: 700px;
  width: 100%;
               height: 600PX;
  background: #063247;

  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 0 20px 5px #211121;
}
      .container1{
background: #063247;
color:#fff;
margin-left: 850PX;
    MARGIN-TOP:-636PX;
  max-width: 800px;
          height: 600PX;
  width: 100%;
          overflow: scroll;
           

  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 0px 20px 5px #211121;
}
     .container1 .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
  float: left;
}
.container1 .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  float: left;
  font-color:white;
}
table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #fff;
            color: black;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
        }
        th {
            background: #03e9f4;
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
.login button {
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
@media print {
            .container,nav,.print,.title
            {
                visibility: hidden;
            }
            table{
              color:black;
            }
            .container1{
              visibility: absolute;
background-color: white;
color:black;
margin-left: 0px;
height:100%;
    margin-top: -1400px;
  width: 100%;
  overflow: none;
        box-shadow: none;}
          }
</style>
</head>

<body style="background: #063247;">
   <nav>
         <label class="logo">Search Panel</label>
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
     <div class="container" align="center"> 
  <div class="title" style="color:#fff;">SEARCH BY</div><br><br>
        <div class="content" style="color:white;">
<div class="login">
      <form action="" method="POST">
        <div class="user-details" >
            <div class="input-box" >
            <span class="details" >BATCH</span>
            <input type="text" value="@Bool IS NULL" placeholder="Enter your Batch.. Ex:20173" name="batch" required >
          </div>
               <div class="input-box">
            <span class="details">DATE</span>
            <input type="text" placeholder="Enter Date"  name="date" required value="@Bool IS NULL">
          </div>
          <div class="input-box">
              
              <span class="details">Student Name</span>
            <input type="text" placeholder="Enter Student Name" name="na" value="@Bool IS NULL" required>
          </div>
          <div class="input-box">
            <span class="details">REG NO</span>
            <input type="text" placeholder="Enter Student Pin Number" name="pin" required value="@Bool IS NULL">
          </div>
          
       
          <div class="input-box">
            <span class="details">LAB NAME</span>
            <input type="text" placeholder="Enter lab name" name="lab_n" required value="@Bool IS NULL">
          </div>
          <div class="input-box">
            <span class="details">COMPUTER NO</span>
            <input type="text" name="com_no" placeholder="Enter computer no" required value="@Bool IS NULL">
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


<br>
<br>


<br>
<br>
    
</div>       
           
        <br>
        <br>
     <div class="container1" id="container1" align="center" > 

    
  <div class="title">View log </div>
    <br>
<br>
<br>
<br>

	<table bordercolor="white" border="0" cellpadding="10px" cellspacing="20" border:2;  >
    <tr style="background: #03e9f4;">
    <td>Sr.No</td>
          <td> DATE </td>
          <td> TIME </td>
          <td> LAB NAME </td>
    <td> BATCH </td>
    <td>NAME</td>
    <td>REG NO</td>
    <td>COMPUTER NO</td>
     <td>DELETE</td>      
    
    </tr>
    <?php
        if(!empty($_POST))
{   	$batch=$_POST['batch'];
 $date=$_POST['date'];

	
	$na=$_POST['na'];
    
$st_pin=$_POST['pin'];
        $lab=$_POST['lab_n'];
      $com=$_POST['com_no'];
}
		
	$sr=1;
              if($na=='@Bool IS NULL' && $st_pin=='@Bool IS NULL' && $lab=='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
     AND (date=$date OR date='$date') AND (com_no=$com) order by st_pin");}
                  
        elseif($na=='@Bool IS NULL' && $st_pin=='@Bool IS NULL' && $lab!='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
     AND (lab_name='$lab') AND (date=$date OR date='$date') AND (com_no=$com) order by st_pin ");
        }
               elseif($na=='@Bool IS NULL' && $st_pin!='@Bool IS NULL' && $lab=='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
  AND (st_pin='$st_pin')  AND (date=$date OR date='$date') AND (com_no=$com) order by st_pin");
  
        }
              elseif($na=='@Bool IS NULL' && $st_pin!='@Bool IS NULL' && $lab!='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
  AND (st_pin='$st_pin') AND lab_name='$lab'  AND (date=$date OR date='$date') AND (com_no=$com) order by st_pin");
  
        }
         
               elseif($na!='@Bool IS NULL' && $st_pin=='@Bool IS NULL' && $lab=='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
  AND st_name='$na'  AND (date=$date OR date='$date') AND (com_no=$com) order by st_pin");
  
        }
              elseif($na!='@Bool IS NULL' && $st_pin=='@Bool IS NULL' && $lab!='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
  AND st_name='$na' AND lab_name='$lab' AND (date=$date OR date='$date') AND (com_no=$com) order by st_pin");
  
        }
              elseif($na!='@Bool IS NULL' && $st_pin!='@Bool IS NULL' && $lab=='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
  AND st_pin='$st_pin' AND st_name='$na'  AND (date=$date OR date='$date') AND (com_no=$com) order by st_pin");
  
        }
               elseif($na!='@Bool IS NULL' && $st_pin!='@Bool IS NULL' && $lab!='@Bool IS NULL'){
	$h=mysqli_query($al,"select  * from log  where st_year=$batch 
  AND st_pin='$st_pin' AND st_name='$na' AND lab_name='$lab' AND (date=$date OR date='$date') AND (com_no=$com)");
  
        }
         
         
         
	while($j=mysqli_fetch_array($h))
	{
       
		?>
        <tr>
        <td><?php echo $sr;$sr++;?></td>
                    <td><?php echo $j['date'];?></td>
                    <td><?php echo $j['time'];?></td>
                    <td><?php echo $j['lab_name'];?></td>
        <td><?php echo $j['st_year'];?></td>
        <td><?php echo $j['st_name'];?></td>
        <td><?php echo $j['st_pin'];?></td>
        <td><?php echo $j['com_no'];?></td>
        
        <td align="center"><a href="delete1.php?del1=<?php echo $j['time'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
        </tr>
     <?php } ?>
     </table>
     <br>
    <div class="login">
     <button class="print" onclick="print
     ()">
      <span></span>
      <span></span>
      <span></span>
      <span></span>	Download PDF</button>
      </div>



<br>
<br>
</div>


<br>

    
</div>       
</body>
</html>