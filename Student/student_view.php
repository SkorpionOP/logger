<?php
include("../configASL.php");


session_start();

date_default_timezone_set("Asia/Kolkata");
  $current_time = date("H:i:s"); 

  // Fetch end time from database
  $sql_check = "SELECT `end` FROM `labs` WHERE `status`=1";
  $result = mysqli_query($al, $sql_check);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
      $end_time_db = $row['end'];

      // Convert database time format to match PHP time format
      $end_time = date("H:i:s", strtotime($end_time_db));

      if ($current_time >= $end_time) {
          // If current time has passed end time, reset values
          $sql_update = "UPDATE `labs` SET `status`=0, `start`='00:00:00', `end`='00:00:00' WHERE `status`=1";
          mysqli_query($al, $sql_update);
          ?>
          <script>
          alert("Lab has been closed");
          window.location.href='stlog.php';
          </script>
          <?php
      }
  }




$sql2 = "SELECT `Labs`,`duration`,`sem` FROM `labs` WHERE `status`=1";
$result2 = mysqli_query($al, $sql2);
while ($j = mysqli_fetch_array($result2)) {
    $lab = $j['Labs'];
    $duration=$j['duration'];
    $sem=$j['sem'];

}
if (!$lab) {
  echo "<script>
      alert('No active lab found!');
      window.location.href='stlog.php';
  </script>";
  exit;
}


if ($_SESSION['st_pin']) {
    $aid = $_SESSION['st_pin'];
    $sql = mysqli_query($al, "SELECT * FROM student WHERE st_pin='$aid'");
    $date = date('d/m/y');
    date_default_timezone_set("Asia/Kolkata");
    $time = date('H:i:s');

    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $batch = $row['st_year'];
            $name = $row['st_name'];
        }
    }
    if (!empty($_POST)) {
        $com_no = $_POST['com_no'];
        $client_id = hash('sha256', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        $check_query = "SELECT * FROM log WHERE client_id = '$client_id' AND TIMESTAMPDIFF(SECOND, created_at, NOW()) < ($duration*60)";
        $check_result = mysqli_query($al, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            header("Location: ./403.php");
             exit;
        }
        $insert_query = "INSERT INTO log (date, time, lab_name, st_year, st_pin,st_name, com_no, client_id, created_at,sem) VALUES ('$date', '$time', '$lab', '$batch', '$aid', '$name', '$com_no', '$client_id', NOW(),$sem)";
        $u = mysqli_query($al, $insert_query);
        if (!$u) {
          die("Insert Error: " . mysqli_error($al));
      } else{
        header("location: ./stlog.php");
      }

        
    }
   
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
<?php if ($lab): ?>
<body>
<h3>
<button onClick="window.location='feeds.php'" >
feedback
</button>
</h3><div class="login">
  <h2>LAB</h2>
  <form  action="" method="POST">
    <div class="mydiv">
      <input name="lab" value="<?php echo $lab ?>" disabled>
      <input type="number" name="com_no" required placeholder="ENTER YOUR PC NUMBER">
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
</html><?php else:
  header("location:Login.php");
endif;?> 