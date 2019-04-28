<div class="line"></div>
	<h2>Add/Edit Room</h2>
	<div>
		<!-- <form> -->
			<input type="hidden" id="room_id" name="room_id" value='<?php if(isset($room_id)){ echo $room_id; }else{ echo ""; } ?>' readonly>

			<label for="room_number">Room Number</label>
			<input type="text" id="room_number" name="room_number" placeholder="Room Number..">

			<label for="floor_number">Floor Number</label>
			<input type="text" id="floor_number" name="floor_number" placeholder="Floor Number..">

			<label for="floor_number">Room Type</label>
			<select id="room_type" name="room_type_id"></select>

			<label for="floor_number">Hotel</label>
			<select id="hotel" name="hotel_id"></select>

			<input type="submit" id="submitBtn" value="Submit">

		<!-- </form> -->
	</div>
<div class="line"></div>


<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	var room_id = $('#room_id').val();

	$(document).ready(function(){

			if (room_id !=  "") {
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
					url: baseUrl + "api/getRoomType", 
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
			                            txt += (typeof(obj.data[i].room_type_name) != "undefined") ? '<option value="'+obj.data[i].room_type_id+'">'+obj.data[i].room_type_name+'</option>' : '<option> </option>';
			                            
			                    }
			                    if(txt != ""){
			                        $("#room_type").append(txt).removeClass("hidden");
			                    }
			                }
			            }

					}
				});

				$.ajax({
					type: 'POST',
					url: baseUrl + "api/getRoom" + '?' + $.param({"id": room_id}), 
					data: { },
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						$("#room_number").val(obj.data[0].room_number);
						$("#floor_number").val(obj.data[0].floor_number);
						$("#room_type").val(obj.data[0].room_type_id);
						$("#hotel").val(obj.data[0].hotel_id);

					}
				});

				$("#submitBtn").click(function(){  
					$.ajax({
						type: 'POST',
						url: baseUrl + "api/updateRoom", 
						data: { 
						        'room_number': $('#room_number').val(), 
						        'room_type_id': $('#room_type').val() ,
						        'floor_number': $('#floor_number').val() ,
						        'hotel_id': $('#hotel').val() ,
						        'room_id': $('#room_id').val() 
						},
						headers: {"Authorization": localStorage.getItem("token")},
						success: function(result){
							var obj = jQuery.parseJSON( result );
							alert(obj.status);
							window.location.href = baseUrl+"admin/room";
						}
					});

			    });
			}else{
				$("#submitBtn").click(function(){  
					$.ajax({
						type: 'POST',
						url: baseUrl + "api/setRoom", 
						data: { 
						        'room_number': $('#room_number').val(), 
						        'room_type_id': $('#room_type').val() ,
						        'floor_number': $('#floor_number').val() ,
						        'hotel_id': $('#hotel').val() 
						},
						headers: {"Authorization": localStorage.getItem("token")},
						success: function(result){
							var obj = jQuery.parseJSON( result );
							alert(obj.status);
							window.location.href = baseUrl+"admin/room";
						}
					});

			    });

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
					url: baseUrl + "api/getRoomType", 
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
			                            txt += (typeof(obj.data[i].room_type_name) != "undefined") ? '<option value="'+obj.data[i].room_type_id+'">'+obj.data[i].room_type_name+'</option>' : '<option> </option>';
			                            
			                    }
			                    if(txt != ""){
			                        $("#room_type").append(txt).removeClass("hidden");
			                    }
			                }
			            }

					}
				});

			}
		    
		});

</script>