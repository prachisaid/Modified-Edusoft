    
    <div class="categories_list">
<?php
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $cat_id = $row['category_id'];
        $cat_name = $row['category_name'];
        echo '
        <a href="development.php?cat_id='.$cat_id.'">'.$cat_name.'</a>
        ';
    }

    ?>
    </div>