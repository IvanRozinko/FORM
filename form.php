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
        <?php
        if (isset($_POST["sign_in"])){
            $filename = "users/" . $_POST["sign_in"];
            $file = fopen($filename, "w+");


        }
        ?>
        <form id="form1" class ="form">
            <h2>LET'S GET ACQUAINTED</h2>
            <input class="validateInput" id="name" type="text" placeholder="dog's name">
            <label for="name">NAME</label>
            <input class="validateInput" id="age" type="number" placeholder="age years">
            <label for="age">AGE</label>
            <div class="form__gender">
                <input id="male" type="radio" name="gender" checked="checked">
                <label for="male">MALE DOG</label>
                <input id="female" type="radio" name="gender">
                <label for="female">FEMALE DOG </label>
            </div>
            <span>SELECT BREED</span>
            <select class="breed_selector">
                <option value="0">boxer</option>
                <option value="1">akita</option>
                <option value="2">basset-hound</option>
                <option value="3">bull-terrier</option>
                <option value="4">collie</option>
                <option value="5">dalmatian</option>
                <option value="6">jack-russel</option>
                <option value="7">poodle</option>
            </select>
            <div class="form__textarea">
                <label for="textarea">TELL US MORE </label>
                <textarea placeholder="my lovely dog likes to play with ball .."
                          id="textarea"></textarea>
            </div>
            <div>
                <input type="submit" value="Send">
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
<?php
