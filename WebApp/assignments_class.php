<?php
//Database info
require_once 'connect_database.php';
require_once 'select_database.php';
connect();
select();

$obj = new Assignments();
$obj->edit_title("COMP31111", "lab1", "lab3");



//Assignments class
class Assignments{
    
    //Variables to store title, due date and course
    public $title, $dueDate, $course;
    
    //Function to add assingment to database
    function add_assignment($title, $date, $course) 
    {
        $query = "INSERT INTO Assignments VALUES('$title','$date', '$course')";
        $failed = false;
        $query_valid = "SELECT Assignment_Title FROM Assignments WHERE Assignment_Title = '$title' AND Course_ID = '$course'";
        $temp_result = mysql_query($query_valid);
        while($row = mysql_fetch_array($temp_result))
        {
            if($title = $row['Assignment_Title'])
                $failed = true;
        }
        
        if($failed)
                echo "Assignment $title  for $course already exists";
        else
        {
           $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error()); 
        }
    }
    
    /*//Function to edit assignment title to database
    function edit_title($course, $old, $new)
    {
        $query = "UPDATE Assignments SET Assignment_Title = '$new' WHERE Assignment_Title = '$old' AND Course_ID = '$course'";
        $failed = false;
        $query_valid = "SELECT Assignment_Title,Course_ID FROM Assignments WHERE Assignment_Title = '$new'Course_ID = '$course'";
        $temp_result = mysql_query($query_valid);
        $row = mysql_fetch_assoc($temp_result);
        $result_array[] = $row;
        /*while($row = mysql_fetch_array($temp_result))
        {
            if($new = $row['Course_ID'])
                $failed = true;
        }
        
        if($failed)
                echo "Course $new already exists";
        else
        {
           $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error()); 
        }
    }*/
    
    //Function to edit assignment due date to database
    function edit_due_start($title, $course, $date)
    {
        $query = "UPDATE Assignments SET Due_Date = '$date' WHERE Course_ID= '$course' AND Assignment_Title = '$title'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to delete assignment from database
    function delete_assignment($title, $course)
    {
        $query = "DELETE FROM Assignments WHERE Assignment_Title = '$title' AND Course_ID = '$course'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to get assignments
    function getAssignments()
    {
        $query = "SELECT * FROM Assignments";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>Title</th> <th>Due Date</th> <th>Course</th> </tr>";
        
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
    
    //Function to get assignments title and course
    function getTitleCourse()
    {
        $query = "SELECT Assignment_Title, Course_ID FROM Assignments";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>Title</th>  <th>Course</th> </tr>";
        
        for($j=0; $j < $rows; ++$j)
        {
            $row = mysql_fetch_row($result);
            echo "<tr>";
            for($k=0; $k < 2; ++$k)
            echo "<td>$row[$k]</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    }
    
    //Function to get due date
    function getDueDate($title, $course)
    {
        $query = "SELECT Due_Date FROM Assignments WHERE Assignment_Title = '$title' AND Course_ID = '$course'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>Due Date</th> </tr>";
        
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
}
?>
