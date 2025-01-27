<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style type="text/CSS">

        body{
            background-color: black;
            color: red;
        }
        
        #text{
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
            margin-top: 150px;
            width: 300px;
            padding: 20px;

        }
    </style>
    
</head>
<body>


        <div id="box">
            <form method="POST">

            <div style="font-size: 20px; margin: 10px; color: yellow;">Login</div>
            <input type="text" id="text" name="email" placeholder="Enter email"><br><br>
            <input type="password" id="text" name="pass" placeholder="Enter password"><br><br>
            <input type="submit" id="button" value="Login"><br><br>

            <a href="signUp.php">Click to Signup</a><br><br>

            </form>
           
        </div>
        <!-- <p>Don't have Account <b><a href="welcome.php">welcome</a></b></p> -->

        <?php 
            session_start();

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "registerAndLogin";

                $conn = new mysqli($servername,$username,$password,$dbname);

                if($conn->connect_error){
                    die("connection failed ".$conn->connect_error);
                }
                
                $email = $conn->real_escape_string($_POST['email']);
                $password = $conn->real_escape_string($_POST['pass']);

                $storedEmail = "SELECT * FROM info WHERE email = '$email'";
                // echo "Query: SELECT * FROM info WHERE LOWER(email) = LOWER('$email')<br>";

                $result = $conn->query($storedEmail);

                // if(!$result){
                //     echo "Error: ".$conn->error;
                // }else{
                //     echo "Successfully result is created.";
                // }
                
                if (empty($email) || empty($password)) {
                    echo "Enter valid email and password";
                    exit();
                }

                if($result->num_rows>0){
                   
                    $row = $result->fetch_assoc();
                    $storedPassword = $row['password'];
                    
                    if($password===$storedPassword){
                        $_SESSION['email']=$email;
                        header("Location: welcome.php");
                        exit();
                    }else{
                        echo "Invalid Password or email";
                    }

                }else{
                    echo "No account found with this email";
                }

                $conn->close();
            }
        ?>
        
</body>
</html>