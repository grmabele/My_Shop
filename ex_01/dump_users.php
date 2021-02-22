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
        dump_user($argv);
    } finally {
        echo "Connection to DB successful" . PHP_EOL;
    }

}

// php dump_users.php filter value exact
function dump_user($argv)
{
    $bdd = connect_db(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_PORT, DB_NAME);

    $numArgs = func_num_args();
    if ($numArgs == 1) {
        $arg_list = func_get_args();
        if (count($arg_list[0]) == 4) {

            $filter = $arg_list[0][1];
            $value = $arg_list[0][2];
            $exact = $arg_list[0][3];

            if (strcasecmp($filter, "password") == 0) {
                die ("Don't try to filter the password, it's not possible" . PHP_EOL);
            } else {
                $value = (strtolower($exact) == "true") ?
                    " LIKE BINARY '" . $value . "'" :
                    " LIKE '%" . $value . "'";
                // SELECT id, name, is_admin from gecko.users where name LIKE '%hugo42';
                $sql = "SELECT id, name, is_admin FROM gecko.users WHERE " . $filter . $value;

                $sth = $bdd->prepare($sql);
                $sth->execute();
                $check = $sth->fetchAll(PDO::FETCH_ASSOC);
                $error = $sth->errorInfo()[2];

                if ($check) {
                    foreach ($check as $item) {
                        $is_admin = $item["is_admin"] == true ? "active" : "inactive";
                        echo " - [" . $item['id'] . "] " . $item['name'] . " " . $is_admin . PHP_EOL;
                    }

                } else {
                    echo "No results matching your search" . PHP_EOL;
                }
                if ($error != null) {
                    echo $error . PHP_EOL;
                    error_log($error . PHP_EOL, 3, ERROR_LOG_FILE);
                    die('Error MySQL, more infos in ' . ERROR_LOG_FILE . PHP_EOL);
                }

            }


        } else {
            echo "Bad params! Usage: php dump_users.php [filter value exact]" . PHP_EOL;
        }
    } else {
        echo "Bad params! Usage: php dump_users.php [filter value exact]" . PHP_EOL;
    }

}