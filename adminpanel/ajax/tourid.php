<?php
include "../dbcon.php";
$sql = "SELECT * FROM `tours`";
$result = mysqli_query($con, $sql);
if($result) {
    while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                <td><b>'.$row['tid'].'<b></td>
                <td>'.$row['tname'].'</td>
                <td>'.$row['status'].'</td>
            </tr>';
}   
    
}
?>