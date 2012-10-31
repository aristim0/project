<?php

//Term class
class Term{
    
    //Variables to store title, start and end dates
    public $title, $start_date, $end_date;
    
    //Function to add term to database
    function add_term($title, $start, $end) 
    {
        $query = "INSERT INTO Terms VALUES('$title','$start', '$end')";
        $failed = false;
        $query_valid = "SELECT Term_Title FROM Terms WHERE Term_Title = '$title'";
        $temp_result = mysql_query($query_valid);
        while($row = mysql_fetch_array($temp_result))
        {
            if($title = $row['Term_Title'])
                $failed = true;
        }
        
        if($failed)
                echo "Term $title already exists";
        else
        {
           $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error()); 
        }
    }
    
    //Function to edit term title to database
    function edit_term_title($old, $new)
    {
        $query = "UPDATE Terms SET Term_Title = '$new' WHERE Term_Title = '$old'";
        $failed = false;
        $query_valid = "SELECT Term_Title FROM Terms WHERE Term_Title = '$new'";
        $temp_result = mysql_query($query_valid);
        while($row = mysql_fetch_array($temp_result))
        {
            if($new = $row['Term_Title'])
                $failed = true;
        }
        
        if($failed)
                echo "Term $new already exists";
        else
        {
           $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error()); 
        }
    }
    
    //Function to edit term start date to database
    function edit_term_start($name, $date)
    {
        $query = "UPDATE Terms SET Start_Date = '$date' WHERE Term_Title= '$name'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to edit term end date to database
    function edit_term_end($name, $date)
    {
        $query = "UPDATE Terms SET End_Date = '$date' WHERE Term_Title= '$name'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to delete term from database
    function delete_term($title)
    {
        $query = "DELETE FROM Terms WHERE Term_Title = '$title'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }

    //Function to get terms
    function getTerms()
    {
        $query = "SELECT * FROM Terms";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>Title</th> <th>Start Date</th> <th>End Date</th></tr>";
        
        for($j=0; $j < $rows; ++$j)
        {
            $row = mysql_fetch_row($result);
            echo "<tr>";
            for($k=0; $k < 3; ++$k)
            echo "<td>$row[$k]</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    }
    
    //Function to get term titles
    function getTitles()
    {
        $query = "SELECT Term_Title FROM Terms";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>Title</th> </tr>";
        
        for($j=0; $j < $rows; ++$j)
        {
            $row = mysql_fetch_row($result);
            echo "<tr>";
            for($k=0; $k < 1; ++$k)
            echo "<td>$row[$k]</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    }
    
    //Function to get start date
    function getStartDate($title)
    {
        $query = "SELECT Start_Date FROM terms WHERE Term_Title = '$title'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $row = mysql_fetch_assoc($result);
        
        $temp_mydate = explode("-",$row['Start_Date']);
        $year = $temp_mydate["0"];
        $month = $temp_mydate["1"];
        $day = $temp_mydate["2"];
        
        echo "$day-$month-$year";
    }
    
    //Function to get end date
    function getEndDate($title)
    {
        $query = "SELECT End_Date FROM terms WHERE Term_Title = '$title'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $row = mysql_fetch_assoc($result);
        
        $temp_mydate = explode("-",$row['End_Date']);
        $year = $temp_mydate["0"];
        $month = $temp_mydate["1"];
        $day = $temp_mydate["2"];
        
        echo "$day-$month-$year";
    }
}
?>
