<div class="line"></div>
	<h2>Add/Edit User</h2>
	<div>
		<!-- <form> -->
			<input type="hidden" id="user_id" name="user_id" value='<?php if(isset($user_id)){ echo $user_id; }else{ echo ""; } ?>' readonly>

			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Username..">

			<label for="first_name">First Name</label>
			<input type="text" id="first_name" name="first_name" placeholder="First Name..">

			<label for="last_name">Last Name</label>
			<input type="text" id="last_name" name="last_name" placeholder="Last Name..">

			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Password..">

			<label for="is_admin">Admin - </label>
			<input type="checkbox" name="is_admin" id="is_admin" value="1"> <br>

			<label for="hotel">Hotel</label>
			<select id="hotel" name="hotel_id"></select>
			<input type="submit" id="submitBtn" value="Submit">

		<!-- </form> -->
	</div>
<div class="line"></div>


<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	var user_id = $('#user_id').val();
	console.log(user_id);

	$(document).ready(function(){

		if (user_id != "") {

			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getHotel", 
				data: {  
				},
				headers: {"Authorization": localStorage.getItem("token")},
				success: function(result){
					var obj = jQuery.parseJSON( result );
					if(obj.data){
		                var len = obj.data.length;
		                var txt = "";
		                if(len > 0){
		                    for(var i=0;i<len;i++){
		                            txt += (typeof(obj.data[i].hotel_name) != "undefined") ? '<option value="'+obj.data[i].hotel_id+'">'+obj.data[i].hotel_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#hotel").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});

			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getUser" + '?' + $.param({"id": user_id}), 
				data: { },
				headers: {"Authorization": localStorage.getItem("token")},
				success: function(result){
					var obj = jQuery.parseJSON( result );
					$("#username").val(obj.data[0].username);
					$("#first_name").val(obj.data[0].first_name);
					$("#last_name").val(obj.data[0].last_name);
					$("#hotel").val(obj.data[0].hotel_id);
					if (obj.data[0].is_admin == 1)
					$("#is_admin").prop('checked', true);

				}
			});

			$("#submitBtn").click(function(){  
				$.ajax({
					type: 'POST',
					url: baseUrl + "api/updateUser", 
					data: { 
					        'username': $('#username').val(), 
					        'first_name': $('#first_name').val() ,
					        'last_name': $('#last_name').val() ,
					        'hotel_id': $('#hotel').val() ,
					        'password': $('#password').val() ,
					        'is_admin': $('#is_admin').val() ,
					        'user_id': user_id 
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						alert(obj.status);
						window.location.href = baseUrl+"admin/user";
					}
				});

		    });

		}else{
			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getHotel", 
				data: {  
				},
				headers: {"Authorization": localStorage.getItem("token")},
				success: function(result){
					var obj = jQuery.parseJSON( result );
					if(obj.data){
		                var len = obj.data.length;
		                var txt = "";
		                if(len > 0){
		                    for(var i=0;i<len;i++){
		                            txt += (typeof(obj.data[i].hotel_name) != "undefined") ? '<option value="'+obj.data[i].hotel_id+'">'+obj.data[i].hotel_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#hotel").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});

			$("#submitBtn").click(function(){  
				$.ajax({
					type: 'POST',
					url: baseUrl + "api/setUser", 
					data: { 
					        'username': $('#username').val(), 
					        'first_name': $('#first_name').val() ,
					        'last_name': $('#last_name').val() ,
					        'hotel_id': $('#hotel').val() ,
					        'password': $('#password').val() ,
					        'is_admin': ($('#is_admin:checked').length > 0) ? "1" : "0"	 
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						alert(obj.status);
						window.location.href = baseUrl+"admin/user";
					}
				});

		    });
		}




	    
	});

</script>