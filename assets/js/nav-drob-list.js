$(document).ready(function() {
  // Add minus icon for collapse element which is open by default
  $(".collapse.show").each(function(){
    $(this).prev(".card-header").find(".fas").addClass("fa-chevron-up").removeClass("fa-chevron-down");
  });
  
  // Toggle plus minus icon on show hide of collapse element
  $(".collapse").on('show.bs.collapse', function(){
    $(this).prev(".card-header").find(".fas").removeClass("fa-chevron-down").addClass("fa-chevron-up");
  }).on('hide.bs.collapse', function(){
    $(this).prev(".card-header").find(".fas").removeClass("fa-chevron-up").addClass("fa-chevron-down");
  });
  ///////////////////////////
 
  $(document).on('click', '.nav-item a', function (e) {
    $(this).parent().addClass('active').siblings().removeClass('active');
});
  /****************************/
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass('show');
  
  
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });
  
      return false;
    });
    $("#p1" ).show();
    $("#p2" ).hide();
    $("#p11" ).show();
    $("#p22" ).hide();


  });
  $("#p1" ).click(function() {
    $("#p2" ).show();
    $("#p1" ).hide();
  });
  $("#p11" ).click(function() {
    $("#p22" ).show();
    $("#p11" ).hide();
  });
  $("#p2" ).click(function() {
    $("#p1" ).show();
    $("#p2" ).hide();
  });
  $("#p22" ).click(function() {
    $("#p11" ).show();
    $("#p22" ).hide();
  });;