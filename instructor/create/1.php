<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Courses</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="create.css">
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

        #title_1 {
            display: flex;
            flex-direction: row;
            margin-left: 11rem;
            padding: 14px 22px 12px 15px
        }
    </style>
</head>

<body>
    <div id="navbar">
        <h1>edusoft</h1>
        <p>Step 1 of 2</p>
        <a href="/project/instructor/course.php">Exit</a>
    </div>

    <div class="form">
        <h1>How about a working title?</h1>
        <p>It's ok if you can't think of a good title now. You can change it later</p>
        <input type="text" name="title" class="form-control" id="title_1" placeholder="e.g. Learn Web Development from Scratch">
        <small id="invalid" class="form-text text-muted invalid-feedback">Enter the title for your course</small>
    </div>

    <div class="buttons">
        <!-- <a href="" id="previous">Previous</a> -->
        <a id="continue">Continue</a>
    </div>
    <!-- <script src="/project/js/index.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        const title = document.getElementById('title_1');
        let valid = true;

        // title.addEventListener('blur', ()=>{
        //     let regex = /^([a-zA-Z\s]){2,50}$/
        //     let str = title.value
        //     console.log(str)

        //     if(regex.test(str)){
        //         valid = true
        //         title.classList.remove('is-invalid')
        //     }else{
        //         valid = false
        //         title.classList.add('is-invalid')
        //     }
        // })

        let submit = document.getElementById('continue')
        submit.addEventListener('click', () => {
            if (title.value == '') {
                title.classList.add('is-invalid');
            } else {
                title.classList.remove('is-invalid')
                window.location = "http://localhost/project/instructor/create/2.php"
            }
        })
    </script>
</body>

</html>