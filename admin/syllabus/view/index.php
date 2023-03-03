<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d20788c52.js" crossorigin="anonymous"></script>
    <!-- <link rel="shortcut icon" href="img/fav.png" type="image/x-icon"> -->

    <link rel="stylesheet" href="/lab/style.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>View Syllabus</title>

    <style>
        .block {
            width: 100%;
            margin-top: 25px;
            margin-left: -15%;
            box-shadow:  0 0 10px #000;
        }
        .flex{
            margin: 0;
            padding: 0;

        }
    </style>
</head>

<body>
    <?php
    // include('../../nav2.php') 
    ?>
    <span class="head1">View Syllabus</span>

    <form method="POST" id="form1">
        <span class="text">To add a new useful topic to book a lab as a whole, fill out the necessary fields.</span>

        <span class="label">Lab Department *</span>
        <select name="lab" id="lab">

            <?php
            require('../../../essentials/_config.php');
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
        <select name="sem" id="sem">
            <option value="1">First (1)</option>
            <option value="2">Second (2)</option>
            <option value="3">Third (3)</option>
            <option value="4">Fourth (4)</option>
            <option value="5">Fifth (5)</option>
            <option value="6">Sixth (6)</option>
        </select>
        <!-- <button type="submit" name="submit" id="submit" class="btn-primary">Submit</button> -->
        <button name="submit" id="submit" class="btn-primary">Submit</button>
        <?php

        if (isset($_POST['submit'])) {
            $sem = $_POST['sem'];
            $lab = $_POST['lab'];
            session_start();


            if (isset($_POST['submit'])) {

                $sql = "SELECT * FROM `syllabus` where category='$lab' and (semester='$sem' AND status='1')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class='block'>";
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            $id = $row["id"];
                            $title = $row["title"];
                            echo '<div class="flex">';

                            echo '<span class="uid text">' . $i . ' .' . $title . '</span>';
                            echo '<a href="../delete?id=' . $id . '" class="../del">Delete</a>';
                            echo '</div>';


                        }
                        echo "</div>";
                    } else {
                        echo '<div class="block">
                <span class="head2">No data to show ! !</span>
                </div>';
                    }
                }

            }
        }


        ?>

    </form>


</body>

</html>