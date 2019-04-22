<!-- Page Content  -->

            <div class="line"></div>

            <table id="custom_table">
			  <tr>
			    <th>Room Number</th>
			    <th>Room Type</th>
			    <th>Floor</th>
			    <th>Hotel</th>
			  </tr>
			  
			</table>

            <div class="line"></div>
<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
			url: baseUrl + "api/getRoom", 
			data: { 
			        // 'username': $('#username').val(), 
			        // 'password': $('#password').val() 
			},
			headers: {"Authorization": localStorage.getItem("token")},
			success: function(result){
				var obj = jQuery.parseJSON( result );
				if(obj.data){
	                var len = obj.data.length;
	                var txt = "";
	                if(len > 0){
	                    for(var i=0;i<len;i++){
	                            txt += (typeof(obj.data[i].room_number) != "undefined") ? "<tr><td>"+obj.data[i].room_number+"</td>" : "<tr><td>-</td>";
	                            txt += (typeof(obj.data[i].room_type_name) != "undefined") ? "<td>"+obj.data[i].room_type_name+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].floor_number) != "undefined") ? "<td>"+obj.data[i].floor_number+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].hotel_name) != "undefined") ? "<td>"+obj.data[i].hotel_name+"</td>" : "<td>-</td>";
	                            
	                    }
	                    if(txt != ""){
	                        $("#custom_table").append(txt).removeClass("hidden");
	                    }
	                }
	            }

			}
		});
	});

</script>