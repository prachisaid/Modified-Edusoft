<?php
include 'partials/dbconnect.php';

$subcat_id = $_POST['c_id'];
$sql = "SELECT * FROM `landing_page` WHERE `course_subcat_id` = '$subcat_id'";
$result = mysqli_query($conn, $sql);

$q = "SELECT * FROM `subcategories` WHERE `subcategory_id` = '$subcat_id'";
$r = mysqli_query($conn, $q);
$res = mysqli_fetch_assoc($r);
?>

<h5>Expand your career opportunities with <?php echo $res['subcategory_name']?></h5>
    <p>
        Whether you work in machine learning or finance, or are pursuing a
        career in web development or data science,<br />
        Python is one of the most important skills you can learn. Python's
        simple syntax is especially suited for desktop,<br />
        web, and business applications. Python's design philosophy
        emphasizes readability and usability. Python was..
    </p>
    <button id="exploreCategory" class="<?php echo $res['subcategory_id'] ?>">Explore <?php echo $res['subcategory_name']?></button>
    <div id="explore_page">
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
    <a href="course_page.php?course_id=<?php echo $row['course_id']?>" style="margin-right: 30px;">
    <div class="courseimg">
        <img src="<?php echo 'instructor/create/image/'.$row['course_image']; ?>" width="210px" alt="" />
    </div>
    <div class="coursedetail">
        <p class="heading">
           <?php echo $row['course_title']; ?>
        </p>
        <p class="instructor">Jose Portilla</p>
        <p class="prize"><?php echo $row['course_price']; ?></p>
    </div>
</a>
<?php
}
?>
</div>