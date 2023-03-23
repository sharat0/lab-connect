<!DOCTYPE html>
<html lang="en">

<?php
require('../essentials/_config.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d20788c52.js" crossorigin="anonymous"></script>
    <!-- <link rel="shortcut icon" href="img/fav.png" type="image/x-icon"> -->

    <!-- <link rel="stylesheet" href="../style.css"> -->
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="stylesheet" href="style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Bookings | Lab Connect</title>

</head>

<body>
    <nav>
        <div id="logo"><img src="../img/flag.webp" alt="Kristu Jayanti College"></div>
        <div id="nav-item">
            <span class="nav-items"><a href="../">Home</a></span>
            <span class="nav-items"><a href="/learnersbooth/logout.php">Logout</a></span>
        </div>
    </nav>
    <div id="home">
        <span class="head1">Bookings</span>
        <span class="head3">Enter your booking id to view your booking status.</span>
        <form action="" method="post" id="form1">
            <span class="label">*Booking ID</span>
            <input type="text" name="id" placeholder="Booking ID" required>
            <!-- submit button to fetch -->
            <button name="submit" id="submit" class="btn">Submit</button>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $sql = "SELECT * FROM `student_tickets` where id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $uid = $row["uid"];
                        $sql2 = "SELECT * from login where id='" . $uid . "'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $name = $row2['name'];

                        $lab = $row['lab'];
                        $sql4 = "SELECT * FROM labs where id='" . $lab . "'";
                        $result4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($result4);
                        // $lab = $row4['name'];    


                        $slot = $row["slot"];

                        $sql5 = "SELECT * FROM slots where id='" . $slot . "'";
                        $result5 = mysqli_query($conn, $sql5);
                        $row5 = mysqli_fetch_assoc($result5);
                        $st = $row5['start'];
                        $et = $row5['end'];

                        

                        echo '<div class="block">';

                        echo '<div class=flex-opposite>
        <span class="uid text dt">ID: #' . $id . '</span>';
                        // string to date
                        $date = date_create($row["dt"]);
                        echo '<span class="dt text book-dt"> ' . date_format($date, "d/m/Y H:i:s") . '</span>
        </div>';

                        echo '<span class="uid text">Name : ' . $name . '</span>';
                        echo '<span class="lab text">Lab : ' . $lab . '</span>';
                        echo '<span class="name text">Faculty Incharge : ' . $row["guide"] . '</span>';
                        echo '<span class="topic text">Purpose of booking : ' . $row["topic"] . '</span>';
                        echo '<span class="team text">Team members : ' . $row["team"] . '</span>';
                        echo '<span class="date text">Booking Date : ' . $row["date"] . '</span>';
                        echo '<span class="slot text">Booking Slot : ' . $st . ' -  ' . $et . '</span>';
                        $sta=$row['status'];
                        if ($sta=="1") {
                            echo '<span class="slot text">Status : <span class="green">Approved</span></span>';
                        }
                        elseif ($sta=="2") {
                            echo '<span class="slot text">Status : <span class="red">Declined</span></span>';
                        }
                        else{
                            echo '<span class="slot text">Status : <span class="orange">Pending</span></span>';

                        }
                       
                        echo '</div>';


                    }
                }
                
                 else {
                    echo '<div class="block">
            <span class="head2">Invalid ID ! !</span>
            </div>';
                }
            }
        }

        ?>
        <script>
        // refresh page everytime user opens this tab
        // window.onfocus = function () {
        //     location.reload();
        // };
        </script>
</body>

</html>