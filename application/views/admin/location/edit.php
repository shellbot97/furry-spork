<div class="line"></div>
	<h2>Add Location</h2>
	<div>
		<!-- <form> -->
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
	$(document).ready(function(){
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

	    
	});

</script>