<?php
session_start();
 $name =  $_SESSION['username'];
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <title>Social Media Profile</title>
   
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&family=Poppins:wght@300;400;500;600&family=Roboto:wght@500&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Pacifico&display=swap');
:root {
  --color-primary-hue: 255;
  --light-color-lightness: 95%;
  --dark-color-lightness: 17%;
  --white-color-lightness: 100%;

  --color-dark: hsl(252, 30%, var(--dark-color-lightness));
  --color-light: hsl(252, 30%, var(--light-color-lightness));
  --color-white: hsl(252, 30%, var(--white-color-lightness));
  --color-primary: hsl(var(--color-primary-hue), 75%, 60%);
  --color-gray: hsl(var(--color-primary-hue), 15%, 65%);
  --color-secondary: hsl(252, 100%, 90%);
  --color-success: hsl(120, 95%, 65%);
  --color-danger: hsl(0, 95%, 65%);
  --color-black: hsl(252, 30%, 10%);

  --border-radious: 2rem;
  --card-border-radius: 1rem;
  --btn-padding: 0.6rem 2rem;
  --search-padding: 0.6rem 1rem;
  --card-padding: 1rem;

  --sticky-top-left: 5.4rem;
  --sticky-top-right: -18rem;
}
    body {
    font-family: "Poppins", sans-serif;
    color: var(--color-dark);
    background: var(--color-light);
    overflow-x: hidden;
    background-color: rgba(181, 173, 178, 0.429);
    margin: 0;
    padding: 0;
    display: flex;
    
}
.container {
  width: 20%;
  margin: 45px 5%;
}
.profile {
    width: 100%;
    max-width: 700px;
    margin: 50px 30px ;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.profile__header {
    display: flex;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #ddd;
}

.profile__logo img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 20px;
    object-fit: cover;
}
.username {
    margin: 0;
    font-size: 24px;
    
}

.bio {
    color: #777;
    margin: 10px 0;
}

.edit {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.edit:hover {
    background-color: #0056b3;
}

.profile__tabs {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 3vw;
    border-bottom: 1px solid #ddd;
}

.tablinks {
    background-color: transparent;
    display: grid;
    border: none;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    justify-content: center;
    
}
#user,#comp,#comp1{
   justify-content: center;
   align-items: center;
   display: flex;
}


/* sidebar */
.left .sidebar {
  margin-top: 1rem;
  background: var(--color-white);
  border-radius: var(--card-border-radius);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
}

.left .sidebar .menu-item {
  display: flex;
  align-items: center;
  height: 3.6rem;
  cursor: pointer;
  transition: all 300ms ease;
  position: relative;
  text-decoration: none;
  color: black;
}

.left .sidebar .menu-item:hover {
  background: var(--color-light);
}

.left .sidebar i {
  font-size: 1.4rem;
  color: var(--color-gray);
  margin-left: 2rem;
  position: relative;
}

.left .sidebar h3 {
  margin-left: 1.5rem;
  font-size: 1rem;
  text-decoration: none;
}
#toggle{
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size:14px;
}
#toggle:hover{
    background-color: #0056b3;
}
.edit1{
    text-decoration: none;
    color: white;
}
</style>
<body>
     <!-- Sidebar -->
      <div class="container">
      <div class="left">
     <div class="sidebar">
        <a class="menu-item" href="home.php">
            <span><i class="uil uil-home"></i></span><h3>Home</h3> 
        </a>

        <a class="menu-item" id="messages-notifications">
            <span><i class="uil uil-envelope"></i></span><h3>Messages</h3>
        </a> 
      
        <a class="menu-item" id="toggle1">
            <span><i class="uil uil-palette"></i></span><h3 >Theme</h3>
        </a>
        <a class="menu-item" name="setting">
            <span><i class="uil uil-setting"></i></span><h3>Settings</h3>
        </a>      
        <a class="menu-item" href="logout.php">
            <span><i class="uil uil-sign-in-alt"></i></span><h3>Logout</h3>
        </a>   
    </div>   
</div>            
</div>
</div>
    <div class="profile">
        <div class="profile__header">
            <div class="profile__logo">
                <img src="profile-14.jpg" alt="Profile Picture">
            </div>
            <div class="profile__details">
                <h1 class="username"><?php $user =  $_SESSION['username'].'@'.strlen($name);
                    echo $user; ?></h1>
                 <h4><?php  $name =  $_SESSION['username'];
                 echo $name; ?></h4>   
                <p class="bio"></p>
                <a class="edit1" href="edit_profile.php"><button class="edit">Edit Profile</button></a>
                <button id="toggle">Light</button>
            </div>
            
        </div>

        <div class="profile__tabs">
            <div class="tablinks">
                <p>Post</p>
                <p id="user">0</p>
            </div>
            <div class="tablinks">
                <p>Followers</p>
                <p id="comp"><?php echo(rand(0,5000)); ?></p>
            </div>
            <div class="tablinks">
                <p>Following</p>
                <p id="comp1"><?php echo(rand(0,5000)); ?></p>
            </div>
        </div>
    </div>

    <script>
 let mode = document.getElementById("toggle");
let curr = "light";
mode.addEventListener("click",()=>{
    if(curr == "light"){
        curr = "dark";
        document.getElementById("toggle").innerText="Dark"
        document.querySelector("body").style.backgroundColor="black";
    }
    else{
        curr = "light";
        document.getElementById("toggle").innerText="Light"
        document.querySelector("body").style.backgroundColor="rgba(181, 173, 178, 0.429)";
    }
    
})
let mode1 = document.getElementById("toggle1");
let curr1 = "light";
mode1.addEventListener("click",()=>{
    if(curr1 == "light"){
        curr1 = "dark";
        // document.getElementById("toggle1").innerHTML="Theme -Dark"
        document.querySelector("body").style.backgroundColor="black";
    }
    else{
        curr1 = "light";
        // document.getElementById("toggle1").innerText="Theme -Light"
        document.querySelector("body").style.backgroundColor="rgba(181, 173, 178, 0.429)";
    }
    
})
    </script>
</body>
</html>
