<?php
include "../dbcon.php";

$tname = $_POST['tname'];
$tlocation = $_POST['tlocation'];
$tdescription = $_POST['tdescription'];
$tduration = $_POST['tduration'];
$tstartdate = $_POST['tstartdate'];
$tenddate = $_POST['tenddate'];
$tdays = $_POST['tdays'];
$tmonth = $_POST['tmonth'];
$itheading = $_POST['itheading'];
$pic1 = $_FILES['file1'];
$pic2 = $_FILES['file2'];
$itis = $_POST['itis'];
// $aprice = $_POST['aprice'];
$tprice = (int) $_POST['tprice'];

$obj = json_decode($itis);
$itis_array = array();
foreach($obj as $key=>$data) {
    array_push($itis_array, $data);
}

$itis_string = implode(",", $itis_array);

$path1 = "";
$path2 = "";
// upload file to uploads folder
if($pic1['name'] != '' && $pic2['name'] != '') {
    $filename1 = $pic1['name'];
    $filename2 = $pic2['name'];
    $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
    $ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
    $valid_extension = array('jpg', 'jpeg', 'png');

    if(in_array($ext1, $valid_extension) && in_array($ext2, $valid_extension)) {
        $new_name1 = rand() . "." . $ext1;
        $new_name2 = rand() . "." . $ext2;
        $path1 = "../uploads/" . $new_name1;
        $paths1 = "uploads/" . $new_name1;
        $path2 = "../uploads/" . $new_name2;
        $paths2 = "uploads/" . $new_name2;
        // for file 1
        if(move_uploaded_file($_FILES['file1']['tmp_name'], $path1)) {
            // echo "File 1 uploaded successfully";
        } else {
            echo "Error uploading file 1";
            die();
        }
        // for file 2
        if(move_uploaded_file($_FILES['file2']['tmp_name'], $path2)) {
            // echo "File 2 uploaded successfully";
        } else {
            echo "Error uploading file 2";
            die();
        }
    } else {
        echo "Invalid file format";
        die();
    }
} else {
    echo "Please select a file";
    die();
}

if(empty($tname) || empty($tlocation) || empty($tdescription) || empty($tduration) || empty($tstartdate) || empty($tenddate) || empty($tdays) || empty($tmonth) || empty($itheading) || empty($pic1) || empty($pic2) || empty($itis) || empty($tprice)) {
    echo "Some error occured";
    die();
}

// insert data into database
$sql = "INSERT INTO `tours` (`tname`, `tlocation`, `tdesc`, `tduration`, `tstartdate`, `tenddate`, `tdays`, `tmonths`, `itihead`, `iti`, `pic1`, `pic2`, `status`, `creation_date`, `tprice`) VALUES ('$tname', '$tlocation', '$tdescription', '$tduration', '$tstartdate', '$tenddate', '$tdays', '$tmonth', '$itheading', '$itis_string', '$paths1', '$paths2', 'notcompleted', current_timestamp(), '$tprice')";    
$result = mysqli_query($con, $sql);

if($result) {
    echo "Tour added successfully";
} else {
    echo "Error adding tour";
}

?>