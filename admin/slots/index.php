<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    ?>
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
    <title>Add new Slot</title>
</head>

<body>
    <?php include('../nav2.php') ?>
    <span class="head1">Time Slots</span>

    <form action="" method="POST" id="form1">
        <a href="view" target="_blank" rel="noopener noreferrer" class="view">View all Slots</a>
        <span class="text">Create new time slots for students to easily access the labs.</span>

        <span class="label">Time Slot 1 *</span>
        <input type="time" name="start-time[]" id="time" required>
        <span class="to"> To </span>
        <input type="time" name="end-time[]" id="time" required>

        <span class="label">Time Slot 2</span>
        <input type="time" name="start-time[]" id="time">
        <span class="to"> To </span>
        <input type="time" name="end-time[]" id="time" >

        <span class="label">Time Slot 3</span>
        <input type="time" name="start-time[]" id="time" >
        <span class="to"> To </span>
        <input type="time" name="end-time[]" id="time" >

        <span class="label">Time Slot 4</span>
        <input type="time" name="start-time[]" id="time" >
        <span class="to"> To </span>
        <input type="time" name="end-time[]" id="time" >

        <span class="label">Time Slot 5</span>
        <input type="time" name="start-time[]" id="time" >
        <span class="to"> To </span>
        <input type="time" name="end-time[]" id="time" >

        <!-- <button type="submit" name="get-time" id="submit" class="btn-primary">Next</button> -->
        <button name="submit" id="next" class="btn-primary">Submit</button>

        <?php
        require('../../essentials/_config.php');
        if (isset($_POST['submit'])) {
            
            $start_time = $_POST['start-time'];
            $end_time = $_POST['end-time'];

            $id = $_SESSION['id'];

            $i = 0;
            $start_num = count(array_filter($start_time));
            $end_num = count(array_filter($end_time));
            $num = min($start_num, $end_num);
            $result2=null;

            while ($i < $num) {
                // check if start time already exists in slots
                $sql1 = "SELECT * from slots where start='$start_time[$i]'";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    echo '<script>alert("Same start time for the lab already exists! \n Data not inserted.")</script>';
                    break;
                } else {
                    $sql2 = "INSERT INTO `slots` (`uid`, `start`, `end`) VALUES ('$id', '$start_time[$i]', '$end_time[$i]')";
                    $result2 = mysqli_query($conn, $sql2);
                    $i++;
                }
            }
            if (isset($result2)) {
                echo '<script>alert("Data Inserted Successfully")</script>';
            }


        }
        ?>

    </form>

</body>

</html>