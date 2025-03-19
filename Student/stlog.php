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
          <?php
      }
  }

$aid=$_SESSION['st_pin'];
$sql = "select * from student where st_pin='$aid'";
$res1 = mysqli_query($al, $sql);
if(!mysqli_num_rows($res1) > 0) {
    header("location: ./../logout.php");
    exit; 

}  

?>
<!doctype html>
<html>
<head>

<link href="admin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="sty.css">
<link rel="stylesheet" href="log.css" >

</head>

<body>
	
    <nav>
         <label class="logo">Student Panel</label>
         <ul>
            <li><a class="active" href="stlog.php">Home</a></li>
            <li>
               <a href="student_view.php">Join Lab
               <i class="fas fa-caret-down"></i>
               </a>
            
            </li>
            <li>
               <a href="#">settings
               <i class="fas fa-caret-down"></i>
               </a>
               <ul>
                  <li><a href="Change_password.php">Change Password</a></li>
               </ul>
</li>
            <li><a href="exit1.php">Logout</a></li>
         </ul>
      </nav>

<br>
<br>
<br>
<?php
include("../configASL.php");
session_start();

if (!isset($_SESSION['st_pin'])) {
    header("location:Login.php");
    exit;
}

$aid = $_SESSION['st_pin'];
$selected_sem = isset($_POST['sem']) ? $_POST['sem'] : '';
$selected_lab = isset($_POST['lab']) ? $_POST['lab'] : '';

// Fetch unique semesters and labs
$semesters = mysqli_query($al, "SELECT DISTINCT sem FROM log WHERE st_pin='$aid'");
$labs = mysqli_query($al, "SELECT DISTINCT lab_name FROM log WHERE st_pin='$aid'");

// Fetch attendance records based on selected filters
$attendance_records = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $selected_sem && $selected_lab) {
    $query = "SELECT date, time, lab_name, com_no FROM log 
              WHERE st_pin='$aid' AND sem='$selected_sem' AND lab_name='$selected_lab' 
              ORDER BY date DESC, time DESC";
    $result = mysqli_query($al, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $attendance_records[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab Attendance</title>
    
    <style>
        body {
            background-color: #063247;
            color: white;
            font-family: Arial, sans-serif;
        }
        
        select, button {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
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
    </style>
</head>
<body>

<?php
include("../configASL.php");
session_start();

if (!isset($_SESSION['st_pin'])) {
    header("location:Login.php");
    exit;
}

$aid = $_SESSION['st_pin'];
$selected_sem = isset($_POST['sem']) ? $_POST['sem'] : '';
$selected_lab = isset($_POST['lab']) ? $_POST['lab'] : '';

// Fetch unique semesters attended by the student
$semesters = mysqli_query($al, "SELECT DISTINCT sem FROM log WHERE st_pin='$aid'");

// Fetch labs based on the selected semester
$labs = [];
if (!empty($selected_sem)) {
    // Debugging: Check if semester value is set
    echo "<script>console.log('Selected Semester: " . $selected_sem . "');</script>";

    $lab_query = "SELECT DISTINCT lab_name FROM log WHERE sem='$selected_sem'";
    $lab_result = mysqli_query($al, $lab_query);

    // Debugging: Check for SQL errors
    if (!$lab_result) {
        die("Error fetching labs: " . mysqli_error($al));
    }

    while ($row = mysqli_fetch_assoc($lab_result)) {
        $labs[] = $row['lab_name'];
    }

    // Debugging: Print fetched labs to check
    echo "<script>console.log('Fetched Labs: " . json_encode($labs) . "');</script>";
}

// Fetch attendance records if both semester and lab are selected
$attendance_records = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($selected_sem) && !empty($selected_lab)) {
    $query = "SELECT date, time, lab_name, com_no FROM log 
              WHERE st_pin='$aid' AND sem='$selected_sem' AND lab_name='$selected_lab' 
              ORDER BY date DESC, time DESC";
    $result = mysqli_query($al, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $attendance_records[] = $row;
    }
}
?>
    <style>
        body {
            background-color: #063247;
            color: white;
            font-family: Arial, sans-serif;
        }
       
        select, button {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
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
    </style>
</head>
<body>

<div class="login">
  <center>
    <h2>Lab Attendance</h2>
    <form method="POST">
        <label>Select Semester:</label>
        <select name="sem" required onchange="this.form.submit()">
            <option value="">--Select Semester--</option>
            <?php while ($row = mysqli_fetch_assoc($semesters)) { ?>
                <option value="<?= $row['sem']; ?>" <?= ($selected_sem == $row['sem']) ? 'selected' : ''; ?>>
                    <?= $row['sem']; ?>
                </option>
            <?php } ?>
        </select>
    </form>

    <?php if (!empty($selected_sem) && count($labs) > 0): ?>
        <form method="POST">
            <input type="hidden" name="sem" value="<?= $selected_sem; ?>">

            <label>Select Lab:</label>
            <select name="lab" required>
                <option value="">--Select Lab--</option>
                <?php foreach ($labs as $lab) { ?>
                    <option value="<?= $lab; ?>" <?= ($selected_lab == $lab) ? 'selected' : ''; ?>>
                        <?= $lab; ?>
                    </option>
                <?php } ?>
            </select>

            <button type="submit"style="width:330px">Show Attendance
              
            <span></span>
            <span></span>
            <span></span><span></span>
            </button>
        </form>
        </center>
    <?php elseif (!empty($selected_sem)): ?>
        <p style="color: red;">No labs found for this semester.</p>
    <?php endif; ?>

    <?php if (!empty($attendance_records)) { ?>
        <h3>Attendance Records</h3>
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Lab Name</th>
                <th>PC Number</th>
            </tr>
            <?php foreach ($attendance_records as $record) { ?>
                <tr>
                    <td><?= $record['date']; ?></td>
                    <td><?= $record['time']; ?></td>
                    <td><?= $record['lab_name']; ?></td>
                    <td><?= $record['com_no']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($selected_sem) && !empty($selected_lab)) { ?>
        <p>No attendance records found.</p>
    <?php } ?>
</div>

</body>
</html>

</body>
</html>

</body>
</html>