<?php
        include "../dbcon.php";

        $status = $_POST['status'];
        // tours which are not completed and completed
        $status1 = "";
        if($status == 0) {
            $status1 = "notcompleted";
        } 
        if($status == 1) {
            $status1 = "completed";
        }
        
        // select all tours which are not completed or completed
        $sql = "SELECT * FROM `tours` WHERE `status` = '$status1'";
        $result = mysqli_query($con, $sql);
        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $status = "";
                if($row['status'] == 'notcompleted') {
                    $status = '<td><label class="badge badge-danger">'.$row['status'].'</label></td>';
                } else {
                    $status = '<td><label class="badge badge-success">'.$row['status'].'</label></td>';
                }
                echo '<tr>
                <td>'.$row['tid'].'</td>
                <td>'.$row['tname'].'</td>
                <td><label>'.$row['tstartdate'].'</label></td>
                '.$status.'
                <td><button type="button" class="btn btn-dark btn-fw"><a
                            href="viewmytours.php?tid='.$row['tid'].'"
                            style="color:white;text-decoration:none;">View</a></button>
                </td>
            </tr>';
            }
        } else {
            echo "Some error occured";
        }


?>