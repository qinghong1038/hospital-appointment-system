<html>
  <head>
    <link rel="stylesheet" type="text/css" href="a.css">
    <title>Add a Doctor</title>
  </head>
  <body>
    <?php
      session_start();
      if (!isset($_SESSION['admin'])) {
          echo "<a href = 'admin_login.php'>Log In</a> to view this page.";
      } else {
          $conn = new mysqli("localhost", "root", "", "has");
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } else {
              $sql = "SELECT ID, Name FROM branch";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  ?>
    <form action="doctor_add_result.php" method="post">
      <p>Name: <input type="text" name="Name" /></p>
      Branch: <select name="BranchID">
      <?php
            while ($row = $result->fetch_assoc()) {
                ?>
        <option value=<?php echo $row['ID']; ?>><?php echo $row['Name']; ?></option>
        <?php

            } ?>
      </select>
      <p><input type="submit" value="Add Doctor" />
      <input type="reset" /></p>
    </form>
    <?php

              } else {
                  echo "0 branches.";
              }
              echo "<br><a href = 'admin_home.php'>Home Page</a>";
          }
          $conn->close();
      }
    ?>
  </body>
</html>
