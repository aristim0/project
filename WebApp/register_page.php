<?php

?>

<!DOCTYPE html>
<html>
  <head>
    <title>SMS</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body { padding-top: 60px; /* 60px}
    </style>
   
  </head>
  <body>   
        
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/bootstrap/js/jquery.validate.min.js"></script>
      
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">SMS</a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li class="active"><a href="index.php">Back to Main</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
    <form class="form-horizontal" action="register_function.php" id="register_form" method="POST" name="register" 
          style="border: 1px solid #CCC;padding: 10px;border-radius: 8px;">
        <fieldset>
            <legend>Registration Form</legend>
            <div class="control-group">
                <label class="control-label" for="id">Student ID:</label>
                <div class="controls">
                    <input type="text" id="id" name="id" placeholder="Student ID">                    
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="firstName">First Name:</label>
                <div class="controls">
                    <input type="text" id="firstName" name="firstName" placeholder="First Name">
                </div>
            </div>            
            <div class="control-group">
                <label class="control-label" for="lastName">Last Name:</label>
                <div class="controls">
                    <input type="text" id="lastName" name="lastName" placeholder="Last Name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password:</label>
                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button id="register" name="register_form" value="submit" class="btn">Sign up</button>
                </div>
            </div>
        </fieldset>
    </form>
        
        </div>
    <div id="errors"> </div>
    <script type="text/javascript" src="script/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script> 
    <script type="text/javascript" src="script/my_script.js"></script>
  </body>
</html>