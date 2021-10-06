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
				// alert(data);
			}
		});
	});



//
	$(".users").on("click",".person",function(){
		userid = $(this).attr("user-id");
		$("#msg_txt").attr("touser",userid);
		$("#toname").text("Akram");
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
				// if (data==1) {
				// 	location.reload();
				// }else{
				// 	alert("Something went wrong");
				// }
				// alert(data);
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
				for (var i = 0; i < data.length; i++) {
					var today = new Date();
					var time = new Date(Date.parse(data[i].timestamp));
					mytime = time.getDate()+"-"+time.getMonth()+"-"+time.getFullYear()+" "+time.getHours()+":"+time.getMinutes();
					if (today.getDate()==time.getDate()) {
						mytime = time.getHours()+":"+time.getMinutes();
					}

					

					if(userid==data[i].receiverid){
						if (data[i].status==1) {
							var seen_tick = " <span class='fa fa-check-circle'></span>";
						}else{
							var seen_tick = "";
						}
						
						output+= "<li class='chat-right'><div class='chat-hour'>"+mytime+seen_tick+"</div><div class='chat-text' style='background: #d7edd5;'>"+data[i].msg+"</div><div class='chat-avatar'><img src='https://www.bootdey.com/img/Content/avatar/avatar5.png' alt='Retail Admin'><div class='chat-name'>You</div></div></li>";
					}else{
						var seen_tick = "";
						output+= "<li class='chat-left'><div class='chat-avatar'><img src='https://www.bootdey.com/img/Content/avatar/avatar3.png' alt='Retail Admin'><div class='chat-name'>Russell</div></div><div class='chat-text'>"+data[i].msg+"</div><div class='chat-hour'>"+mytime+seen_tick+"</div></li>";
					}
				}
				// console.log(data);
				$(".chat-box").html(output);
			}
		});
	}

    setInterval(function(){ 
    showchats($("#active_user_id").attr("currentid"));  
	}, 2000);








function dayOfWeekAsString(dayIndex) {
  return ["Sunday", "Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][dayIndex] || '';
}




});