<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/lab/style.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">

    <style>
        form{
            padding-left: 0;
            background-color: #e5ebfa;
            padding: 15px;
        }
        .head-text{
            display: block;
            text-align: center;
            margin-left: 12%;
            margin-top: 15px;
        }
        .text{
            margin-bottom: 15px;
        }
        .flex{
            padding: 10px 10px;
        }
        body{
            overflow-x: hidden;
        }
    </style>

    <title>View Slots</title>
</head>

<body>
    <span class="head1">Types of Labs</span>
    <span class="head-text text">Please refresh the page after deleting</span>
    <form action="" method="post">
    <?php
    require('../../../essentials/_config.php');
    $sql_fac = "SELECT * from slots";
    $fac = mysqli_query($conn, $sql_fac);
    $row = "";
    if ($fac) {
        if (mysqli_num_rows($fac) <= 0) {
        } else {
            $row = mysqli_fetch_all($fac, MYSQLI_ASSOC);
            $i = 0;
            foreach ($row as $rows) {
                $i++;
                $lab_id = $rows['id'];
                $start = $rows['start'];
                $end = $rows['end'];
                echo '<div class="flex">';

                echo '<span class="uid text">' . $start . ' - '.$end.'</span>';
                echo '<a href="../delete?id=' . $lab_id . '" class="del" target="_BLANK">Delete</a>';
                echo '</div>';
            }
        }
    } else {
        echo 'Unable to connect';
    }
    ?>
    </form>
</body>

</html>