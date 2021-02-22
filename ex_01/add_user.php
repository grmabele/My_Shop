<?php


define("DB_HOST", "localhost");
define("DB_USERNAME", "oazzis");
define("DB_PASSWORD", "Joydzx9y*.*");
define("DB_PORT", "3306");
define("DB_NAME", "gecko");



// Create a function that enables a connection to a MySQL database and returns the connection resource.

define("ERROR_LOG_FILE", "./errors.log");

function connect_db($host, $username, $passwd, $port, $db): PDO
{
    try {
        $dsn = 'mysql:host=' . $host . ':' . $port . ';dbname=' . $db;
        return new PDO($dsn, $username, $passwd);
    } catch (PDOException $e) {

        $username = null;
        $passwd = null;
        $err_message = $e->getMessage();
        error_log($err_message . PHP_EOL, 3, ERROR_LOG_FILE);
        echo "PDO ERROR: " . $err_message . " storage in " . ERROR_LOG_FILE . PHP_EOL;
        die("Error connection to DB" . PHP_EOL);
    }
}


if (isset($argc)) {

    try {
        add_user($argv);
    } finally {
        echo "Connection to DB successful" . PHP_EOL;
    }

}

// php add_user.php login password password_conf role
function add_user($argv)
{
    $bdd = connect_db(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_PORT, DB_NAME);

    $numArgs = func_num_args();
    if ($numArgs == 1) {
        $arg_list = func_get_args();
        if (count($arg_list[0]) == 5) {

            $login = $arg_list[0][1];
            $password = $arg_list[0][2];
            $password_conf = $arg_list[0][3];
            $role = $arg_list[0][4];

            if ($password == $password_conf) {
                $password = hash('sha256', $password);
                $search_role = array("ADM" => true, "GLOBAL" => false, "INVITE" => false);
                $role = strtoupper($role);
                if (array_key_exists($role, $search_role) == true) {
                    $isAdmin = $search_role[$role];

                    $sql = 'INSERT INTO gecko.users (name, password, email, created_at, is_admin) VALUES (?,?,?, NOW(),? )';

                    $sth = $bdd->prepare($sql);
                    $email = "";
                    $sth->bindParam(1, $login, PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT, 20);
                    $sth->bindParam(2, $password, PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT, 255);
                    $sth->bindParam(3, $email, PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT, 255);
                    $sth->bindParam(4, $isAdmin, PDO::PARAM_BOOL);

                    $check = $sth->execute();
                    $error = $sth->errorInfo()[2];

                    if ($check) {
                        echo "User added to DB" . PHP_EOL;
                    } else {
                        echo $error . PHP_EOL;
                        error_log($error . PHP_EOL, 3, ERROR_LOG_FILE);
                        die('Error MySQL, user not added, more infos in ' . ERROR_LOG_FILE . PHP_EOL);
                    }
                } else {
                    echo "Bad role: ADM|GLOBAL|INVITE" . PHP_EOL;
                }
            } else {
                echo "Passwords don't match" . PHP_EOL;
            }
        } else {
            echo "Bad params! Usage: php add_user.php login password password_conf role" . PHP_EOL;
        }
    } else {
        echo "Bad params! Usage: php add_user.php login password password_conf role" . PHP_EOL;
    }

}
