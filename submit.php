
<?php 
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'custom';

    // connection with database
    $conn = new mysqli($db_host,$db_user,$db_pass,$db_name);

    //check connection
    if($conn->connect_error){
        die("connection fail".$conn->connect_error);
    }else { ?>
            successfully connection</br>
        
        <?php 
    }
    
    //core code to insert data in the database
    if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $qf = $_POST['qf'];        
        $job = $_POST['job'];

        $insertQuerry = "INSERT INTO submit (name,email,phone, qf, job) VALUES ('$name', '$email', '$phone','$qf', '$job')";
        
        //INSERT INTO `submit`(`id`, `name`, `email`, `phone`, `qf`, `job`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
        
        $result = mysqli_query($conn,$insertQuerry);

        if($result){
            ?>
            <script>
                alert("data inserted successfully");
            </script>
            <?php
        }else {
            ?>
            <script>
                alert("data not inserted successfully");
            </script>
            <?php
        }

    }


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container form">
    <a href="page.php">page</a>
    <a href="page.php">update</a>

        <form action="" method="post">
            <div class="mb-3">
           
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <label  class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Qalification</label>
                <input type="text" class="form-control" name="qf">
            </div>
        
            <div class="mb-3">
                <label  class="form-label">mobile</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="mb-3">
                <label  class="form-label">Job</label>
                <input type="text" class="form-control" name="job">
            </div>
            
            <input type="submit" class="btn btn-primary" name="submit" value="submit">
        </form>
    </div>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>

