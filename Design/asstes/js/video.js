$("#v1").on('click',function () {
    toggleVideo(1);
});

$("#v2").on('click',function () {
    toggleVideo(2);
});

$("#v3").on('click',function () {
    toggleVideo(3);
});
$("#v4").on('click',function () {
    toggleVideo(4);
});
$("#v5").on('click',function () {
    toggleVideo(5);
});
$("#v6").on('click',function () {
    toggleVideo(6);
});$("#v7").on('click',function () {
    toggleVideo(7);
});$("#v8").on('click',function () {
    toggleVideo(8);
});$("#v9").on('click',function () {
    toggleVideo(9);
});$("#v10").on('click',function () {
    toggleVideo(10);
});$("#v11").on('click',function () {
    toggleVideo(11);
});
function  toggleVideo( num)
{

   
  


    var myVideo =document.querySelector( "#v" +num+" "+"video");
 if (myVideo.paused){

    $('video').each(function() {
        $(this).get(0).pause();
    });

    $('.video-play1').each(function() {
        $(this).show();
    });

    $("#v"+num+" "+".video-play1").hide();
    myVideo.play();
 
 } 
 else {
    myVideo.pause();
    $("#v"+num+" "+".video-play1").show();
    }
};