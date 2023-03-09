$(document).ready(function () {
    var modal = $('.search_modal');
    var btn = $('.search_btn');
    var span = $('.close');
    ///////////////
    var btn_cart= $('.cart_btn');
    var modal_cart = $('hover-cart');
/////////////////////////////////////
    
    btn.click(function () {
      modal.slideDown("slow");
      
    });
  
    span.click(function () {
      modal.fadeOut(400);
    });
  
    $(window).on('click', function (e) {
      if ($(e.target).is('.search_modal')) {
        modal.fadeOut(400);
      }
    });
///////////////////////////////////
      
    btn_cart.hover(function () {
      console.log(1);
      modal_cart.slideDown("slow");
    });
   

    
////////////////////////////////////////////////////////////////////////////////////////////////
                                              /*TOTAL IN DETAIL*/
    ////////////////////////////////////////////////////////////////////////////////////////////////
    jQuery.fn.extend({
      setMenu:function () {
          return this.each(function() {
              var containermenu = $(this);
  
              var itemmenu = containermenu.find('.xtlab-ctmenu-item');
              itemmenu.click(function () {
                  var submenuitem = containermenu.find('.xtlab-ctmenu-sub');
                  submenuitem.slideToggle(500);
  
              });
  
              $(document).click(function (e) {
                  if (!containermenu.is(e.target) &&
                      containermenu.has(e.target).length === 0) {
                       var isopened =
                          containermenu.find('.xtlab-ctmenu-sub').css("display");
  
                       if (isopened == 'block') {
                           containermenu.find('.xtlab-ctmenu-sub').slideToggle(500);
                       }
                  }
              });
  
  
  
          });
      },
  
  });
  
  
  $('.xt-ct-menu').setMenu();

  function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
      const toast = document.createElement("div");
  
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
  
      const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
        warning: "fas fa-exclamation-circle",
        error: "fas fa-exclamation-circle"
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);
  
      toast.classList.add("toast", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }
  

    ////////////////////////////////////////////////////////////////////////////////////////////////
                                              /* ajax */
    ////////////////////////////////////////////////////////////////////////////////////////////////
    load_data();  
    function load_data(page)  
    {  
          
         $.ajax({  
              url:"home/show",  
              method:"POST",  
              data:{page:page},  
              success:function(data){  
                   $('#pagination_data').html(data);  
              }  
         })  
    }  
    $(document).on('click', '.pagination_link', function(){  
         var page = $(this).attr("id");  
         load_data(page);  
    }); 
    
    //////////////////////////////////////////////////////////////
  
//     load_product()
//     function load_product(page){
//       console.log(page)
//       $.post("http://localhost/steed/product/list_products",{page:page},function(data){
//         $('#list_products').html(data); 
//       });
//     }
//     $(document).on('click', '.pagination_product', function(){  
//       var page = $(this).attr("id");  
//       console.log(page)
//       load_product(page);  
//  }); 
// var labels = Utils.months({count: num_data});



   
    ////////////////////////////////////////////////////
    var gender;
    get_gender();
   function get_gender(){
    gender=$("input[name='gender']:checked").val();
   }
    $(".gender_btn").click(function() {
      get_gender();
      console.log('gender :'+gender)
    });

    
    // load product
    var category;
    get_all_categories();
   function get_all_categories(){
    var none_category=[];
    $.each($("input[name='category']"), function(){
      none_category.push($(this).val());
    })
    category=none_category.join(", ");
   }
    $(".category").click(function() {
      var categories=[];
      $.each($("input[name='category']:checked"), function() {
        categories.push($(this).val());
      });
      category=categories.join(", ");
    });
    var brands;
    get_all_brand()
    function get_all_brand(){
      var none_brand=[];
      $.each($("input[name='brand']"), function(){
        none_brand.push($(this).val());
      })
      brands=none_brand.join(", ");
     }
    $(".brand").click(function() {
      var brand=[];
      $.each($("input[name='brand']:checked"), function() {
        brand.push($(this).val());
      });
      brands=brand.join(", ");
    });
    var limit=8;
    $("#limit_number").on('change', function() {
      limit=$("#limit_number :selected").val();
      load_products()
    });
    load_products();
    function load_products(page) {
      if(category.length==0){
        get_all_categories()
      };
      if(brands.length==0){
        get_all_brand()
      };
      console.log(typeof(brands));
      console.log(category,'-',brands,'-',gender,'-',limit)
      $.post("http://localhost/steed/product/list_product",{
        page:page,
        cate:category,
        brand:brands,
        limit_number:limit,
        gender:gender
      },function(data){
        $('#list_products').html(data); 
      });
    };
    $(".ajax_product").click( function () {
          load_products()
    });
    $(document).on('click', '.pagination_product', function(){  
      var page = $(this).attr("id");  
      console.log('page'+page)
      load_products(page);  
  }); 
    
   //end load
      /////////////////////////////////////////////////

    var slugs=$('#slug').val(); 
    load_review();
    function load_review(){
   
    $.post("http://localhost/steed/product/load_Review",{slug:slugs},function(data){
      
      $('#list_review').prepend(data); 
    });
  }
  
 
    $("#phoneNumber").keyup(function(){ 
      var p=$(this).val(); 
      $.post("./register/ajax_login",{number:p},function(data){
        if(data == true){
          $("#message_phone").html("Phone number already in use")
        }else{
          $("#message_phone").html("Phone number must have 10 digits")
        }
      });
    });


    $("#search_ajax").keyup(function(){ 
      var search_ajax=$(this).val(); 
      console.log(search_ajax);
      $.post("http://localhost/steed/search/search_ajax",{search:search_ajax},function(data){
          $(".list_search").html(data)
      });
    });


      $(window).scroll(function() {
      if ($(this).scrollTop() > 20) {
      $('#toTopBtn').fadeIn();
      } else {
      $('#toTopBtn').fadeOut();
      }
      });
      
      $('#toTopBtn').click(function() {
      $("html, body").animate({
      scrollTop: 0
      }, );
      return false;
      });
      

      $(document).on('click','#send_cmt',function add_cmt(){ 
        
        var id=$(this).val();
        var content_cmt= $("#content_cmt").val();
        console.log(id)
        $.post("http://localhost/steed/product/add_cmt",{
          id_product:id,
          content:content_cmt
        
        },function(data){
          $(".add_cmt").prepend(data);
          
        });
       
        $(".content_cmt").val('');
      });
      $(document).on('click','.reply_cmt',function add_cmt_input(){ 
        var id_review=$(this).val();
        var div=$(this).parent().parent().parent().parent().find(".content_to_rep")
        $.post("http://localhost/steed/product/load_rep_input",{
          id_review:id_review,
        },function(data){
          div.html(data);
         
        });
        
         });
         $(document).on('click','.send_cmt_reply',function add_cmt_review(){ 
          var id_review=$(this).val();
          var content_to_rep=$(this).parent().find(".content_cmt_rep").val();
          var before=$(this).parent().parent().parent().find(".content_to_rep");
          var id_product=$('#send_cmt').val();
          console.log(content_to_rep);
          $.post("http://localhost/steed/product/add_reply_to_comment",{
            id_review:id_review,
            content:content_to_rep,
            id_product:id_product
          },function(data){
            before.before(data);
           
          });
          
           });
      $(document).on('click','#check_out',function check_out(){
       
        $.post("http://localhost/steed/cart/view_check_out",{
        },function(data){
          console.log(data);
         $('#list_check_out').html(data);
         
        });
      });
    $(document).on('click','.add-to-cart',function add_Cart(){
      var id=$(this).val();
      $.post("http://localhost/steed/cart/add_cart",{id_product:id},function(data){
        console.log(data)
        if(data == true){
         console.log("add ");
         showSuccessToast();
        }else{
          showErrorToast()
          console.log("add con cac di ngu");
        }
      });
      
    });

    $(document).on('click','.update_category',function edit_Category(){

      var id=$(this).val();
      $.post("http://localhost/steed/admin_steed/get_category_id",{id_category:id},function(data){
          $('.edit_category').html(data);
      });
    });
    
    $(document).on('click','.delete_category',function delete_Category(){

      var id=$(this).val();
      $.post("http://localhost/steed/admin_steed/delete_category",{id_category:id},function(data){
          $('.edit_category').html(data);
      });
    });
    
    $(document).on('click','.delete_cart',function delete_Cart(){
      
      var id=$(this).val();
      $.post("http://localhost/steed/cart/delete_cart",{id_product:id},function(data){
        console.log(data)
        if(data == true){
         console.log("add ");
        }else{
          console.log("add con cac di ngu");
        }
      });
    });
    $(document).on('click','.delete-product',function delete_Cart_All(){ 
      var id=$(this).val();
      $.post("http://localhost/steed//cart/delete_cart_all",{id_product:id},function(data){
        console.log(data)
        if(data == true){
         console.log("add ");
        }else{
          console.log("add con cac di ngu");
        }
      });
    });
    $(document).on('click','#pay_all',function Pay_all(){ 
      console.log("Pay_all");
      freight= $("#freight_type option:selected").text();
      bank = $("#bank_payment option:selected").text();
      $.post("http://localhost/steed/cart/check_out",{
        freight_type:freight,
        bank_payment:bank
      },function(data){
        console.log(data)
        if(data == true){
         console.log("add ");
        }else{
          console.log("add con cac di ngu");
        }
      });
      location.reload()
    });

   
    $(document).on('click','.btn_detail_bill',function View_detail_bill(){ 
      
      var id = $(this).val();
      $.post("http://localhost/steed/admin_steed/view_detail_bill",{
        id_bill:id,
      },function(data){
        $(".content_bill").html(data);
      });
    });


    $(document).on('click','.delete_product',function Delete_product(){ 
      
      var id = $(this).val();
      $.post("http://localhost/steed/admin_steed/delete_product",{
        id_product:id,
      },function(data){
        console.log(data)
        if(data == true){
         console.log("add ");
        }else{
          console.log("add con cac di ngu");
        }
      });
    });
    $(document).on('click','.update_product',function update_product(){ 

      var id = $(this).val();
      $.post("http://localhost/steed/admin_steed/update_product",{
        id_product:id,
      },function(data){
        console.log(data)
        if(data == true){
         console.log("add ");
        }else{
          console.log("add con cac di ngu");
        }
      });
    });
    
    $('#pay_all').click(function () {
      console.log("Pay_all");
      Pay_all();
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////
                                              /* ajax */
    ////////////////////////////////////////////////////////////////////////////////////////////////
   


   
    
    function incrementValue()
    {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }
    $('.minus').click(function () {
      var $input = $(this).parent().find('input');
      var count = parseInt($input.val()) - 1;
      count = count < 1 ? 1 : count;
      $input.val(count);
      $input.change();
      price = $(this).parent().parent().find('.price_in_cart').val();
      quantity = $(this).parent().parent().find('.input-qty ').val();
      total = price * quantity;
      $(this).parent().parent().find('.total_in_cart').val(total);
      
      delete_Cart();
    });
    $('.plus').click(function () {
      
      var $input = $(this).parent().find('input');
      var max = $input.attr('max');
      var count = parseInt($input.val()) + 1;
      if(count > max) {
        count=max;
        alert("this product only have "+count);
      }else{
        count = count;
        console.log(max)
        $input.val(count);
        $input.change();
        price = $(this).parent().parent().find('.price_in_cart').val();
        quantity = $(this).parent().parent().find('.input-qty ').val();
        total = price * quantity;
        $(this).parent().parent().find('.total_in_cart').val(total);
        add_Cart();
        
      }
      
      
    });
    $('.delete-product').click(function () {
      $(this).parents('.product_cart').remove(); 
      delete_Cart_All()
    });
    $('.delete_product').click(function () {
      $(this).parents().parents('tr').remove(); 
    });
    
    $('#check_out').click(function () {
      $(".pay_container").slideDown("slow");
      $(".back_of_pay").fadeIn();
    })
    $(".back_of_pay").click(function () {
      $(".pay_container").slideUp("slow");
      $(".back_of_pay").fadeOut();
    })
    $("#btn_form_upload").click(function () {
      console.log(1)
      $(".update_div1").slideDown("slow");
      $(".site_back").fadeIn();
    })
    $(".site_back").click(function () {
      $(".update_div1").slideUp("slow");
      $(".site_back").fadeOut();
      $(".add_category").fadeOut();
      $(".edit_category").fadeOut();
      $(".popup_bill_detail").fadeOut();
    })
    $(".btn_detail_bill").click(function () {
      $(".popup_bill_detail").fadeIn();
      $(".site_back").fadeIn();
    })
    $("#btn_upload_category").click(function () {
      $(".add_category").fadeIn();
      $(".site_back").fadeIn();
    })
      $(".update_category").click(function () {
      $(".edit_category").fadeIn();
      $(".site_back").fadeIn();
    })
    $('.delete_category').click(function () {
      $(this).parents().parents('tr').remove(); 
    });
   



    ////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////

  });
   

  
