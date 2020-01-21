/* global $ */
$(document).ready(function() {
var timer = null;
var sec = 0;
var specificframe = 0;
var timer2 = null;

$("#start").click(start);
$("#stop").click(stop);
$("#animations").click(selectanimation);
$("#size").click(fontsize);
$("#turbo").click(turbo);

function turbo(){
    if (timer != null){
    if ($("#turbo").is(":checked") == true){
        timer2 = setInterval(update, 50);
    }
    else if ($("#turbo").is(":checked") == false){
        clearInterval(timer2);
        timer2 = null;
    }
    }
}

function fontsize(){
    var fontselect = $("#size").val();
    $("#displayarea").css("font-size", fontselect);
}

function selectanimation(){
    var selected = $("#animations").val();
    $("#displayarea").val(ANIMATIONS[selected]);
}

function start() {
    $("#start").attr('disabled', 'disabled');
    $("#stop").attr('disabled', null);
    $("#animations").attr('disabled', 'disabled');
    
    if (timer == null) {
        timer = setInterval(update, 250);
    }
    
}

function stop() {
    clearInterval(timer);
    clearInterval(timer2);
    timer = null;
    timer2 = null;
    $("#stop").attr('disabled', 'disabled');
    $("#start").attr('disabled', null);
    $("#animations").attr('disabled', null);
    var selected = $("#animations").val();
    $("#displayarea").val(ANIMATIONS[selected]);
}

function update() {
    var selected = $("#animations").val();
    var frame = ANIMATIONS[selected].split("=====\n");
    $("#displayarea").val(frame[specificframe]);
    if (specificframe == frame.length - 1)
    {
        specificframe = 0;
    }
    else
    {
        specificframe++;
    }
}   
});