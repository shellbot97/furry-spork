<!-- Page Content  -->

            <div class="line"></div>

            <table id="custom_table">
			  <tr>
			    <th>Hotel Name</th>
			    <th>Location</th>
			    <th>Documents Required</th>
			  </tr>
			  
			</table>

            <div class="line"></div>
<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
			url: baseUrl + "api/getHotel", 
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
	                            txt += (typeof(obj.data[i].hotel_name) != "undefined") ? "<tr><td>"+obj.data[i].hotel_name+"</td>" : "<tr><td>-</td>";
	                            txt += (typeof(obj.data[i].location_id) != "undefined") ? "<td>"+obj.data[i].location_id+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].documents_required) != "undefined") ? "<td>"+obj.data[i].documents_required+"</td>" : "<td>-</td>";
	                            
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