<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">    
    <title>Login</title>
</head>
<body>
    <div id="main">
        <span class="head1">Log In</span>
        <form action="" method="post">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="pass" id="pass" placeholder="Password" required>
            <button type="submit" name="login" class="btn-primary">Log In</button>
        </form>
        <?php
        require('../essentials/_config.php');
        if (isset($_POST['login'])) {
            $email=$_POST['email'];
            $pass=$_POST['pass'];

            $sql="SELECT * FROM login where email='$email' and pass='$pass'";
            $result=mysqli_query($conn, $sql);
            if ($result) {
                if (mysqli_num_rows($result)>0) {
                    $row = mysqli_fetch_assoc($result);
                    $id=$row['id'];
                    $name=$row['name'];
                    $type=$row['type'];
                    $dept=$row['dept'];
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['name']=$name;
                    $_SESSION['id']=$id;
                    $_SESSION['type']= $type;
                    $_SESSION['dept']= $dept;

                    if ($type==0) {
                        header("location:../student");
                    }
                    elseif ($type==2) {
                        header("location:../faculty");
                        
                    }
                    else{
                        header("location:../admin");
                    }
                }
            }
        }
        ?>
    </div>
</body>
</html>