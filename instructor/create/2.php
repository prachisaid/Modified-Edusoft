<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Courses</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="create.css">
</head>

<body>
    <div id="navbar">
        <h1>edusoft</h1>
        <p>Step 2 of 2</p>
        <a href="/project/instructor/course.php">Exit</a>
    </div>

    <div class="form">
        <h1>What category best fits the knowledge you'll share?</h1>
        <p>It's ok if you can't think of a good title now. You can change it later</p>
        <select name="category" id="category"> 
            <option value="cat" name="cat">Choose a category</option>
            <option value="1" name="1">Development</option>
            <option value="2" name="2">IT and software</option>
            <option value="3" name="3">Design</option>
            <option value="4" name="4">Business</option>
            <option value="5" name="5">Marketing</option>
            <option value="6" name="6">Photography</option>
            <option value="7" name="7">Music</option>
            <option value="8" name="8">Teaching</option>
        </select>
        <i class='bx bxs-chevron-down'></i>
    </div>

    <div class="buttons">
        <a href="/project/instructor/create/1.php" id="previous">Previous</a>
        <a href="/project/instructor/create/intended_learners.php" id="continue">Continue</a>
    </div>
    <!-- <script src="/project/js/index.js"></script> -->
</body>

</html>