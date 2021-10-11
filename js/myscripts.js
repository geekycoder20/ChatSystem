$(document).ready(function(){
	//Register User
	$("#reg_btn").click(function(e){
		e.preventDefault();
		var formdata = new FormData($("#reg_form")[0]);
		formdata.append("action","reg_user");
		$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data: formdata,
			contentType:false,
			processData:false,
			success:function(data){
				if (data==0) {
					$("#result_reg_user").html("<div class='alert alert-danger'>Something Went wrong</div>");
				}
				else if(data==1){
					$("#result_reg_user").html("<div class='alert alert-success'>User Registered Successfully</div>");
					$("#reg_form")[0].reset();
				}else{
					$("#result_reg_user").html("<div class='alert alert-danger'>"+data+"</div>");
				}
			}
		});

	});


//Login User
	$("#login_btn").click(function(e){
		e.preventDefault();
		var formdata = new FormData($("#login_form")[0]);
		formdata.append("action","login_user");
		$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data: formdata,
			contentType:false,
			processData:false,
			success:function(data){
				if (data==0) {
					$("#result_login_user").html("<div class='alert alert-danger'>Email or password is incorrect</div>");
				}else if(data==1){
					location.reload();
				}else{
					$("#result_login_user").html("<div class='alert alert-danger'>"+data+"</div>");
				}
				
			}
		});

	});


//Logout User
	$("#logout_btn").click(function(e){
		e.preventDefault();
		$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data:{action:"logout_user"},
			success:function(data){
				if (data==1) {
					location.reload();
				}else{
					alert("Something went wrong");
				}
			}
		});
	});



//
	$(".users").on("click",".person",function(){
		userid = $(this).attr("user-id");
		$("#msg_txt").attr("touser",userid);
		$("#active_user_id").attr("currentid",userid);
		showchats(userid);
	});




//Insert Chat
	$("#chat_send_btn").click(function(e){
		receiverid = $("#msg_txt").attr("touser");
		msg = $("#msg_txt").val();
		e.preventDefault();
		$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data:{action:"insertchat",receiverid:receiverid,msg:msg},
			success:function(data){
				$("#msg_txt").val("");
			}
		});
	});




//show chats
function showchats(userid){
	let output = "";
	let rightchat = "";
	$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data:{action:"showchats",userid:userid},
			dataType:"json",
			success:function(data){
				for (var i = 0; i < data[0].length; i++) {
					//check time
					var today = new Date();
					var time = new Date(Date.parse(data[0][i].timestamp));
					mytime = time.getDate()+"-"+time.getMonth()+"-"+time.getFullYear()+" "+time.getHours()+":"+time.getMinutes();
					if (today.getDate()==time.getDate()) {
						mytime = time.getHours()+":"+time.getMinutes();
					}
					//check status for msg seen
					if(userid==data[0][i].receiverid){
						if (data[0][i].status==1) {
							var seen_tick = " <span class='fa fa-check-circle'></span>";
						}else{
							var seen_tick = "";
						}
						
						output+= "<li class='chat-right'><div class='chat-hour'>"+mytime+seen_tick+"</div><div class='chat-text' style='background: #d7edd5;'>"+data[0][i].msg+"</div><div class='chat-avatar'><img src='https://www.bootdey.com/img/Content/avatar/avatar5.png' alt='Retail Admin'><div class='chat-name'>You</div></div></li>";
					}else{
						var seen_tick = "";
						output+= "<li class='chat-left'><div class='chat-avatar'><img src='https://www.bootdey.com/img/Content/avatar/avatar3.png' alt='Retail Admin'><div class='chat-name'>"+data[1][0].name+"</div></div><div class='chat-text'>"+data[0][i].msg+"</div><div class='chat-hour'>"+mytime+seen_tick+"</div></li>";
					}
				}

				$("#toname").text(data[1][0].name);
				$(".chat-box").html(output);

			}
		});
	}



function update_login_details(){
	$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data: {action:"update_login_details"},
			success:function(data){

			}
	});
}


function get_login_details(){
	$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data: {action:"get_login_details"},
			dataType:"json",
			success:function(data){
				for (var i = 0; i<data.length; i++) {
					var today = new Date();
					var activity = new Date(Date.parse(data[i].lastactivity));
					var today_date = today.getDate();
					var today_hours = today.getHours();
					var today_mins = today.getMinutes();
					var activity_date = activity.getDate();
					var activity_hours = activity.getHours();
					var activity_mins = activity.getMinutes();
					if (today_date==activity_date && today_hours==activity_hours) {
						if ((activity_mins + 1) > today_mins) {
							$(".mystatus").each(function() {
								if ($(this).attr("uid")==data[i].userid) {
									$(this).addClass("online");
								}
							});
						}else{
							$(".mystatus").each(function() {
								if ($(this).attr("uid")==data[i].userid) {
									$(this).removeClass("online");
								}
							});
						}
						
					}
				}
			}
	});
}

    setInterval(function(){ 
    	showchats($("#active_user_id").attr("currentid")); 
    	get_login_details();
	}, 2000);

	setInterval(function(){ 
    	update_login_details(); 
	}, 2000);




//Update Profile
	$("#update_profile_btn").click(function(e){
		e.preventDefault();
		var formdata = new FormData($("#update_profile")[0]);
		formdata.append("action","update_profile");
		$.ajax({
			url:'ajax/myajax.php',
			type:'POST',
			data: formdata,
			contentType:false,
			processData:false,
			success:function(data){
				if (data==0) {
					$("#profile_result").html("<div class='alert alert-danger'>Something Went wrong</div>");
				}
				else if(data==1){
					$("#profile_result").html("<div class='alert alert-success'>Profile Updated Successfully.</div>");
					$("#update_profile")[0].reset();
				}else{
					$("#profile_result").html("<div class='alert alert-danger'>"+data+"</div>");
				}
			}
		});

	});






function dayOfWeekAsString(dayIndex) {
  return ["Sunday", "Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][dayIndex] || '';
}




});