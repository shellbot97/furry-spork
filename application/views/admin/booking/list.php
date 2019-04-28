<!-- Page Content  -->

            <div class="line"></div>

            <table id="custom_table">
		  		<tr>
		  			<th>Customer Name</th>
		  			<th>Hotel Name</th>
		  			<th>Room Number</th>
		  			<th>Invoice Number</th>
		  			<th>From date</th>
		  			<th>To Date</th>
		  			<th>Adults</th>
		  			<th>Children</th>
		  			<th>Actions</th>
			  	</tr>
			</table>

            <div class="line"></div>
<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
			url: baseUrl + "api/getBooking", 
			data: { },
			headers: {"Authorization": localStorage.getItem("token")},
			success: function(result){
				var obj = jQuery.parseJSON( result );
				if(obj.data){
	                var len = obj.data.length;
	                var txt = "";
	                if(len > 0){
	                    for(var i=0;i<len;i++){
	                            txt += (typeof(obj.data[i].customer_name) != "undefined") ? "<tr><td>"+obj.data[i].customer_name+"</td>" : "<tr><td>-</td>";
	                            txt += (typeof(obj.data[i].hotel_name) != "undefined") ? "<td>"+obj.data[i].hotel_name+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].room_number) != "undefined") ? "<td>"+obj.data[i].room_number+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].invoice_number) != "undefined") ? "<td>"+obj.data[i].invoice_number+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].from_date) != "undefined") ? "<td>"+obj.data[i].from_date+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].to_date) != "undefined") ? "<td>"+obj.data[i].to_date+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].adult) != "undefined") ? "<td>"+obj.data[i].adult+"</td>" : "<td>-</td>";
	                            txt += (typeof(obj.data[i].children) != "undefined") ? "<td>"+obj.data[i].children+"</td>" : "<td>-</td>";

	                            txt += (typeof(obj.data[i].booking_id) != "undefined") ? '<td> <button class = "delete" id = "'+obj.data[i].booking_id+'"> <i class="fa fa-trash" aria-hidden="true"></i> </button> <button class = "print" id = "'+obj.data[i].booking_id+'"><i class="fa fa-print" aria-hidden="true"></i> </button> </td>' : '<td>-</td>';
	                            
	                    }
	                    if(txt != ""){
	                        $("#custom_table").append(txt).removeClass("hidden");
	                    }
	                }
	            }

			}
		});

		$('body').on('click','.delete',function(){
		    var id = this.id;
		    $.ajax({
					type: 'POST',
					url: baseUrl + "api/deleteBooking", 
					data: { 
					        'booking_id': id
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						if(obj.data){
							var obj = jQuery.parseJSON( result );
							alert(obj.status);
							window.location.href = baseUrl+"admin/home";
			            }

					}
			});
		});
		$('body').on('click','.print',function(){
		    var id = this.id;
		    window.location.href = baseUrl+"booking/print/"+id;
		    
		});
	});


</script>