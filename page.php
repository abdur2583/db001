<?php

    $host = "localhost";
    $uesr = "root";
    $pass = "";
    $db_name = "custom";

    $con = new mysqli($host,$uesr,$pass,$db_name);

    if($con->connect_error){
        die("connect fail".$con->connect_error);
    }
    $selectQuery = "SELECT * FROM  submit";

    $res = mysqli_query($con,$selectQuery);

    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <div style="width: 800px; margin: 0 auto">
        <a href="submit.php">submit</a>
        <a href="update.php">update</a>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>QF </th>
                    <th>phone</th>
                    <th>Job</th>
                    <th>Edit</th>
                </tr>
                <?php while($row = $res->fetch_array()): ?>
                <tr>
                    <th><?php echo $row['id'] ?></th>
                    <th><?php echo $row['name'] ?></th>
                    <td><?php echo $row['email'] ?></td>
                    <th><?php echo $row['qf'] ?></th>
                    <td><?php echo $row['phone'] ?></td>
                    <th><?php echo $row['job'] ?></th>
                    <th><a href="update.php?id=<?php echo $row['id'] ?>">update</a></th>
                </tr>
                <?php endwhile; ?>
            </table>
    </div>
