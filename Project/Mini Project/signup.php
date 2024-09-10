<?php
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';
    // include 'home.php';
    error_reporting(0);
    $user = $_POST['user'];
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
   
    // Check whether this username exists
    $existSql = "SELECT * FROM `chat`.`signup` WHERE name = ?";
    $stmt = $conn->prepare($existSql);
    $stmt->bind_param("s", $name); // Bind the name variable
    $stmt->execute();
    $result = $stmt->get_result();
    $numExistRows = $result->num_rows;

    if ($numExistRows > 0) {
        $showError = true;
    } else {
        // Hash the password
        // $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare the SQL statement for insertion
        $sql = "INSERT INTO `chat`.`signup` (`name`, `pass`, `age`, `gender`, `dt`) VALUES (?, ?, ?, ?, current_timestamp())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $name,$pass, $age, $gender); // Bind parameters
        
        if ($stmt->execute()) {
            session_start();
            $_SESSION['username'] = $name;
            // $_SESSION['password'] = $pass;
            $_SESSION['bio'] =$bio;
            header("Location: home.php");
            exit();
        } else {
            $showError = true;
        }
        
        $stmt->close();
    }

    $conn->close();
    
}

?>
<style>
    
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="mini_signup.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="icon" href="favicon-32x32.png" type="image/png" />
</head>
<body>

<video autoplay muted playsinline>
    <source src="logo.mp4">
</video>

<div class="form">
    <form action="signup.php" method="post" id="loginForm">

        <h1>Melon</h1>
        <?php
        if ($showError) {
            echo "<div style='color:red;'> <br>Username already exists or Registration failed</div>";
        }
        ?>
        <div class="input-box">
            <input type="text" name="name" id="name" placeholder="Name" required />
            <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
            <input type="password" id="pass" name="pass" placeholder="New Password" required />
            <i class="bx bxs-lock-alt"></i>
        </div>
        <div class="input-box">
            <input name="age" type="number" min="15" max="100" id="age" placeholder="Age" required />
        </div>
        <div class="gender-selector">
            <label class="gender-option">
                <input type="radio" name="gender" value="male">
                <img src="male.png" alt="Male">
                <span>Male</span>
            </label>

            <label class="gender-option">
                <input type="radio" name="gender" value="female">
                <img src="female.png" alt="Female">
                <span>Female</span>
            </label>

        </div>
        <button type="submit" class="btn">Sign up</button>
        <div class="register-link">
            <p>Already have an account?<a href="login.php"> Login</a></p>
        </div>
    </form>
</div>


</body>
</html>
