<?php
session_start();
if (isset($_POST["send"])) {
    $valid = true;


    /**
     * Saving user data to JSON file
     * @param $filenameJSON
     * @param $data
     */
    function writeToJSON($filenameJSON, $data)
    {
        $path = "users/" . $filenameJSON . ".json";
        $json_object = json_encode($data);
        file_put_contents($path, $json_object);
    }

    $name = $_POST["name"];
    if (!preg_match(" /^[A-Za-z]+$/", $name)) {
        $valid = false;
        $error_name = "Name should consist only of latin letters";
    }

    $age = $_POST["age"];
    if (!preg_match(" /^[0-9]{1,2}$/", $age)) {
        echo
        $valid = false;
        $error_age = "Age should be a number 0 - 99";
    }
    //if all inputs are valid -> save user data to JSON file
    if ($valid) {
        $user_data = array(
            "name" => $name,
            "age" => $age,
            "gender" => $_POST["gender"],
            "breed" => $_POST["breed_selector"]
        );
        writeToJSON($_SESSION["email"], $user_data);
        session_destroy();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
          crossorigin="anonymous">
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
        <form id="form1" class="form" method="post">
            <h2>LET'S GET ACQUAINTED</h2>
            <?php if (isset($error_name)) echo "<span class='error_msg'>$error_name</span>"; ?>
            <input class="validateInput" name="name" id="name"
                                            type="text" placeholder="dog's name"
                                             value="<?php if (isset($name)) echo $name ?>">

            <label for="name">NAME</label>
            <?php if (isset($error_age)) echo "<span class='error_msg'>$error_age</span>"; ?>
            <input class="validateInput" name="age" id="age"
                                            type="number" placeholder="age years"
                                             value="<?php if (isset($age)) echo $age?>">

            <label for="age">AGE</label>
            <div class="form__gender">
                <input id="male" type="radio" name="gender" checked="checked" value="male">
                <label for="male">MALE DOG</label>
                <input id="female" type="radio" name="gender" value="female">
                <label for="female">FEMALE DOG </label>
            </div>
            <span>SELECT BREED</span>
            <select name="breed_selector" class="breed_selector">
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
                <input name="send" type="submit" value="Send">
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

