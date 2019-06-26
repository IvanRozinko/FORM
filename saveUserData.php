<?php
session_start();
if ($_SESSION['session_id'] !== session_id()) {
    header('Location: index.php');
}

/**
 * Saving user data to JSON file
 * @param $filenameJSON
 * @param $data
 */
function writeToJSON($filenameJSON, $data)
{
    include_once 'config.php';
    $path = PATH . $filenameJSON . '.json';
    $json_object = json_encode($data);
    file_put_contents($path, $json_object);
}

    $isValid = true;
    $errors = [];

    $name = $_POST['name'];
    if (!preg_match(' /^[A-Za-z]+$/', $name)) {
        $isValid = false;
        $errors['error_name'] = 'Name should consist only of latin letters';
    }

    $age = $_POST['age'];
    if (!preg_match(' /^[0-9]{1,2}$/', $age)) {
        $isValid = false;
        $errors['error_age'] = 'Age should be a number 0 - 99';
    }

    $errors['isValid'] = $isValid;

    //if all inputs are valid -> save user data to JSON file
    if ($isValid) {
        $user_data = array(
            'name' => $name,
            'age' => $age,
            'gender' => $_POST['gender'],
            'breed' => $_POST['breed']
        );
        writeToJSON($_SESSION['email'], $user_data);
    }
    echo json_encode($errors);

