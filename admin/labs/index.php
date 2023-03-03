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
    <title>Syllabus</title>
</head>

<body>
    <?php include('../nav2.php') ?>
    <span class="head1">Add a lab</span>

    <form action="" method="POST" id="form1">
    <a href="view" target="_blank" rel="noopener noreferrer" class="view">View all Labs</a>
        <span class="text">To add a new labs to your department, fill out the necessary fields.</span>

        <span class="label">Lab Department *</span>
        <select name="dept" id="lab">
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


        <span class="label">Lab 1 *</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">
        
        <span class="label">Capacity of Lab 1 *</span>
        <input type="text" name="capacity[]" class="lab" placeholder="Lab Name (Ex : AL1 )">

        <span class="label">Lab 2</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">
        
        <span class="label">Capacity of Lab 2</span>
        <input type="text" name="capacity[]" class="lab" placeholder="Lab Name (Ex : AL1 )">

        <span class="label">Lab 3</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">
        
        <span class="label">Capacity of Lab 3</span>
        <input type="text" name="capacity[]" class="lab" placeholder="Lab Name (Ex : AL1 )">

        <span class="label">Lab 4</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">
        
        <span class="label">Capacity of Lab 4</span>
        <input type="text" name="capacity[]" class="lab" placeholder="Lab Name (Ex : AL1 )">

        <span class="label">Lab 5</span>
        <input type="text" name="lab[]" class="lab" placeholder="Lab Name (Ex : AL1 )">
        
        <span class="label">Capacity of Lab 5</span>
        <input type="text" name="capacity[]" class="lab" placeholder="Lab Name (Ex : AL1 )">



        <button name="submit" id="next" class="btn-primary">Submit</button>

        <?php
        if (isset($_POST['submit'])) {
            require('../../essentials/_config.php');
            $id = $_POST['dept'];
            $lab = $_POST['lab'];
            $capacity = $_POST['capacity'];
            // sanitize lab texts for security
            $lab = array_map('trim', $lab);
            $lab = array_map('strip_tags', $lab);
            $lab = array_map('htmlspecialchars', $lab);
            
            $capacity = array_map('trim', $capacity);
            $capacity = array_map('strip_tags', $capacity);
            $capacity = array_map('htmlspecialchars', $capacity);

            $num = count(array_filter($lab));
            $i = 0;
            while ($i < $num) {
                // check if lab name already exists in database
                $sql = "SELECT * FROM `labs` WHERE `name` = '$lab[$i]'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo '<script>alert("Lab '.$lab[$i].' already exists! Data before that in the form inserted successfully.")</script>';
                    exit();
                } else {
                    $sql2 = "INSERT INTO `labs` (`type`, `name`, `capacity`) VALUES ('$id', '$lab[$i]', '$capacity[$i]')";
                    $result2 = mysqli_query($conn, $sql2);
                    $i++;
                }
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