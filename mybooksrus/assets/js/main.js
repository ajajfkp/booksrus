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
			url: base_url+'common/commonCtrl/getCityByStateIdDd',
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
			url: base_url+'common/commonCtrl/getUniListByStateId',
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
			url: base_url+'common/commonCtrl/openuserunivaddform',
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
			url: base_url+'common/commonCtrl/addunivbyuser',
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



















