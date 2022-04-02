

$( function () {
    'use strict' ;
     var user_error = true , 
         phone_error = true,
         EMail_Error  = true ,
         Message_Error = true ;

    function F( el ) {
        // el.parent().find('.Custom_Error').fadeIn(200);
        // el.css('border','2px solid red') ;
        el.css('border','2px solid red').parent().find('.Custom_Error').fadeIn(200);
    }

    function T( el ) { 
        // el.parent().find('.Custom_Error').fadeOut(200);
        // el.css('border','2px solid green');
        el.css('border','2px solid green').parent().find('.Custom_Error').fadeOut(200);
      
    }



    $('.txt_name').blur(function () {
        if ($(this).val().length < 4 ) { 
             F($(this)) ;
             user_error = true ;
         } else {  T( $(this) ) ; 
            user_error = false ;  }

    }) ;

    $('.txt_phone').blur(function () {
         if ($(this).val().length < 9) {
         F($(this)) ; 
         phone_error = true ;
        } 
         else {   T($(this)) ; 
              phone_error = false   }
    });

    $('.txt_email').blur(function () {
         if ($(this).val().length < 1) {
         F($(this)) ; 
         EMail_Error = true ;} 
         else {   T($(this)) ; 
            EMail_Error = false ;  }
    });

    $('.txt_message').blur(function () {
        if ($(this).val().length < 10) 
        {  F($(this)) ; 
        Message_Error = true   } 
        else  {   T($(this)) ;  
            Message_Error= false ;   }
   });

    $('form').on('submit' , function (e){
        if (user_error === true|| phone_error === true||  EMail_Error === true ||  Message_Error === true)
        {
            e.preventDefault() ;
            // اجبر الحقول على ان تعمل بلر بالغصب
            $(' .txt_name , .txt_phone , .txt_email ,.txt_message').blur()
        }
    }) ;

}) ;