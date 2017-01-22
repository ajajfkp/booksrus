$( document ).ready(function(){
	$("#searchButton").click(function(event){
		if(!$("#searchInput").val()){
			event.preventDefault();
		}
	});
	//swal("Here's a message!")
	//alert("Here's a message!")
	
});

function search(searchby){
	$.ajax({ 
		type: "POST",
		url: base_url+'Home/userLogout',
		data: {
			'searchby':searchby,
		},
		success: function(msg){
			var data = $.parseJSON(msg); 
			 window.location=data.successMsg.redirect;
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			setUiMessege('err',errorThrown);
		}
	});
}

function getCityByStateId(id){
	var stateId = id.value;
	if(stateId){
		$.ajax({ 
			type: "POST",
			url: base_url+'common/commonctrl/getCityByStateIdDd',
			data: {
				'stateid':stateId
			},
			success: function(msg){
				if(msg!=="false"){
					$('#city').html(msg);
				}else{
					setUiMessege('err','No record found');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	}
}

function getUniListByStateId(id){
	var stateId = id.value;
	if(stateId){
		$.ajax({ 
			type: "POST",
			url: base_url+'common/commonctrl/getUniListByStateId',
			data: {
				'stateid':stateId
			},
			success: function(msg){
				if(msg!=="false"){
					$('#university').html(msg);
				}else{
					setUiMessege('err','No record found');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	}
}

function openuserunivaddform(id){
	var univId = id.value;
	if(univId==-2){
		$.ajax({ 
			type: "POST",
			url: base_url+'common/commonctrl/openuserunivaddform',
			data: {
				'stateid':univId
			},
			success: function(msg){
				$('body').append(msg);
				
				$("#univpopcross").on("click",function(){
					$('#addunivformclose').remove();
					$('#university').val('');
				});
				
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	}
}

function addunivbyuser(){
	var errObj = [];
	var uniName = $('#name').val();
	var nickname = $('#nickname').val();
	var website = $('#website').val();
	var uni_state = $('#states').val();
	var city = $('#city').val();
	
	errObj.push('name,Please enter university name');
	errObj.push('states,Please select university state');
	errObj.push('city,Please select university city');
	
	if(validateinput(errObj)){
		return false;
	}else{
		$.ajax({ 
			type: "POST",
			url: base_url+'common/commonctrl/addunivbyuser',
			data: {
				'name':uniName,
				'nickname':nickname,
				'website':website,
				'uni_state':uni_state,
				'city':city,
			},
			success: function(msg){
				if(msg!='fail'){
					$('#addunivformclose').remove();
					$('#university').html(msg);
				}else{
					setUiMessege('err','Please reload page and try again');
				}
				
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	}
}


function activateHeadMeanu(idArr){
	$("#navbar >ul >li").removeClass("active");
	if(idArr.length>0){
		var targetId = idArr.split(',');
		for(var i in targetId){
			$("#"+targetId[i]).addClass("active");
		}
	}
}

function activateLeftMeanu(idArr){
	$("#bs-sidebar-navbar-collapse-1 >ul >li").removeClass("active");
	if(idArr.length>0){
		var targetId = idArr.split(',');
		for(var i in targetId){
			$("#"+targetId[i]).addClass("active");
		}
	}
}


















