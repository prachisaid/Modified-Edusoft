<?php
include "../dbcon.php";
$tid = $_POST['value'];
$sql = "SELECT * FROM `tours` WHERE `tid` LIKE '%$tid%'";
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