<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    //creat a database connection
    $con = mysqli_connect($server,$username,$password);
    // check for connectin success
    if(!$con){
        die("connection to the database is failed due to" . mysqli_connect_error());
    }
    // echo "success connecting to the db";

    //collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `Us_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender ', '$email', '$phone', '$other', '2023-05-24 08:09:56.000000')";
    //echo $sql;

    //execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        //flag for successful insertion
        $insert = true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    //close the database connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Maliba University">
    <div class="container">
        <h1>Welcome to Maliba US Trip Form</h1>
        <p>Enter your details and submit this form to confirm tour participation in the trip</p>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to US trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>

            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>