<!-- Page Content  -->

            <div class="line"></div>

            <table id="custom_table">
			  <tr>
			    <th>Phone Number</th>
			    <th>First Name</th>
			    <th>Last Name</th>
			    <th>Address 1</th>
			    <th>Address 2</th>
			  </tr>
			  
			</table>

            <div class="line"></div>
<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
			url: baseUrl + "api/getCustomer", 
			data: { 
			        // 'username': $('#username').val(), 
			        // 'password': $('#password').val() 
			},
			headers: {"Authorization": localStorage.getItem("token")},
			success: function(result){
				var obj = jQuery.parseJSON( result );
				console.log(obj);
				if(obj.data){
	                var len = obj.data.length;
	                console.log(len);
	                var txt = "";
	                if(len > 0){
	                    for(var i=0;i<len;i++){
	                            txt += (typeof(obj.data[i].phone_number) != "undefined") ? "<tr><td>"+obj.data[i].phone_number+"</td>" : "<tr><td>-</td>";
	                            txt += (typeof(obj.data[i].first_name) != "undefined") ? "<td>"+obj.data[i].first_name+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].last_name) != "undefined") ? "<td>"+obj.data[i].last_name+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].address_1) != "undefined") ? "<td>"+obj.data[i].address_1+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].address_2) != "undefined") ? "<td>"+obj.data[i].address_2+"</td>" : "<td>-</td>";
	                            
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