 <?php 
    session_start();

    if(isset($_SESSION['email'])){
        $mail = $_SESSION['email'];
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body{
            background-color:lightgreen;
        }
       /* #head{
            display: flex;
            justify-content: center;
        } */
    </style>
</head>

<body>
<h1 class="head"><center>Hello <span style="color: red;"><?php echo "$mail" ?> </span></center></h1>

<h1 style="color: black;"><center>Login Successfully</center></h1>
<h3>Do you want to logout: <a href="logout.php">Logout</a></h3> 

</body>
</html>