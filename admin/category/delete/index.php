<?php
    require('../../../essentials/_config.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // UPDATE status set value 1 where id = $id
        $sql="DELETE FROM category WHERE `category`.`id` = $id";
        $result = mysqli_query($conn, $sql);
        $sql2="DELETE FROM labs WHERE `category` = $id";
        $result2 = mysqli_query($conn, $sql2);
        $sql3="DELETE FROM syllabus WHERE `category` = $id";
        $result3 = mysqli_query($conn, $sql3);
        if ($result && $result2 && $result3) {
            echo '<script>close();</script>';

        } else {
            echo '<script>alert("Error")</script>';
        }
    }
    else {
        // redirect to ../
        echo '<script>window.location.href = "../"</script>';
    }
?>