//jQuery no conflict wrapper ready function
jQuery(document).ready(function($){
    
    
//Toggles the sign up and login forms    
$("#toggleSign").click(function(){

$('#log').toggle();
$('#sign').toggle();        

});
    
$("#toggleLog").click(function(){

$('#log').toggle();    
$('#sign').toggle();       

});
//Toggles the sign up and login forms    
        
//jQuery UI draggable function    
$("#welcome" ).draggable();    
$("#welcome2" ).draggable();   

    
//Checks if the textarea has been changed; If it has been changed, run the PHP script to update the 'thought' field in database 
$('#thoughtinput').bind('input propertychange', function() {
    
    $.ajax({
      method: "POST",
      url: "updatedatabase.php",
      data: {content: $("#thoughtinput").val()}
        });
      
});    
    
    
}); //End jQuery no conflict wrapper ready function





    