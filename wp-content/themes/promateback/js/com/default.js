
function formjvloginsubmit(form){
	var flag = true;
	form.getElements('input').each(function(el){
		if(el.hasClass('required')){
			if(el.value==''){
				flag = false;
				el.addClass('invalid');
			}else{
				el.removeClass('invalid');
			}
		}
	});
	return flag;
}