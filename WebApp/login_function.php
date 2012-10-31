<?php
include_once 'connect_database.php';
include_once 'select_database.php';
connect();
select();

$id = mysql_real_escape_string($_POST["id"]);
$password = mysql_real_escape_string(md5($_POST["password"]));

if(empty($id) || empty($password))
{
    echo 'Empty fields! You must fill in all fields! - from PHP!';
}
$query = "SELECT * FROM students WHERE studentID ='$id'";
$result = mysql_query($query);
if(!$result)
    die("Database access failed: " .mysql_error());
else if(mysql_num_rows($result))
{
    $row = mysql_fetch_row($result);
    if ($password == $row[3])
        echo 'Logged in succesfully';
    else
        echo 'Login failed';
}
else
    echo 'Login failed';


?>


