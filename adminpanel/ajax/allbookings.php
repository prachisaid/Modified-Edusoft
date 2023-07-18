<?php
include "../dbcon.php";
$sql = "SELECT * FROM `payments`";
$result = mysqli_query($con, $sql);
if($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $tid = $row['tid'];
        $sql1 = "SELECT * FROM `tours` WHERE `tid` = '$tid'";
        $result1 = mysqli_query($con, $sql1);
        if($result1) {
            $row1 = mysqli_fetch_assoc($result1);
                echo '<tr>
                <td><b>'.$row1['tid'].'<b></td>
                <td>'.$row['uname'].'</td>
                <td>'.$row1['tname'].'</td>
                <td>'.$row['payment_time'].'</td>
                <td>'.$row['rid'].'</td>
                <td><button type="button" class="btn btn-dark btn-fw"><a
                            href="viewbookinghistory.php?uid='.$row['uid'].'&tid='.$tid.'"
                            style="color:white;text-decoration:none;">View</a></button>
                </td>

            </tr>';
        }   
    }
}
?>