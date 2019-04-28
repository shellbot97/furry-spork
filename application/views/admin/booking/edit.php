<div class="line"></div>
	<h2>Add/Edit Booking</h2>
	<div>
		<!-- <form> -->
			<input type="hidden" id="booking_id" name="booking_id" value='<?php if(isset($booking_id)){ echo $booking_id; }else{ echo ""; } ?>' readonly>
			<label for="location_name">Phone Number</label>
			<input type="text" id="phone_number" name="phone_number" placeholder="Phone Number..">

			<label for="location_name">First Name</label>
			<input type="text" id="first_name" name="first_name" placeholder="First Name..">

			<label for="location_name">Last Name</label>
			<input type="text" id="last_name" name="last_name" placeholder="Last Name..">

			<label for="address_1">Address 1</label>
			<input type="text" id="address_1" name="address_1" placeholder="Address 1..">

			<label for="address_2">Address 2</label>
			<input type="text" id="address_2" name="address_2" placeholder="Address 2..">

			<label for="adult">Adults</label>
			<input type="text" id="adult" name="adult" placeholder="Adults..">

			<label for="children">Children</label>
			<input type="text" id="children" name="children" placeholder="Children..">

			<label for="hotel">Hotel Name</label>
			<select id="hotel" name="hotel_id"></select>

			<label for="room_number">Room Number</label>
			<select id="room_number" name="room_id"></select>

			<label for="from_date">From Date</label>
			<input type="date" id="from_date" name="from_date" placeholder="From Date..">

			<label for="to_date">To Date</label>
			<input type="date" id="to_date" name="to_date" placeholder="To Date..">

			<input type="submit" id="submitBtn" value="Submit">
		<!-- </form> -->
	</div>
<div class="line"></div>


<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;


</script>