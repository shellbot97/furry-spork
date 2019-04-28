<div class="line"></div>
	<h2>Add/Edit Location</h2>
	<div>
		<!-- <form> -->
			<input type="hidden" id="location_id" name="location_id" value='<?php if(isset($location_id)){ echo $location_id; }else{ echo ""; } ?>' readonly>
			<label for="location_name">Location Name</label>
			<input type="text" id="location_name" name="location_name" placeholder="Location name..">
			<label for="city">City</label>
			<select id="city" name="city_id"></select>
			<input type="submit" id="submitBtn" value="Submit">
		<!-- </form> -->
	</div>
<div class="line"></div>


<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	var location_id = $('#location_id').val();

	$(document).ready(function(){
		if (location_id != "") {
			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getCity", 
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
	                            txt += (typeof(obj.data[i].city_name) != "undefined") ? '<option value="'+obj.data[i].city_id+'">'+obj.data[i].city_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#city").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});
			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getLocation" + '?' + $.param({"id": location_id}), 
				data: { },
				headers: {"Authorization": localStorage.getItem("token")},
				success: function(result){
					var obj = jQuery.parseJSON( result );
					$("#location_name").val(obj.data[0].location_name);
					$("#city").val(obj.data[0].city_id);

				}
			});
			$("#submitBtn").click(function(){ 
				$.ajax({
					type: 'POST',
					url: baseUrl + "api/updateLocation", 
					data: { 
					        'city_id': $('#city').val(), 
					        'location_name': $('#location_name').val(),
					        'location_id' :  $('#location_id').val()
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						alert(obj.status);
						window.location.href = baseUrl+"admin/location";
					}
				});
    		}); 

		}else{
			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getCity", 
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
	                            txt += (typeof(obj.data[i].city_name) != "undefined") ? '<option value="'+obj.data[i].city_id+'">'+obj.data[i].city_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#city").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});  
			$("#submitBtn").click(function(){ 
				$.ajax({
					type: 'POST',
					url: baseUrl + "api/setLocation", 
					data: { 
					        'city_id': $('#city').val(), 
					        'location_name': $('#location_name').val() 
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						alert(obj.status);
						window.location.href = baseUrl+"admin/location";
					}
				});
    		});
		}  
	});

</script>