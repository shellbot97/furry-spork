<!-- Page Content  -->

            <div class="line"></div>

            <table id="custom_table">
			  <tr>
			    <th>Location Name</th>
			    <th>City</th>
			    <th>Action</th>
			  </tr>
			  
			</table>

            <div class="line"></div>
<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
			url: baseUrl + "api/getLocation", 
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
	                            txt += (typeof(obj.data[i].location_name) != "undefined") ? "<tr><td>"+obj.data[i].location_name+"</td>" : "<tr><td>-</td>";
	                            txt += (typeof(obj.data[i].city_name) != "undefined") ? "<td>"+obj.data[i].city_name+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].location_id) != "undefined") ? '<td> <button class = "delete" id = "'+obj.data[i].location_id+'"> <i class="fa fa-trash" aria-hidden="true"></i> </button> <button class = "update" id = "'+obj.data[i].location_id+'"><i class="fa fa-pencil" aria-hidden="true"></i> </button> </td>' : '<td>-</td>';
	                            
	                    }
	                    if(txt != ""){
	                        $("#custom_table").append(txt).removeClass("hidden");
	                    }
	                }
	            }

			}
		});
	});
	$('body').on('click','.delete',function(){
	    var id = this.id;
	    $.ajax({
				type: 'POST',
				url: baseUrl + "api/deleteLocation", 
				data: { 
				        'location_id': id
				},
				headers: {"Authorization": localStorage.getItem("token")},
				success: function(result){
					var obj = jQuery.parseJSON( result );
					if(obj.data){
						var obj = jQuery.parseJSON( result );
						alert(obj.status);
						window.location.href = baseUrl+"admin/location";
		            }

				}
		});
	});
	$('body').on('click','.update',function(){
	    var id = this.id;
	    window.location.href = baseUrl+"admin/location/update/"+id;
	    
	});

</script>