<?php

include_once 'assets/conn/dbconnect.php';
$q = $_GET['q'];
// echo $q;
$res = mysqli_query($con,"SELECT * FROM token WHERE t_number='$q'");



if (!$res) {
die("Error running $sql: " . mysqli_error());
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    
</head>
<body>
     <?php 

        if (mysqli_num_rows($res)==0) {

            // echo "<div class='alert alert-danger' role='alert'>There are no available services!</div>";
                
            } else {
             echo "   <table class='table table-hover'>";
        echo " <thead>";
            echo " <tr>";
                echo " <th>Current Token No.</th>";
            echo " </tr>";
       echo "  </thead>";
       echo "  <tbody>";

         while($row = mysqli_fetch_array($res)) { 

            ?>

            <tr>
                <?php

                // $avail=null;
                
                echo "<td>" . $row['t_number'] . "</td>";
                ?>
            </tr>
        <?php
    }
}
    ?>
        </tbody>
    </body>
</html>