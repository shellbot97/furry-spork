<!DOCTYPE html> 
<html lang="en-US">
  <head>
    <title>Hotels</title>
    <link rel="icon" href= "<?php echo base_url(); ?>assets/img/logo_english.png"  type="image/x-icon" sizes="16 * 16">
 
    <meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/global.css" rel="stylesheet" type="text/css">
  	<style type="text/css">
  		.text-muted {
    		color: #FCAE1B !important;
		}

	</style>
  </head>
  <body>
	<div class="login-page">
		<div class="form">
		<!--login-->	
		<div class="">
			<img  height="100" src= "<?php echo base_url(); ?>assets/img/logo_english.png" class="brand-icon-mventry">
		</div>
		
			<input  type="text"  name="username" class="form-control" placeholder="User ID" required autofocus/>
			<input type="password" name="password" class="form-control" placeholder="Password" required/>
			<div class="d-flex" style="">
				<input  class="remember-input" name="remember_me" value="1" id="example-select-all" type="checkbox" />
				<span>Remember me </span>
			</div>	

			<button type="submit" class="btn-bg-green" value="Login" >login</button>
			
		 	
		</div>
	</div>


<style type="text/css">
.login {
	font-family: Verdana, Geneva, sans-serif;
    font-weight: 400;
    margin-bottom: 15px;
    font-family: Verdana, Geneva, sans-serif;
}

.remember {
    color: #fff;
    font-size: 12px;
    font-family: Verdana, Geneva, sans-serif;
}
.remember-input{
	width: 20px !important;
	margin-top: 3px !important;
}

.brand-icon-mventry {
    display: inline-block;
    /* padding: 0px 0px !important; */
    /* font-size: 12px; */
    /* font-weight: 1000; */
    /* line-height: 50px; */
    /* text-align: center; */
    height: 152px;
    width: 241px;
}

</style>