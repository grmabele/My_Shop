<?php
// HILALISA
// https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript/50570037
// https://www.delftstack.com/fr/howto/php/how-to-generate-json-file-in-php/
// https://www.w3schools.com/php/php_superglobals_post.asp
// https://tryphp.w3schools.com/showphp.php?filename=demo_form_validation_complete


$DEBUG = false;
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$nameCheck =false;
$emailCheck = false;
$passwordCheck =false;
$passwordConfirmationCheck=false;

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
} else {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
    }
    $name = test_input($_POST["name"]);
    // check length of name
    if (strlen($name) < 3 || strlen($name) > 10) {
        $nameErr = "Invalid name";
        $nameCheck = false;
    } else {
        $nameCheck = true;
    }
}
echo $DEBUG ? $nameErr . "<br/>" : null;


if (empty($_POST["email"])) {
    $emailErr = "Email is required";
} else {
    $email = test_input($_POST["email"]);
// check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $emailCheck = false;
    } else {
        $emailCheck = true;
    }
}

echo $DEBUG ? $emailErr . "<br/>" : null;


if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
} else {
    if (strlen($_POST['password']) > 10 || strlen($_POST['password']) < 3) {
        echo "Invalid password" . "<br/>";
        $passwordCheck = false;
    } else {
        $passwordCheck = true;
    }
}
echo $DEBUG ? $passwordErr . "<br/>" : null;


if (empty($_POST["password_confirmation"])) {
    $passwordConfirmationErr = "Password confirmation is required";
} else {
    if (md5($_POST["password"]) != md5($_POST["password_confirmation"])) {
        echo "Invalid password confirmation" . "<br/>";
        $passwordConfirmationCheck = false;
    } else {
        $passwordConfirmationCheck = true;
    }
}

echo $DEBUG ? $passwordConfirmationErr . "<br/>" : null;


if ($nameCheck && $emailCheck && $passwordCheck && $passwordConfirmationCheck == true) {

    $arr1 = array();
    $arr2 = array();

    foreach ($_POST as $key => $value) {
        if ($key == "password" || $key == "password_confirmation") {
            $arr2[$key] = hash("md5", $value, false);
        } else {
            $arr2[$key] = $value;
        }
    }

    array_push($arr1, $arr2);

    echo $DEBUG ? var_dump($arr1) . "<br/>" : null;

// encode array to json
    $json = json_encode($arr1);
    echo $DEBUG ? var_dump($json) . "<br/>" : null;

    $file = './people.json';

// Open the file to get existing content
    $current = file_get_contents($file ,FILE_USE_INCLUDE_PATH);
// Append a new person to the file
    $current .= $json;
// Write the contents back to the file
    file_put_contents($file, $current);

    echo $DEBUG ? exec('whoami') . "<br/>" : null;

    echo $DEBUG ? "The number of bytes written are $file." . "<br/>" : null;
    echo "User created.";
}


?>

    <form action="" method="post">
        <input type="text" name="name" placeholder="text" minlength="3" maxlength="10" required>
        <input type="email" name="email" placeholder="email" value="<?php echo $email; ?>" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="password_confirmation" placeholder="password_confirmation" required>
        <input type="hidden" name="created_at" value="<?= time() ?>">
        <button type="submit">Submit</button>
    </form>

<?php

//$name = test_input($_POST["name"]);
//$email = test_input($_POST["email"]);
//$password = test_input($_POST["password"]);
//$password_confirmation = test_input($_POST["password_confirmation"]);

function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>