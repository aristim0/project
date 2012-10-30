$("#login").click(function(){
   
   var id = "#id"; 
   var pass = "#password";
   
   if (id.val() == "" || pass.val() == "")
       $("#errors").html("Empty fields! You must fill in all fields!");
   else if (id.length != 7 || isNav(id) == false)
       $("#errors").html("ID must be a number and exactly 7 digits long!");
   
   else
       $.post( $("#login_form").attr("action"),
           $("#login_form : input").serializeArray(),
           function(info){
               $("#errors").empty();
               $("#errors").html(info);
               clear();
           }); 
    $("#login_form").submit(function(){
        return false;
    });
});
function clear(){
    $("#login_form : input").each(function(){
        $(this).val("");
    });
}

