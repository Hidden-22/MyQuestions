<?php 
              include "../config.php";
                if(isset($_POST['id']))
                {
                    $id = $_POST['id'];

                    // Delete record
                    $query = "update feedback set feed_deletion_status = 1 where feed_id = $id";
                    mysqli_query($con,$query) ;
                    echo $query ;
                }
            ?>