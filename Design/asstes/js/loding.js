anime({
    targets: '.ball',
    keyframes:[
    { 
        translateY: -500,
        translateX: 515,
        rotate: [160, -160],
        duration: 5000,
    },
    {
        translateY: -230,
        rotate: [60, -60],
        duration: 5000,
    } ,
    {
        translateY: -370,
        duration: 100,
    } ,
    {
        rotate: [500, -560],
        duration: 3000,
    } ,
    {
        translateX: 545,
        rotate: [30, -30],
        duration: 1000,
    } ,
    {
        translateX: 485,
        rotate: [-30, 30],
        duration: 1000,
    } ,
    {
        translateX: 515,
        rotate: [20, -20],
        duration: 1000,
    } ,
    ],
    scale:2,
    duration: 5000,
    });



  
  $(window).on('load', function() 
    { 
      setTimeout(
          function (){
            $(".loading-overlay").fadeOut( function(){
                $("this").remove();
            });
            $('html, body').css('overflowY', 'auto'); 
          } , 17000
      )
    

    
    });



    setTimeout(function(){
        $('#exampleModalCenter1').modal('show')
      }, 2000);;