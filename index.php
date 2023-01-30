<?php
    $insert = false;
    if(isset($_POST['name'])){
        // Set Connection Variables
    $server = "localhost";
    $username = "root";
    $password = "";

        //create a database connecion
    $con = mysqli_connect($server, $username, $password);

    // check for Connection Success
    if(!$con) {
                    die("connection to this database failed due to" . mysqli_connect_error());
    }

    //echo "Success Connecting to the db";

    // Collect post Variables
    $name = $_POST['name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    //data base code
    $sql = "INSERT INTO `iitdata`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$Age', '$Gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    //Execute the query
    if($con->query($sql) == true){
        //echo "successfully inserted";

        //Flag for successful insertions
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        
    }

    //Close the database connection
    $con->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Trevel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="avs.jpg" alt="IIT kharagpur" class="bg">
    <div class="container">
        <h1>Wlcome to IIT kharagpur US Trip Form</h1>
        <p>Enter your details and submit this form to confim your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting Form. We are happy to see you joining us for the Trip</p>";
        }     
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" class="text" placeholder="Enter your name">
            <input type="text" name="Age" id="Age" class="text" placeholder="Enter your Age">
            <input type="text" name="Gender" id="Gender" class="text" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any infomation"></textarea>

            <button class="btn">Submit</button>

        </form>
    
    </div>
    <script src="index.js"></script>
    
    
</body>
</html>