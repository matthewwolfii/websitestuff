/* global $ */
$(document).ready(function() {
    var win = true;
    $("#boundary1").hover(function(){
       $("#boundary1").addClass('youlose'); 
    });
    
    $(".boundary").mouseenter(function(){
       $(".boundary").addClass('youlose'); 
       $("#start").css('background-color', '#88ff88'); 
       $("#status").html("You lose!");
       win = false;
    });
    
    $("#end").mouseenter(function(){
        ///if ($(".boundary").mouseenter == false){
            ///alert("You win!");
            ///}
            if (win == true){
                $("#status").html("You win!");
            }
    });
    
    $("#start").mouseenter(function(){
       $("#start").css('background-color', 'pink'); 
       $(".boundary").removeClass('youlose'); 
       $("#status").html("Move your mouse over the 'S' to begin.");
       win = true;
    });
    
    $("#maze").mouseleave(function(){
       $(".boundary").addClass('youlose'); 
       $("#start").css('background-color', '#88ff88'); 
       $("#status").html("You lose!");
       win = false;
    });
    
});
