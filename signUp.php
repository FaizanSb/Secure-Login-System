<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUP</title>

    <style type="text/css">
        body{
            background-color: black;
            color: red;
        }
    .text{
            height: 35px;
            width: 300px; /* Set width */
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }
        #button{
            padding: 10px;
            width: 100px;
            color: black;
            background-color:#9df9ff;
            
            border: none;
            transition: 0.4s ease-in-out;
        }

        #button:hover{
            background-color: yellow;
            color: #ff1d58;
        }

        #box{
            background-color:#ff1d58;
            margin: auto;
            margin-top: 80px;
            width: 300px;
            padding: 20px;

        }
		.text:focus{
			border-color: yellow;
		}
    </style>

</head>
<body>

    <div id="box">

        <form method="POST">
        <div style="font-size: 20px; margin: 10px; color: yellow;">Sign UP</div>

        <input type="text" class="text" name="firstName" placeholder="Enter first name"><br><br>
        <input type="text" class="text" name="lastName" placeholder="Enter last name"><br><br>
        <input type="email" class="text" name="mail" placeholder="Enter email"><br><br>
        <input type="password" class="text" name="pass" placeholder="Enter password"><br><br>

        <input type="submit" id="button" value="Sign UP"><br><br>

        <a href="index.php">Click to Login</a><br><br>
        </form>
    </div>

<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registerAndLogin";

        $conn = new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error){
            die("Connection Failed. ".$conn->connect_error);

        }
        $firstName = $conn->real_escape_string($_POST['firstName']);
        $lastName = $conn->real_escape_string($_POST['lastName']);
        $email = $conn->real_escape_string($_POST['mail']);
        $password = $conn->real_escape_string($_POST['pass']);

        if (empty($email) || empty($password) || empty($firstName) || empty($lastName)) {
            echo "Please Enter Valid Information ";
            exit();
        }

        $emailCheckQuery = "SELECT * FROM info WHERE email = '$email'";

        $result = $conn->query($emailCheckQuery);

        if($result->num_rows>0){
            echo "Email already exists. Please try another email";
        }else{
            $sql = "INSERT INTO info(firstName,lastName,email,password) VALUES ('$firstName','$lastName','$email','$password')";

            if($conn->query($sql)===TRUE){
                echo "SignUp Successfully";
            }else{
                echo "Some Issue in writing data";
            }    
            $conn->close();
        }

    }
?>


    
</body>
</html>