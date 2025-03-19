<?php 
include("../configASL.php");
session_start();
if(!empty($_POST))

{ if($_POST['pass']===$_POST['pass1']){
    
    	
        $uid=$_POST['aid'];
        $pass=$_POST['pass'];
	$u1=mysqli_query($al,"SELECT aid from admin");
    while($j=mysqli_fetch_array($u1))
	{
    if($j['aid']==$uid){
        ?>
        <script type="application/javascript">
		alert('Already Exist');
        window.location='editadmin.php';
		</script>
        <?php }}
	$u=mysqli_query($al,"INSERT INTO `admin`(`aid`, `password`) VALUES('$uid','$pass')");
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully added');
        window.location='editadmin.php';
		</script>
        <?php }
}
else{?>
  <script type="application/javascript">
  alert('Confirm Password is not Same as Password');
  </script><?php  
}
}	?>