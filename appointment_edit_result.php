<html>
  <head>
    <link rel="stylesheet" type="text/css" href="a.css">
    <title>Edit an Appointment</title>
  </head>
  <body>
    <?php
      session_start();
      if (!isset($_SESSION['patient'])) {
          echo "<a href = 'patient_login.php'>Log In</a> or <a href = 'patient_signup.php'>Sign Up</a> to view this page.";
      } else {
          $conn = new mysqli("localhost", "root", "", "has");
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } else {
              $sql = "UPDATE appointment SET Time = '" . $_POST['Time'] . "', DoctorID = " . $_POST['DoctorID'] .
          " WHERE Time = '" . $_GET['Time'] . "' AND DoctorID = " . $_GET['DoctorID'] . " AND PatientID = " . $_GET['PatientID'];
              if ($conn->query($sql) === true) {
                  echo "Appointment was edited successfully.";
              } else {
                  echo "Error editing appointment: " . $conn->error . ".";
              }
              echo "<a href = 'patient_home.php'>Home Page</a>";
          }
          $conn->close();
      }
    ?>
  </body>
</html>
