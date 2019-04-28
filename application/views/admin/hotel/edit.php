
<!-- -------------------------------------------- page specific scripts ---------------------------------------------------------- -->
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<!-- -------------------------------------------- ------------------------------------------------------------------------------- -->

<div class="line"></div>
	<h2>Add Hotel</h2>
	<div>
		<!-- <form> -->
			<input type="hidden" id="hotel_id" name="hotel_id" value='<?php if($hotel_id){ echo $hotel_id; }else{ echo ""; } ?>' readonly>
			<label for="hotel_name">Hotel Name - </label>
			<input type="text" id="hotel_name" name="hotel_name" placeholder="Hotel name..">
			<label for="location">Location - </label>
			<select id="location" name="location_id"></select>
			<label for="document">Documents Required - </label>
			<select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" id="document" name="documents_required"></select>
			<h6>** press Ctrl for multi-selecting.</h6>
			<input type="submit" id="submitBtn" value="Submit">
		<!-- </form> -->
	</div>
<div class="line"></div>


<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
	var hotel_id = $('#hotel_id').val();


	$(document).ready(function(){
		if (hotel_id != "") {
			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getLocation", 
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
		                            txt += (typeof(obj.data[i].location_id) != "undefined") ? '<option value="'+obj.data[i].location_id+'">'+obj.data[i].location_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#location").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});

			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getDocument", 
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
		                            txt += (typeof(obj.data[i].document_name) != "undefined") ? '<option value="'+obj.data[i].document_id+'">'+obj.data[i].document_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#document").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});	

			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getHotel" + '?' + $.param({"id": hotel_id}), 
				data: { },
				headers: {"Authorization": localStorage.getItem("token")},
				success: function(result){
					var obj = jQuery.parseJSON( result );
					$("#hotel_name").val(obj.data[0].hotel_name);
					$("#location").val(obj.data[0].location_id);
					var docs = jQuery.parseJSON( obj.data[0].documents_required );
					$("#document").val(docs);

				}
			});	

			$("#submitBtn").click(function(){  
				$.ajax({
					type: 'POST',
					url: baseUrl + "api/updateHotel", 
					data: { 
					        'location_id': $('#location').val(), 
					        'hotel_name': $('#hotel_name').val(),
					        'documents_required': JSON.stringify($('#document').val()),
					        "hotel_id": hotel_id 
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						alert(obj.status);
						window.location.href = baseUrl+"admin/hotel";
					}
				});

		    });	
		}else{

			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getLocation", 
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
		                            txt += (typeof(obj.data[i].location_id) != "undefined") ? '<option value="'+obj.data[i].location_id+'">'+obj.data[i].location_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#location").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});

			$.ajax({
				type: 'POST',
				url: baseUrl + "api/getDocument", 
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
		                            txt += (typeof(obj.data[i].document_name) != "undefined") ? '<option value="'+obj.data[i].document_id+'">'+obj.data[i].document_name+'</option>' : '<option> </option>';
		                            
		                    }
		                    if(txt != ""){
		                        $("#document").append(txt).removeClass("hidden");
		                    }
		                }
		            }

				}
			});	

			$("#submitBtn").click(function(){  
				$.ajax({
					type: 'POST',
					url: baseUrl + "api/setHotel", 
					data: { 
					        'location_id': $('#location').val(), 
					        'hotel_name': $('#hotel_name').val(),
					        'documents_required': $('#document').val()
					},
					headers: {"Authorization": localStorage.getItem("token")},
					success: function(result){
						var obj = jQuery.parseJSON( result );
						alert(obj.status);
						window.location.href = baseUrl+"admin/hotel";
					}
				});

		    });
		}
	});



</script>
