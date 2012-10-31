<?php
//Function to select database
    function select()
    {
        $select = mysql_select_db('sms');
        if (!$select) 
            die('Unable to select database!');  
    }
    
?>
