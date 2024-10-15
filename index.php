<?php
$insert = false;
if (isset($_POST['name'])) {
    //Set connection variables
    $server = "localhost";
    $userName = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $userName, $password);

    // Check for connection success
    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Successfully connected to the database"

    //Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];


    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Succesfully inserted";

        // Flag for successful insertion
        $insert = true;
    } 
    else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form <Form></Form></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.webp" alt="IIT Kharagpur">
    <div class="container">
        <h1>
            Welcome to IIT Kharagpur US Trip Form
        </h1>
        <p> Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'> Thanks for submitting your form. We are happy to see you joining us for the trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <input type="text" id="age" name="age" placeholder="Enter your age">
            <input type="text" id="gender" name="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>           
        </form>
    </div>
    <script src="index.js"></script>
   
</body>
</html>
