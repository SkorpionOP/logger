<?php
include("../configASL.php");
session_start();

$aid=$_SESSION['st_pin'];
$sql=mysqli_query($al,"select * from student where st_pin='$aid'");

 
	if(mysqli_num_rows($sql)>0)
	{
        
            while($row=mysqli_fetch_assoc($sql))  
    {  
        
          $batch=$row['st_year'];
        
            $name=$row['st_name'];
         

     }
    }
		
if(!empty($_POST))
{   	 $feed=$_POST['feed'];
	
	$u=mysqli_query($al,"insert into feedback values('$aid','$feed')");
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully Submited');
		</script>
        <?php 
header("location:student_view.php");
    }
     	
 	if($u==false)
	{
		?>
        <script type="application/javascript">
		alert('error');
		</script>
        <?php }
 
}
?>
<!doctype html>
<html>
<head>       
        <link rel="stylesheet" href="log.css">
</head>
<style>
h3 button{
background-color:transparent;
  position: relative;
  display: inline-block;
  padding: 10px 20px 10px 10px;
margin-left:80%;
  color: white;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px;
border:none;

height:40px;
width:200px;
}
 button:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 15px #03e9f4,
             
}
</style>
<body>
<h3>
<button onClick="window.location='student_view.php'" >
feedback
</button>
</h3><div class="login">
  <h2>Feedback</h2>
  <form  action="" method="POST">
    <div class="mydiv">
      <input type="textarea" name="feed" required="" placeholder="Enter your Feedback">
     
    </div>

    <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
Submit
    </button>


  </form>

    </div> 
</body>
</html>