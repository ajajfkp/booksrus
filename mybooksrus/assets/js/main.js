$( document ).ready(function(){
	$('[data-toggle="isbnpopover"]').popover(); 
	$("#searchButton").click(function(event){
		if(!$("#searchInput").val() || !$("#university").val()){
			event.preventDefault();
		}
	});
	
	$("#uderupdatebyadmin").click(function(event){
		if($("#user_type").val() =='1'){
			var conf  = confirm("Do you want to make this user as administrator ?");
			if(!conf){
				event.preventDefault();
			}
		}
	});
	//swal("Here's a message!")
	//alert("Here's a message!")
	$(document).on('click','.imgblock',function(){
		$('#photoimg').click();
	});
	
	$('#photoimg').change(function(){
		$("#imageform").ajaxForm({
			beforeSend: function() {
			 	var percentVal = '0%';
				$('.prog-comp-inner').width(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				$('.prog-comp-inner').width(percentVal);
			},
			complete: function(msg,status) {
				$('.prog-comp-inner').width('0%');
				var returnData = $.parseJSON(msg.responseText);
				if(returnData.error){
					setUiMessege('err',returnData.error);
				}else{
				$('.phpto-area').css({'padding':0});
				var imgHtml = '<span id="img-close" class="img-close">x</span><img src="'+base_url+'uploads/booksimg/'+returnData.file_name+'" alt="'+returnData.file_name+'" width="100%"/>';
				$('.imgarea').html(imgHtml);
				$('#imgname').val(returnData.file_name);
				console.log(returnData)
				}
			},error: function(xhr, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		}).submit();
	});
	
	$(document).on('click','.imgblock',function(){
		$('#photoimgupload').click();
	});
	
	$('#photoimgupload').change(function(){
		console.log('ddd')
		$("#imageform").ajaxForm({
			beforeSend: function() {
			 	var percentVal = '0%';
				$('.prog-comp-inner').width(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				$('.prog-comp-inner').width(percentVal);
			},
			complete: function(msg,status) {
				$('.prog-comp-inner').width('0%');
				var returnData = $.parseJSON(msg.responseText);
				if(returnData.error){
					setUiMessege('err',returnData.error);
				}else{
				$('.phpto-area').css({'padding':0});
				var imgHtml = '<span id="img-close" class="img-close" style="top: 12px;">x</span><img src="'+base_url+'uploads/booksimg/'+returnData.file_name+'" alt="'+returnData.file_name+'" width="100%"/>';
				$('.imgarea').html(imgHtml);
				$('#imgname').val(returnData.file_name);
				console.log(returnData)
				}
			},error: function(xhr, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		}).submit();
	});
	
	$(document).on('click','#img-close',function(){
		 $('.phpto-area').css({'padding':40});
		 $('.imgarea').html(
			 '<a href="javascript:void(0);" class="imgblock" title="Add photo">'+
			 '<span class="imgview">'+
			 '<div class="glyphicon glyphicon-plus"style="font-size:3em;"></div>'+
			 '</span>'+'</a>'
		 );
		 $('#imgname').val('');
	});
	
	$('#btn-chat').click(function(){
		var errObj = [];
		var inputmsg = $('#reply-message').val();
		var transId = $('#transId').val();
		errObj.push('reply-message,This field is required.');
		if(validateinput(errObj)){
			return false;
		}else{
			$.ajax({
				type: "POST",
				url: base_url+'message/replymsg',
				data: {
					'transId':transId,
					'inputmsg':inputmsg
				},
				success: function(msg){
					var obj = $.parseJSON(msg);
					if(obj.status == 'true'){
						$('.chat').append(obj.msg);
						$('#reply-message').val('');
						setUiMessege('suc','Message sent successfully.');
					}else{
						setUiMessege('err',obj.msg);
					}
					//window.location=data.successMsg.redirect;
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					//setUiMessege('err',errorThrown);
				}
			});
			$('#reply-message').val('');
		}
	});
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

function getUniListByStateId(id,wother){
	var stateId = id.value;
	var withother = wother ? wother : 0;
	if(stateId){
		$.ajax({ 
			type: "POST",
			url: base_url+'search/getUniListByStateId',
			data: {
				'stateid':stateId,
				'withother':withother
			},
			success: function(msg){
				if(msg!=="false"){
					$('#university').html(msg);
					$('.selectpicker').selectpicker('refresh');
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

function contactWithUs(){
	var errObj = [];
	var name = $('#name').val();
	var email = $('#email').val();
	var subject = $('#subject').val();
	var message = $('#message').val();
	var city = $('#city').val();
	errObj.push('name,Please enter your name');
	errObj.push('email,Please enter your email');
	errObj.push('subject,Please enter subject');
	errObj.push('message,Please enter message');
	if(validateinput(errObj)){
		return false;
	}else{
		validateForm(email);
		if(!grecaptcha.getResponse()){
			alert('Pleade enter re-capcha');
			return false;
		}
		$.ajax({ 
			type: "POST",
			url: base_url+'index/contactus',
			data: {
				'name':name,
				'email':email,
				'subject':subject,
				'message':message,
				'g-recaptcha-response':grecaptcha.getResponse()
			},
			success: function(msg){
				$('#name').val('');
				$('#email').val('');
				$('#subject').val('');
				$('#message').val('');
				if(msg=='success'){
					$('#flagmsg').html('Success : email has been sent to Collegebooksrus.con');
				}else{
					$('#flagmsg').html('Fail : somthing is wrong please try again...');
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

function setusermenu(id){
	$("#leftuseraria").addClass("open");
	$("#leftuseraria > a").attr("aria-expanded",true);
	$("#"+id+" >a ").css({'color':'#ccc'});
}

function booksearchkeyup(){
	window.setTimeout(function(){
		var input  = $('#inputsearch').val();
		$.ajax({
			type: "POST",
			url: base_url+'search/searchbookslist',
			data: {
				'input':input
			},
			success: function(msg){
				if(input){
					$('#innersearchdd').html('');
					$('#innersearchdd').html(msg);
				}else{
					$('#innersearchdd').html('');
				}
				
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	},1000);
}

function booksearch(){
	var input  = $('#inputsearch').val();
	if(!input){
		return false;
	}else{
		$.ajax({
			type: "POST",
			url: base_url+'search/searchbookslist',
			data: {
				'input':input
			},
			success: function(msg){
				$('#innersearchres').html('');
				$('#innersearchres').html(msg);
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	}
}

function deletemessage(transId,types){
	if(transId){
		swal({
		  title: "Are you sure?",
		  text: "Would you like to delete this message!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  closeOnConfirm: false
		},
		function(){
			$.ajax({
				type: "POST",
				url: base_url+'message/deletemsg',
				data: {
					'transId':transId,
					'types':types
				},
				success: function(msg){
					if(msg=='false'){
						
					}else{
						swal("Deleted!", "Your message has been deleted.", "success");
					};
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					setUiMessege('err',errorThrown);
				}
			});
		},function(){
			alert()
		});
	}else{
		setUiMessege('err','Message id not selected');
		return false;
	}
}

function deleteuser(id){
	if(id){
		deleteuserConfirm(id);
	}else{
		setUiMessege('err','Error : Some technical erroe..!!');
	}
}

function deleteuserConfirm(id,rdpage){
	swal({
		title:"Are you sure?",
		text: "Would you like to delete this user!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false
	},
	function(){
		$.ajax({
			type: "POST",
			url: base_url+'admindb/deleteuser',
			data: {
				'uid':id
			},
			success: function(msg){
				var obj = $.parseJSON(msg);
				if(obj.status == 'true'){
					setUiMessege('err',obj.msg);
					if(rdpage=='act'){
						window.location.href = base_url+"admindb/userlist";
					}else if(rdpage=='act'){
						window.location.href = base_url+"admindb/inactivuserlist";
					}
				}else{
					setUiMessege('err',obj.msg);
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				setUiMessege('err',errorThrown);
			}
		});
	},function(){
		alert()
	});
}








