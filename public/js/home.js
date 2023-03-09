$(document).ready(function(){
  $('header').removeClass('bg');
    $(window).scroll(function(){
      if($(this).scrollTop()){
        $('header').addClass('bg');
        
      }else{
        $('header').removeClass('bg');
      }
    });
    
  });