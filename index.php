<?php
session_start();
include_once 'config.php';
$_SESSION['session_id'] = session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/slider/css/jquery.slide.css">
    <link rel="stylesheet" href="plugins/dropdown/nice-select.css">
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dog's home</title>
</head>
<body>
<header>
    <i class="fas fa-paw fa-4x"></i>
    <h1 class="header__slogan">WHERE THE DOGS R HAPPY :)</h1>
    <i class="fas fa-paw fa-4x"></i>
</header>
<div class="container">
    <div class="container__left-column">
        <div class="slider-frame"></div>
        <div class="slide">
            <ul>
                <li data-bg="images/slider/breeds/boxer.jpg"></li>
                <li data-bg="images/slider/breeds/akita.jpg"></li>
                <li data-bg="images/slider/breeds/basset-hound.jpg"></li>
                <li data-bg="images/slider/breeds/bullterrier.jpg"></li>
                <li data-bg="images/slider/breeds/collie.jpg"></li>
                <li data-bg="images/slider/breeds/dalmatian.jpg"></li>
                <li data-bg="images/slider/breeds/jack-russell-terrier.jpg"></li>
                <li data-bg="images/slider/breeds/poodle.jpg"></li>
            </ul>
        </div>
        <div class="slider-frame"></div>
    </div>
    <div class="container__right-column">
        <form id="form" class="form" method="post" action="">
            <h2>PLEASE LOG IN</h2>
            <span id="error_email" class="error_msg"></span>
            <input class="validateInput" name="email" id="email"
                                         type="text" placeholder="example@gmail.com"
                                         value="<?php if (isset($email)) echo $email ?>">
            <label for="email">YOUR EMAIL</label>
            <span id="error_pass" class="error_msg"></span>
            <input class="validateInput" name="pass" id="pass"
                                         type="password" placeholder="pass 8-16 characters"
                                         value="<?php if (isset($pass)) echo $pass ?>">
            <label for="pass">PASSWORD</label>
            <span id="error_agree" class="error_msg"></span>
            <input class="validateInput" name="agree" id="agree" type="checkbox">
            <label id="checkbox-label" for="agree">I agree with everything</label>
            <div>
                <input name="sign_in" id="sign_in" type="submit" value="Sign in">
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="plugins/slider/jquery.slide.js"></script>
<script src="plugins/dropdown/jquery.nice-select.js"></script>
<script src="validate.js"></script>
</body>
</html>
