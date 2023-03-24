<?php
    require('../../../essentials/_config.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // UPDATE status set value 1 where id = $id
        $sql = "UPDATE `faculty_tickets` SET `status`='2' WHERE id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
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