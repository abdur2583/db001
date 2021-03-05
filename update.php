
<?php 
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'custom';

    $conn = new mysqli($db_host,$db_user,$db_pass,$db_name);

    if($conn->connect_error){
        die("connection fail".$conn->connect_error);
    }else { ?>
            successfully connection</br>
        
        <?php 
    }
//data selecting code

$ids =  $_GET['id'];

$selectQuery = "SELECT * FROM  submit where id={$ids}";

$showData = mysqli_query($conn,$selectQuery);

$arryData = mysqli_fetch_array($showData);


// data updating code
    if(isset($_POST['submit'])){

        $idupdate =  $_GET['id'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $qf = $_POST['qf'];
        $mobile = $_POST['mobile'];
        $job = $_POST['job'];

        $updateQuery = "UPDATE SUBMIT SET id=$idupdate, name='$name', email='$email', qf='$qf', phone='$mobile', job='$job' where id=$idupdate";

        //$updateQuery = "UPDATE `submit` SET `id`=$idupdate,`name`='$name',`email`='$email',`phone`=[value-4],`qf`=[value-5],`job`=[value-6] WHERE id=$idupdate ";

        $result = mysqli_query($conn,$updateQuery);

        if($result){
            ?>
            <script>
                alert("data updated successfully");
            </script>
            <?php
        }else {
            ?>
            <script>
                alert("data not updated successfully");
            </script>
            <?php
        }

    }


    //core php code to select inset data in the database
/* 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $qf = $_POST['qf'];
        $mobile = $_POST['mobile'];
        $job = $_POST['job'];

        $insertQuerry = "INSERT INTO submit(name, email, phone, qf, job) VALUES ('$name', '$email', '$mobile', '$qf', '$job')";
    

        $res=  mysqli_query($conn, $insertQuerry);

        if($res){
            ?>
                <script>
                alert("data updated successfully");
                </script>
            <?php

        }else {
            ?>
            <script>
            alert("data not updated successfully");
            </script>
        <?php
        }

    }
 */
?>

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
    <a href="submit.php">submit</a>
    <?php //while($row = $result->fetch_array()): ?>
        <form action="" method="post">
            <div class="mb-3">
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" name="name" 
                value="<?php echo $arryData['name'] ?>">
            </div>
            <label  class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp"  value="<?php echo $arryData['email'] ?>">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Qalification</label>
                <input type="text" class="form-control" name="qf" value="<?php echo $arryData['qf'] ?>">
            </div>
        
            <div class="mb-3">
                <label  class="form-label">mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $arryData['phone'] ?>"">
            </div>
            <div class="mb-3">
                <label  class="form-label">Job</label>
                <input type="text" class="form-control" name="job" value="<?php echo $arryData['job'] ?>"> 
            </div>
            <?php //endwhile; ?>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>

