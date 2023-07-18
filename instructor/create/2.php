<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Courses</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="create.css">
</head>
<style>
    #navbar p {
            font-size: 16px;
            padding-top: 12px;
        }

        #navbar h1 {
            font-size: 22px;
            font-weight: bold;
            margin: 7px 30px 10px 15px;
            padding: 17px 28px 19px 0px;
            border-right: 1px solid rgb(202, 201, 201);
        }

        #invalid {
            position: absolute;
            top: 20.7rem;
            left: -13rem;
            color: red;
        }

        /* .is-invalid{ */
            /* border: 1px solid #ce5959; */
        /* } */
</style>
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
        <a id="continue">Continue</a>
    </div>
    <!-- <script src="/project/js/index.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let cat = document.getElementById('category')
        
        let submit = document.getElementById('continue')
        submit.addEventListener('click', () => {
            let value = cat.options[cat.selectedIndex].value
            console.log(cat)
            if (value == 'cat') {
                cat.style.border = '1px solid #ce5959'
            } else {
                cat.style.border = '1px solid black'
                window.location = "http://localhost/project/instructor/create/intended_learners.php"
            }
        })
        // href="/project/instructor/create/intended_learners.php" 
    </script>
</body>

</html>