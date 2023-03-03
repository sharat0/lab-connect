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
    <title>Add Syllabus</title>
</head>

<body>
    <?php include('../nav2.php') ?>
    <span class="head1">Add new topics</span>
    
    <form action="" method="POST" id="form1">
        <a href="view" target="_blank" rel="noopener noreferrer" class="view">View Syllabus</a>
        <span class="text">To add a new useful topic to book a lab as a whole, fill out the necessary fields.</span>

        <span class="label">Lab Department *</span>
        <select name="lab" id="lab" required>
            <option value="">Select Department of lab</option>

            <?php
            require('../../essentials/_config.php');
            $sql_fac = "SELECT * from category";
            $fac = mysqli_query($conn, $sql_fac);
            $row = "";
            if ($fac) {
                if (mysqli_num_rows($fac) <= 0) {
                } else {
                    $row = mysqli_fetch_all($fac, MYSQLI_ASSOC);
                    foreach ($row as $rows) {
                        $lab_id = $rows['id'];
                        $name = $rows['name'];
                        echo "<option value='" . $lab_id . "'>" . $name . "</option>";

                    }
                }
            } else {
                echo 'Unable to connect';
            }
            ?>
        </select>

        <span class="label">Semester *</span>
        <select name="sem" id="sem" required>
            <option value="1">First (1)</option>
            <option value="2">Second (2)</option>
            <option value="3">Third (3)</option>
            <option value="4">Fourth (4)</option>
            <option value="5">Fifth (5)</option>
            <option value="6">Sixth (6)</option>
        </select>


        <span class="label">Practical Title *</span>
        <input type="text" name="title" id="team-mates" placeholder="Java program to print Hello World !! " required>


        <!-- <button type="submit" name="get-time" id="submit" class="btn-primary">Next</button> -->
        <button name="submit" id="next" class="btn-primary">Submit</button>

        <?php

        if (isset($_POST['submit'])) {
            $sem = $_POST['sem'];
            $title = $_POST['title'];
            $lab = $_POST['lab'];
            session_start();

            $sql = "INSERT INTO `syllabus` (`category`, `semester`, `title`, `enrolled_by`) VALUES ('$lab', '$sem', '$title', '".$_SESSION['id']."');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Successfully added")</script>';
            } else {
                echo '<script>alert("Error")</script>';
            }
        }
        ?>

    </form>

</body>

</html>