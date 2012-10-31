<?php
//Function for database connection
    function connect()
    {
         $connect = @mysql_connect('localhost', 'root', '');
         if (!$connect)
         {
            die('Unable to connect to database!');
         }
    }
?>
