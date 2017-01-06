$( document ).ready(function(){
	$(window).on("resize",function(){
		if ($(window).width() > 768){
			$(".leftsides-pan").removeAttr("style");
		}if ($(window).width() < 768){
			$(".leftsides-pan").css({"display":"none"});
		}
	});
	
	var currentIndex = 0,
	items = $('.slide-container div');
	itemAmt = items.length;

	function cycleItems() {
	  var item = $('.slide-container div').eq(currentIndex);
	  items.hide();
	  item.fadeIn(1000);//css('display','inline-block');
	}

	var autoSlide = setInterval(function() {
	  currentIndex += 1;
	  if (currentIndex > itemAmt - 1) {
		currentIndex = 0;
	  }
	  cycleItems();
	}, 10000);

	$('.next').click(function() {
	  clearInterval(autoSlide);
	  currentIndex += 1;
	  if (currentIndex > itemAmt - 1) {
		currentIndex = 0;
	  }
	  cycleItems();
	});

	$('.prev').click(function() {
	  clearInterval(autoSlide);
	  currentIndex -= 1;
	  if (currentIndex < 0) {
		currentIndex = itemAmt - 1;
	  }
	  cycleItems();
	});
	
	$("#discdivicon").click(function(){
		 $('.main-dish-short-disc').animate({
            height: 'toggle'
            }, 690, function() {
            $("#discdivicon").toggleClass("disc-div-icon-open");
        });
	});
	
	$(".slider-demo").mouseover(function(){   
        $(".cmain-blk-social-icon").css({
            'display' : 'block'
        });
    });
    
    $(".slider-demo").mouseout(function(){
		$(".cmain-blk-social-icon").css('display','none');
	})
	
	$(".my-navebar-header").click(function(){
		if (window.matchMedia('(max-width: 768px)').matches){
		 	$(".leftsides-pan").css({"position":"absolute","width":"100%","z-index":"2","margin":"0" });
			$('.leftsides-pan').animate({
		        height: 'toggle'
		        }, 690, function() {
		        $(".leftsides-pan").toggleClass("togl-menu-open","list-group-item");
		    });
		}
	   
	});
	
	$(".login-icon-sign-in").click(function(){
		$.ajax({ 
			type: "POST",
			url: base_url+'Home/login',
			data: '',
			success: function(msg){
				$("#login-poup").html('');
				$("#login-poup").html(msg);
				$("#create-mask").show();
				/*$("#operatorDropDown").html(msg);*/
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
					setUiMessege('err',errorThrown);
			}
		});
	});
	
	
	$("#logout").click(function(){
		$.ajax({ 
			type: "POST",
			url: base_url+'Home/userLogout',
			data: '',
			success: function(msg){
				var data = $.parseJSON(msg); 
				 window.location=data.successMsg.redirect;
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	});
	
	$(".login-icon-sign-out").click(function(){
		$(".user-setting-box").toggleClass('hide');
	});
	
	

	$(document).on("click",".close-popup", function () {
		$("#login-poup").html("");
		$("#create-mask").hide();
	});

});

function loginuser(){
	var userName = $("#userName").val();
	var userPasswd = $("#userPasswd").val();
	$.ajax({ 
		type: "POST",
		url: base_url+'Home/userLogin',
		data: {
			"userName":userName,
			"userPasswd":userPasswd
		},
		success: function(msg){
			var data = $.parseJSON(msg); 
			if(data.status === true ){
				 window.location=data.successMsg.redirect;
			}else{
				setUiMessege('err',data.errorMsg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			setUiMessege('err',errorThrown);
		}
	});
}

function registerUser(){
	$.ajax({ 
		type: "POST",
		url: base_url+'Home/register',
		data: '',
		success: function(msg){
			$("#login-poup").html('');
			$("#login-poup").html(msg);
			$("#create-mask").show();
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			setUiMessege('err',errorThrown);
		}
	});
}

function gotologinUser(){
	$.ajax({ 
		type: "POST",
		url: base_url+'Home/login',
		data: '',
		success: function(msg){
			$("#login-poup").html('');
			$("#login-poup").html(msg);
			$("#create-mask").show();
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
		}
	});
}

function registration(){

	var fullName = $("#fullName").val();
	var email = $("#email").val();
	var mobile = $("#mobile").val();
	var passwd = $("#passwd").val();
	var repasswd = $("#repasswd").val();

	$.ajax({ 
		type: "POST",
		url: base_url+'Home/registration',
		data: {
		"fullName":fullName,
		"email":email,
		"mobile":mobile,
		"passwd":passwd,
		"repasswd":repasswd
		},
		success: function(msg){
			var data = $.parseJSON(msg); 
			if(data.status === true ){
				 window.location=data.successMsg.redirect;
			}else{
				setUiMessege('err',data.errorMsg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
		}
	});
}



