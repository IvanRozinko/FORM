<?php

if (isset($_POST["sign_in"])) {

    $valid = true;

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $error_email = "Please check email input";
    }
    if (!preg_match("/^[\w]{8,16}$/", $_POST["pass"])) {
        $valid = false;
        $error_pass = "Your password should be 8 to 16 chars";
    }
    if (!isset($_POST["agree"])) {
        $valid = false;
        $error_agree = "Please sign an agreement";
    }
    if ($valid) {
        $filename = "users/" . $_POST["email"]. ".json";
        $file = fopen($filename, "w");
        fclose($file);
        // here create json with name same as email if not exist otherwise just go to next page
        header("Location: form.php");
    }
}



//https://stackoverflow.com/questions/10219278/php-show-error-messages-in-order-and-re-display-correct-fields
//https://stackoverflow.com/questions/5855811/how-to-validate-an-email-in-php
//https://stackoverflow.com/questions/18820013/html-form-php-post-to-self-to-validate-or-submit-to-new-page


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
            <?php
            if (isset($error_email))
                echo "<span class='error_msg'>$error_email</span>";
            ?>
            <input class="validateInput" name="email" id="email" type="text" placeholder="example@gmail.com">
            <label for="email">YOUR EMAIL</label>
            <?php
            if (isset($error_pass))
                echo "<span class='error_msg'>$error_pass</span>";
            ?>
            <input class="validateInput" name="pass" id="pass" type="password" placeholder="pass 8-16 characters">
            <label for="pass">PASSWORD </label>
            <?php
            if (isset($error_agree))
                echo "<span class='error_msg'>$error_agree</span>";
            ?>
            <input name="agree" id="agree" type="checkbox">
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
<script src="script/script.js"></script>
</body>
</html>
