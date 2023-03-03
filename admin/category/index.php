<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d20788c52.js" crossorigin="anonymous"></script>
    <!-- <link rel="shortcut icon" href="img/fav.png" type="image/x-icon"> -->

    <link rel="stylesheet" href="/lab/style.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Lab Category</title>
</head>

<body>
    <?php include('../nav2.php') ?>
    <span class="head1">Category</span>
    
    <form action="" method="POST" id="form1">
        <a href="view" class="view" target="_BLANK">All Departments</a>
        <span class="text">To add a new useful topic to the database, fill out the necessary fields.</span>
        
        <span class="label">Department Name *</span>
        <input type="text" name="title" id="team-mates" placeholder="Department Name (Ex : Computer Science)" required>

        <span class="label">Lab 1 *</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )" required>

        <span class="label">Lab 2</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">

        <span class="label">Lab 3</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">

        <span class="label">Lab 4</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">

        <span class="label">Lab 5</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">


        <!-- <button type="submit" name="get-time" id="submit" class="btn-primary">Next</button> -->
        <button name="submit" id="next" class="btn-primary">Submit</button>

        <?php
        require('../../essentials/_config.php');
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $lab = $_POST['lab'];
            $sql1 = "SELECT * FROM `category` WHERE `name` = '$title'";
            $result1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($result1);
            $id = $row['id'];
            if ($id == "") {
                $sql = "INSERT INTO `category` (`name`) VALUES ('$title')";
                $result = mysqli_query($conn, $sql);
                $sql1 = "SELECT * FROM `category` WHERE `name` = '$title'";
                $result1 = mysqli_query($conn, $sql1);
                $row = mysqli_fetch_assoc($result1);
                $id = $row['id'];
            }
            else {
                // department already exists error message javascript
                echo '<script>alert("Department already exists! Process cancelled.")</script>';
                exit();
            }
            
            $i = 0;
            $num = count(array_filter($lab));
            while ($i < $num) {
                $sql2="INSERT INTO `labs` (`type`, `name`) VALUES ('$id', '$lab[$i]')";
                $result2 = mysqli_query($conn, $sql2);
                $i++;
            }
            if ($result) {
                echo '<script>alert("Data Inserted Successfully")</script>';
            } else {
                echo '<script>alert("Data Not Inserted")</script>';
            }


        }
        ?>

    </form>

</body>

</html>