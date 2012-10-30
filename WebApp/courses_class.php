<?php

//Courses class
class Course{
    
    //Variables to store id, title, start-end date, term
    public $id, $title, $start_date, $end_date,$teacher, $term;
    
    //Function to add course to database
    function add_course($id, $title, $start, $end, $teacher, $term) 
    {
        $query = "INSERT INTO Courses VALUES('$id','$title','$start','$end','$teacher','$term')";
        $failed = false;
        $query_valid = "SELECT Course_ID FROM Courses WHERE Course_ID = '$id'";
        $temp_result = mysql_query($query_valid);
        while($row = mysql_fetch_array($temp_result))
        {
            if($id = $row['Course_ID'])
                $failed = true;
        }
        
        if($failed)
                echo "Course $id already exists";
        else
        {
           $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error()); 
        }
    }
    
    //Function to edit course id to database
    function edit_id($old, $new)
    {
        $query = "UPDATE Courses SET Course_ID = '$new' WHERE Course_ID = '$old'";
        $failed = false;
        $query_valid = "SELECT Course_ID FROM Courses WHERE Course_ID = '$new'";
        $temp_result = mysql_query($query_valid);
        while($row = mysql_fetch_array($temp_result))
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
    }
    
    //Function to edit course start date to database
    function edit_course_start($id, $date)
    {
        $query = "UPDATE Courses SET Start_Date = '$date' WHERE Course_ID= '$id'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to edit course end date to database
    function edit_course_end($id, $date)
    {
        $query = "UPDATE Courses SET End_Date = '$date' WHERE Course_ID= '$id'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to edit course teacher to database
    function edit_course_teacher($id, $teacher)
    {
        $query = "UPDATE Courses SET  Teacher = '$teacher' WHERE Course_ID= '$id'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to edit course teacher to database
    function edit_course_term($id, $term)
    {
        $query = "UPDATE Courses SET  Term_Title = '$term' WHERE Course_ID= '$id'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to delete course from database
    function delete_course($id)
    {
        $query = "DELETE FROM Courses WHERE Course_ID = '$id'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
    }
    
    //Function to get courses
    function getCourses()
    {
        $query = "SELECT * FROM Courses";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>ID</th> <th>Title</th> <th>Start Date</th> <th>End Date</th> <th>Teacher</th> <th>Term</th> </tr>";
        
        for($j=0; $j < $rows; ++$j)
        {
            $row = mysql_fetch_row($result);
            echo "<tr>";
            for($k=0; $k < 6; ++$k)
            echo "<td>$row[$k]</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    }
    //Function to get courses id
    function getIDs()
    {
        $query = "SELECT Course_ID FROM Courses";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>ID</th> </tr>";
        
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
    function getStartDate($id)
    {
        $query = "SELECT Start_Date FROM Courses WHERE Course_ID = '$id'";
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
    function getEndDate($id)
    {
        $query = "SELECT End_Date FROM Courses WHERE Course_ID = '$id'";
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
    
    
    //Function to get teacher
    function getTeacher($id)
    {
        $query = "SELECT Teacher FROM Courses WHERE Course_ID = '$id'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>Teacher</th> </tr>";
        
        for($j=0; $j < $rows; ++$j)
        {
            $row = mysql_fetch_row($result);
            echo "<tr>";
            for($k=0; $k < 1; ++$k)
            echo "<td>$row[$k]</td>";
            echo "</tr>";
        }
    }
    
    //Function to get term
    function getTerm($id)
    {
        $query = "SELECT Term_Title FROM Courses WHERE Course_ID = '$id'";
        $result = mysql_query($query);
        if(!$result)
            die("Database access failed: " .mysql_error());
        $rows = mysql_num_rows($result);
        
        echo "<table><tr> <th>Term</th> </tr>";
        
        for($j=0; $j < $rows; ++$j)
        {
            $row = mysql_fetch_row($result);
            echo "<tr>";
            for($k=0; $k < 1; ++$k)
            echo "<td>$row[$k]</td>";
            echo "</tr>";
        }
    }
    
}
?>
