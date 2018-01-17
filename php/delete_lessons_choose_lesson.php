<html>
    <head>
      <title></title>
      <?php
      	require "conf.php";
	    require "../html/navbar.php";
      ?>
    </head>
    <body>
       <div class="container-fluid">
        <div class="col-xs-9 col-sm-9">
             <h3>Επιλέξτε μαθήματα για διαγραφή</h3>
                <?php
                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql = "SELECT * FROM lessons";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      echo "<form action='delete_lessons_base.php' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          $lesson_id = $row["id"];

                          echo "<input type='checkbox' name='lessons[]' value=$lesson_id>";
                          echo " Τίτλος μαθήματος:" . $row["title"]. "<br>";
                      }
                     echo "<br>" . " <button class='btn btn-default' type='reset'>Επαναφορά</button>";
                     echo "<button class='btn btn-default' type='submit'>Υποβολή</button>";
                     echo "</form>";
                  } else {
                      echo "Δεν υπάρχουν μαθήματα";
                  }

                  mysqli_close($con);
                  ?>
            </div>
        </div>
    </body>
</html>
