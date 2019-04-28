<!-- <div class="sidebar" id="mySidebar">
  <a href="#" class="">Location</a>
  <a href="#" class="">Hotel</a>
  <a href="#" class="">User</a>
  <a href="#" class="">Room</a>
  <a href="#" class="">Customer</a>
  <a href="#" class="">Home / Booking</a>
</div> -->

    <!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
		<h3> <img  src= "<?php echo base_url(); ?>assets/img/logo_english.png" class="brand-icon" style="height: 100px;"></h3>
    </div>

    <ul class="list-unstyled components">
        <a href="<?php echo site_url('book') ?>"><p>Book Hotel</p></a>
        <li class="active">
            <a href="<?php echo site_url('admin/home') ?>" aria-expanded="false" class="dropdown-toggle">View Bookings</a>
        </li>
        <li class="active">
            <a href="#locationSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Locations</a>
            <ul class="collapse list-unstyled" id="locationSubmenu">
                <li>
                    <a href="<?php echo site_url('admin/location/add') ?>">Add Location</a>
                    <a href="<?php echo site_url('location') ?>">View Locations</a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="#hotelSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hotels</a>
            <ul class="collapse list-unstyled" id="hotelSubmenu">
                <li>
                    <a href="<?php echo site_url('admin/hotel/add') ?>">Add Hotel</a>
                    <a href="<?php echo site_url('hotel') ?>">View Hotels</a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
            <ul class="collapse list-unstyled" id="userSubmenu">
                <li>
                    <a href="<?php echo site_url('admin/user/add') ?>">Add User</a>
                    <a href="<?php echo site_url('user') ?>">View Users</a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="#roomSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Room</a>
            <ul class="collapse list-unstyled" id="roomSubmenu">
                <li>
                    <a href="<?php echo site_url('admin/room/add') ?>">Add Room</a>
                    <a href="<?php echo site_url('room') ?>">View Rooms</a>
                </li>
            </ul>
        </li>
<!--         <li class="active">
            <a href="#customerSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customer</a>
            <ul class="collapse list-unstyled" id="customerSubmenu">
                <li>
                    <a href="#">Add Customer</a>
                    <a href="customers">View Customers</a>
                </li>
            </ul>
        </li> -->

        <!--<li>
            <a href="#">Contact</a>
        </li> -->
    </ul>


</nav>
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Menu</span>
            </button>
            <h3 class="headline">Sudamapuri Dharamshala</h3>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </nav>


