<?php
include_once 'connect_database.php';
include_once 'select_database.php';
connect();
select();

$id = mysql_real_escape_string($_POST["id"]);
$password = mysql_real_escape_string(md5($_POST["password"]));
$firstName = mysql_real_escape_string($_POST["firstName"]);
$lastName = mysql_real_escape_string($_POST["lastName"]);

if(empty($id) || empty($password) || empty($firstName) || empty($lastName))
{
    echo 'Empty fields! You must fill in all fields! - from PHP!';
}


$query_check_id = "SELECT studentID FROM students WHERE studentID='$id'";
$result = mysql_query($query_check_id);
$row = mysql_fetch_row($result);
if($row > 0)
    echo "ID $id has already been taken!";
else
{
    $query = "INSERT INTO students VALUES('$id', '$firstName', '$lastName','$password','')";
    if(mysql_query($query))
        echo 'Inserted succesfully';
    else
        echo 'Insertion failed';
}


?>
