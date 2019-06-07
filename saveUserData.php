<?php
session_start();
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



//if (isset($_POST["send"])) {
    $valid = true;

    //TODO if inputs are empty
    $name = $_POST["name"];
    if (!preg_match(" /^[A-Za-z]+$/", $name)) {
        $valid = false;
        $error_name = "Name should consist only of latin letters";
        echo $error_name;
    }

    $age = $_POST["age"];
    if (!preg_match(" /^[0-9]{1,2}$/", $age)) {
        $valid = false;
        $error_age = "Age should be a number 0 - 99";
        echo  $error_age;
    }

    //if all inputs are valid -> save user data to JSON file
    if ($valid) {
        $user_data = array(
            "name" => $name,
            "age" => $age,
            "gender" => $_POST["gender"],
            "breed" => $_POST["breed"]
        );
        writeToJSON($_SESSION["email"], $user_data);
//        session_destroy();
    }
    print_r($_POST);
//}

//https://www.youtube.com/watch?time_continue=12&v=L7Sn-f36TGM
?>
<script>
    console.log("script");
</script>
