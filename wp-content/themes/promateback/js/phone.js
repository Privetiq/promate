(function( $ ){
	
	//// ---> Проверка на существование элемента на странице
	jQuery.fn.exists = function() {
	   return jQuery(this).length;
	}
	
	//	Phone Mask
	$(function() {
		
		var element = $('.billing_phone');
		
		
      if($('.billing_phone').exists()){
        
        $('.billing_phone').each(function(){
          $(this).mask("(999) 999-99-99");
        });
        $('.billing_phone')
          .addClass('rfield')
          .removeAttr('required')
          .removeAttr('pattern')
          .removeAttr('title')
          .attr({'placeholder':'(___) ___ __ __'});
      }
      
      if($('.phone_form').exists()){
        
        var form = $('.woocommerce-checkout'),
          btn = form.find('.button ');
        
        form.find('.rfield').addClass('empty_field');
      
        setInterval(function(){
        
          if($('.billing_phone').exists()){
            var pmc = $('.billing_phone');
            if ( (pmc.val().indexOf("_") != -1) || pmc.val() == '' ) {
              pmc.addClass('empty_field');
            } else {
                pmc.removeClass('empty_field');
            }
          }
          
          var sizeEmpty = form.find('.empty_field').size();
          
          if(sizeEmpty > 0){
            if(btn.hasClass('disabled')){
              return false
            } else {
              btn.addClass('disabled')
            }
          } else {
            btn.removeClass('disabled')
          }
          
        },200);

        btn.click(function(){
          if($(this).hasClass('disabled')){
            return false
          } else {
            form.submit();
          }
        });
        
      }
    });

	

})( jQuery );