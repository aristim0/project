$("#register").click(function(){
    
   var id = "#id"; 
   var pass = "#password";
   var fname = "#firstName";
   var lname = "#lastName";
   
   //tuta ta validations en mu douleukoun
   if (id.val() == "" || fname.val() == "" || lname.val() == "" || pass.val() == "")
       $("#errors").html("Empty fields! You must fill in all fields!");
   else if (id.length != 7 || isNav(id) == false)
       $("#errors").html("ID must be a number and exactly 7 digits long!");
   ///////////////////////////////////////////////////
   
   
   else
       $.post( $("#register_form").attr("action"),
           $("#register_form : input").serializeArray(),
           function(info){
               $("#errors").empty();
               $("#errors").html(info);
               clear();
           }); 
    $("#register_form").submit(function(){
        return false;
    });
});

function clear(){
    $("#register_form : input").each(function(){
        $(this).val("");
    });
}




