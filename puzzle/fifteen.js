/* global $ */
$(document).ready(function() {
   var blanktop = 300;
   var blankleft = 300;
   
   let pieces = $("#puzzlearea div");
   $("#shufflebutton").click(shuffle);
   $("#solvebutton").click(solve);
   
   pieces.each(function(index){
      console.log("index:"+index); 
      let row = parseInt(index/4);
      let col = index%4;
      let top = row*100;
      console.log(top);
      let left = col*100;
      console.log(left);
      $(this).css("top", top+"px");
      $(this).css("left", left+"px");
      console.log( (-left)+"px " + (-top)+"px");
      $(this).css("background-position", (-left)+"px " + (-top)+"px");
   });
   
   pieces.each(function(){
      $(this).mouseenter(highlight);
      $(this).click(swap);
      $(this).mouseleave(unhighlight);
   });
   
   function move(top, left){
      if( (parseInt(top) == blanktop &&
            Math.abs(parseInt(left) - blankleft)== 100)
            ||
            (parseInt(left) == blankleft &&
            Math.abs(parseInt(top) - blanktop) == 100)){
               return true;
            } else {
               return false;
            }
   }//move
   
   function swap(){
      movepieces($(this));
      
   }//swap
   
   function highlight(){
      let top = parseInt($(this).css("top"));
      let left = parseInt($(this).css("left"));
      if (move(top, left)){
         $(this).addClass("moveable");
      }//if
   }//highlight
   
   function unhighlight(){
      $(this).removeClass("moveable");
   }//unhighlight
   
   function movepieces(piece){
      let top = parseInt($(piece).css("top"));
      let left = parseInt($(piece).css("left"));
      if(move(top, left)){
         let temp_top = blanktop;
         let temp_left = blankleft;
         blanktop = parseInt(top);
         blankleft = parseInt(left);
         $(piece).css("top", temp_top+"px");
         $(piece).css("left", temp_left+"px");
         if (!solving){
         moves.push(piece);
      }
      }//if
   }//movepieces
   
   function shuffle(){
      for(var i = 0; i < 100; i++){
      var moveable = [];
      $("#puzzlearea div").each(function(){
         let top = parseInt($(this).css("top"));
         let left = parseInt($(this).css("left"));
         if (move(top, left)){
            moveable.push(this);
         }//if
      });//function
      var randomIndex = parseInt(Math.random()* moveable.length);
      var randomPiece = moveable[randomIndex];
      movepieces(randomPiece);
      }//for
   }//shuffle
   
   
   var moves = [];
   var solving = false;
   
   function solve(){
      solving = true;
      revert();
   }
   
   function revert(){
      if(moves.length > 0){
         setTimeout(function() {
            let piece = moves.pop();
            movepieces(piece);
            revert();
         }, 100);
      }else{
         solving = false;
      }
   }
});