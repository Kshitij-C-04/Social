<?php
include 'db.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the name from the session or the form
    $name = isset($_POST['name']) ? $_POST['name'] : '';

    // Check if name is provided
    if (!empty($name)) {
        // Fetch user information based on the name
        $stmt = $conn->prepare("SELECT name, user, pass, bio FROM signup WHERE name = ?");
        $stmt->bind_param("s", $name); // Bind the name parameter
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Store fetched user info in session
            $row = $result->fetch_assoc();
            
            $pass = $_SESSION['pass'];
            $bio = $_SESSION['bio'];
        } else {
            echo "User with the given name not found.";
        }

        $stmt->close();
    } else {
        echo "Please provide a valid name.";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit / Update</title>
    <link href="style_main.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="icon" href="favicon-32x32.png" type="image/png" />
</head>
<body>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  display:flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-image: url(melon.png);
  background-color: black;
  background-repeat:no-repeat;
  background-size:60%;
  background-position: center;
  backdrop-filter: blur(9px);
  
}

.form {
  width: 420px;
  align-items: center;
  justify-content: center;
  background: transparent;
  border: 2px solid white;
  backdrop-filter: blur(12px);
  color: #fff;
  border-radius: 12px;
  padding: 30px 40px;
}
.form h1 {
  -webkit-background-clip: text;
  font-size: 36px; 
  text-align: center;
  font-family: "Pacifico", cursive;
  font-weight: 400;
  font-style: normal;
  background-image: linear-gradient(
    to right,
    rgb(28, 222, 28),
    rgb(219, 12, 12)
  );
  color: transparent;
}
.form .input-box {
  position: relative;
  width: 100%;
  height: 50px;

  margin: 30px 0;
}
.input-box input {
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, 0.2);
  border-radius: 40px;
  font-size: 16px;
  color: #fff;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder {
  color: #fff;
}
.input-box i {
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;
}
.form .remember-forgot {
  display: flex;
  justify-content: space-between;
  font-size: 14.5px;
  margin: -15px 0 15px;
}
.remember-forgot label input {
  accent-color: #fff;
  margin-right: 3px;
}
.remember-forgot a {
  color: #fff;
  text-decoration: none;
}
.remember-forgot a:hover {
  text-decoration: underline;
}
.form .btn {
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}
.btn:hover {
  text-decoration: underline;
}
.form .register-link {
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;
}

@media (max-width: 1000px) {
  .img {
    display: none;
  }
  body {
    flex-direction: column;
    background-image: url(melon.png);
    background-repeat: no-repeat;
    padding-top: 20vh;
  }
  .form{
    backdrop-filter: blur(15px);
  }
}
.error{
  color : red;
}
    </style>
    
    <div class="form">
    <form action="edit_profile.php" method="post">
            <h1>Melon</h1>
            <div class="input-box">
                <input type="text" id="name" name="name" value="<?php $name =  $_SESSION['username'];
                        echo $name; ?>" >
            </div>
            <div class="input-box">
                <input type="text" id="user" name="user" value="<?php $user =  $_SESSION['username'].'@'.strlen($name);
                        echo $user; ?>">
            </div>
            <div class="input-box">
                <input type="password" id="pass" name="pass" value="<?php echo isset($_SESSION['pass']) ? htmlspecialchars($_SESSION['pass']) : ''; ?>" >
            </div>
            <div class="input-box">
                <input type="text" id="bio" name="bio" value="<?php echo isset($_SESSION['bio']) ? htmlspecialchars($_SESSION['bio']) : ''; ?>" placeholder="Bio">
            </div>
            <button type="submit" class="btn" href="edit_profile.php">Edit Profile</button>
        </form>
    </div>
</body>
</html>

