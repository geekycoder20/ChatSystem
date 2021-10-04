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
					$("#result_login_user").html("<div class='alert alert-danger'>Username or password is incorrect</div>");
				}else if(data==1){
					location.reload();
				}else{
					$("#result_login_user").html("<div class='alert alert-danger'>"+data+"</div>");
				}
				
			}
		});

	});











});