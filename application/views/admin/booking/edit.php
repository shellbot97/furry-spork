<div class="line"></div>
	<h2>Add/Edit Booking</h2>
	<div>
		<!-- <form> -->
			<input type="hidden" id="booking_id" name="booking_id" value='<?php if(isset($booking_id)){ echo $booking_id; }else{ echo ""; } ?>' readonly>

			<label for="phone_number">Phone Number</label>
			<input type="text" id="phone_number" name="phone_number" placeholder="Phone Number..">

			<label for="first_name">First Name</label>
			<input type="text" id="first_name" name="first_name" placeholder="First Name..">

			<label for="last_name">Last Name</label>
			<input type="text" id="last_name" name="last_name" placeholder="Last Name..">

			<label for="address_1">Address 1</label>
			<input type="text" id="address_1" name="address_1" placeholder="Address 1..">

			<label for="address_2">Address 2</label>
			<input type="text" id="address_2" name="address_2" placeholder="Address 2..">

			<label for="adult">Adults</label>
			<input type="text" id="adult" name="adult" placeholder="Adults..">

			<label for="children">Children</label>
			<input type="text" id="children" name="children" placeholder="Children..">

			<label for="from_date">From Date</label>
			<input type="date" id="from_date" name="from_date" placeholder="From Date..">

			<label for="to_date">To Date</label>
			<input type="date" id="to_date" name="to_date" placeholder="To Date..">

			<label for="hotel">Hotel Name</label>
			<select id="hotel" name="hotel_id"></select>

			<button class = "refresh" id = "refresh"><i class="fa fa-refresh" aria-hidden="true"></i> </button><br>

			<label for="room_number">Room Number</label>
			<select id="room_number" name="room_id"></select>


			<input type="submit" id="submitBtn" value="Submit">
		<!-- </form> -->
	</div>
<div class="line"></div>


<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	var booking_id = $('#booking_id').val();

	$(document).ready(function(){
		if (booking_id != "") {
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

			$("#phone_number").on("keyup", function( ){

				if(this.value.length == 10) {
					$.ajax({
						type: 'POST',
						url: baseUrl + "api/getCustomer", 
						data: {  
							'phone_number' : this.value
						},
						headers: {"Authorization": localStorage.getItem("token")},
						success: function(result){
							var obj = jQuery.parseJSON( result );
							if(obj.data){
				                var len = obj.data.length;
				                console.log(obj.data);
				                
				                $("#phone_number").val(obj.data[0].phone_number);
				                $("#first_name").val(obj.data[0].first_name);
				                $("#last_name").val(obj.data[0].last_name);
				                $("#address_1").val(obj.data[0].address_1);
				                $("#address_2").val(obj.data[0].address_2);
				            }

						}
					});
				}

			});

			$("#submitBtn").click(function(){ 
				$.ajax({
					type: 'POST',
					url: baseUrl + "api/setBooking", 
					data: { 
					        'phone_number': $('#phone_number').val(), 
					        'first_name': $('#first_name').val(), 
					        'last_name': $('#last_name').val(), 
					        'address_1': $('#address_1').val(), 
					        'address_2': $('#address_2').val(), 
					        'adult': $('#adult').val(), 
					        'children': $('#children').val(), 
					        'hotel_id': $('#hotel').val(), 
					        'room_id': $('#room_number').val(), 
					        'from_date': $('#from_date').val(), 
					        'to_date': $('#to_date').val()
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						console.log(obj);
						alert(obj.status);
						window.location.href = baseUrl+"admin/home";
					}
				});
    		}); 
		}
	});
	$('#refresh').on('click', function() {
		if ($('#from_date').val() != "" && $('#to_date').val() != "") {
			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getAvailRoom", 
				data: {  
					'hotel_id' : $('#hotel').val(),
					'from_date' : $('#from_date').val(),
					'to_date' : $('#to_date').val(),
				},
				headers: {"Authorization": localStorage.getItem("token")},
				success: function(result){
					var obj = jQuery.parseJSON( result );
					if(obj.data){
		                var len = obj.data.length;
		                var txt = "";
		                if(len > 0){
		                    for(var i=0;i<len;i++){
	                				$('#room_number').find('option').remove().end();
		                            txt += (typeof(obj.data[i].room_number) != "undefined") ? '<option value="'+obj.data[i].room_id+'">'+obj.data[i].room_number+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#room_number").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});
		}
	});

</script>