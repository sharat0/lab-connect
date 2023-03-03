<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/lab/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Book Lab</title>
    <?php
    session_start();
    include('../essentials/_config.php');
    $lab = "";
    if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']) != true) {
        header('location: index.php');
        exit;
    }
    $uid=$_SESSION['id'];

    ?>
</head>

<body>
    <nav>
        <div id="logo"><img src="../img/flag.webp" alt="Kristu Jayanti College"></div>
        <div id="nav-item">
            <span class="nav-items"><a href="../bookings">Bookings</a></span>
            <span class="nav-items"><a href="../logout.php">Logout</a></span>
        </div>
    </nav>
    <div id="home">

        <form action="" method="POST" id="form1">
            <span class="text">Book your Lab here and please wait for the confirmation through the mail</span>

            <span class="label">Guide Name *</span>
            <input type="text" name="guide-name" id="name" placeholder="Guide Name">

            <span class="label">Topic Name *</span>
            <input type="text" name="topic-name" id="name" placeholder="Project Topic">

            <span class="label">Teammates Count *</span>
            <input type="number" name="team-mates" id="team-mates" min="1" value="1">

            <span class="label">Select Date *</span>
            <input type="date" name="date" id="date" placeholder="Select a date">

            <span class="label">Select Lab *</span>
            <select name="lab" id="lab">
                <option value="">-</option>

                <?php
                $sql_fac = "SELECT * from labs";
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



            <span class="label">Select time slot *</span>
            <select name="slot" id="lab">

                <?php
                $sql_fac = "SELECT * from slots";
                $fac = mysqli_query($conn, $sql_fac);
                $row = "";
                if ($fac) {
                    if (mysqli_num_rows($fac) <= 0) {
                    } else {
                        $row = mysqli_fetch_all($fac, MYSQLI_ASSOC);
                        foreach ($row as $rows) {
                            $lid = $rows['id'];
                            $end = $rows['end'];
                            $start = $rows['start'];
                            echo "<option value='" . $lid . "'>" . $start . " - ".$end."</option>";

                        }
                    }
                } else {
                    echo 'Unable to connect';
                }
                ?>
            </select>



            <span class="label">Additional Requirements</span>
            <textarea name="requirements" id="requirements" cols="30" rows="10"
                placeholder="Additional Requirements (If any)"></textarea>

            <!-- <button type="submit" name="get-time" id="submit" class="btn-primary">Next</button> -->
            <button name="submit" id="submit" class="btn-primary">Submit</button>

            <?php

            if (isset($_POST['submit'])) {
                $date = $_POST['date'];
                $guide = $_POST['guide-name'];
                $topic = $_POST['topic-name'];
                $team = $_POST['team-mates'];
                $requirements = $_POST['requirements'];
                $lab = $_POST['lab'];
                $slot = $_POST['slot'];
                
                $sql = "INSERT INTO `student_tickets` (`id`, `uid`, `guide`, `topic`, `team`, `lab`,  `date`, `slot`, `requirements`, `status`) VALUES (null, '$uid', '$guide', '$topic', '$team', '$lab', '$date', '$slot', '$requirements', '0')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<script>alert("Your request has been sent to the admin. Please wait for the confirmation through the mail")</script>';
                } else {
                    echo '<script>alert("Unable to send the request")</script>';
                }
            }
            ?>

        </form>

    </div>

</body>

</html>