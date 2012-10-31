<html>
    <head>
        <title>Project</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body { padding-top: 60px; /* 60px}
    </style>

    
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
           $("#login_form").submit(function(e){
              $.ajax({
                  type: "POST",
                  url: "login_f.php",
                  data: $(e.target).serialize(),
                  dataType: "POST",
                  success: function(data){
                      if(data == "success")
                          $("#message").html("<p class='success'>You have logged in succesfully!</p>");
                  },
                  error: function(data){
                      if(data == "fail")
                          $("#message").html("<p class='success'>Invalid id and/or password!</p>");
                  }
           }); 
        });
        });
    

        
    </script>
    </head>
    <body><div class="container">
    <form class="form-horizontal" id="login_form" method="post" name="login" 
          style="border: 1px solid #CCC;padding: 10px;border-radius: 8px;">
        <fieldset>
            <legend>Login</legend>
            <div class="control-group">
                <label class="control-label" for="id">ID:</label>
                <div class="controls">
                    <input type="text" id="id" name="id" placeholder="ID">
                    <!--<span class="help-inline">Enter your username</span>-->
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
                    <button id="submitButton" name="submit_form" value="submit" class="btn">Sign in</button>
                </div>
            </div>
        </fieldset>
    </form>
            <div id="message"></div>
        </div>
        </body>
</html> 