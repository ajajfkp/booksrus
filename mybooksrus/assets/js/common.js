$( document ).ready(function(){
	var currentIndex = 0,
	items = $('.main-slider li');
	itemAmt = items.length;

	function cycleItems() {
		var item = $('.main-slider li').eq(currentIndex);
		items.hide('slide');
		item.css('display','inline-block');
	}

	autoSlide = setInterval(function() {
		currentIndex += 1;
		if (currentIndex > itemAmt - 1) {
			currentIndex = 0;
		}
		//cycleItems();
	}, 3000);
});


function setUiMessege(type,message,title){
	switch (type){
		case 'err':
			toastr.error(message, title, {
				"timeOut": "0",
				"extendedTImeout": "0"
			});
		break;
		
		case 'suc':
		toastr.success(message);
		break;
		
		case 'inf':
		toastr.info(message, title);
		break;
		
		case 'war':
		toastr.warning(message);
		break;
	}
}

function validateinput(inputarray){
	var errors=[];
	if(typeof inputarray =='object'){
		for(var i in inputarray){
			splitArr = inputarray[i].split(',');
			if($('#'+splitArr[0]).val()){
				$('#'+splitArr[0]+'_error').html('');
			}else{
				msg = splitArr[1] ? splitArr[1]:splitArr[0].ucfirst()+' field is required';
				$('#'+splitArr[0]+'_error').html(msg);
				errors=i;
			}
		}
		if(errors.length>0){
			return true;
		}else{
			return false;
		}
	}
}

String.prototype.ucfirst = function(){
    return this.charAt(0).toUpperCase() + this.substr(1);
}

$(function() {
	$(window).scroll(function(e) {
		var winwidth = $(window).width();
		if(winwidth>779){
			var height = $(window).scrollTop();
			if(height  > 110) {
				$( "#mainNave" ).css({'margin-top': 0});
			}else{
				$( "#mainNave" ).css({'margin-top': -60});
			}
		}
	});
	
	$(".backup_picture").on("error", function(){
        $(this).attr('src', base_url+'assets/images/no_book avalaible.jpg');
    });
	
});

function validateForm(email) {
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
