<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="icon" href= "<?php echo base_url(); ?>assets/img/logo_english.png"  type="image/x-icon" sizes="16 * 16">
  <style type="text/css">
      @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
          width: 360px;
          padding: 8% 0 0;
          margin: auto;
        }
        .form {
          position: relative;
          z-index: 1;
          background: #FFFFFF;
          max-width: 360px;
          margin: 0 auto 100px;
          padding: 45px;
          text-align: center;
          box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
          font-family: "Roboto", sans-serif;
          outline: 0;
          background: #f2f2f2;
          width: 100%;
          border: 0;
          margin: 0 0 15px;
          padding: 15px;
          box-sizing: border-box;
          font-size: 14px;
        }
        .form button {
          font-family: "Roboto", sans-serif;
          text-transform: uppercase;
          outline: 0;
          background: #f6a84b;
          width: 100%;
          border: 0;
          padding: 15px;
          color: #FFFFFF;
          font-size: 14px;
          -webkit-transition: all 0.3 ease;
          transition: all 0.3 ease;
          cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
          background: #e54432;
        }
        .form .message {
          margin: 15px 0 0;
          color: #e54331;
          font-size: 12px;
        }
        .form .message a {
          color: #4CAF50;
          text-decoration: none;
        }
        .form .register-form {
          display: none;
        }
        .container {
          position: relative;
          z-index: 1;
          max-width: 300px;
          margin: 0 auto;
        }
        .container:before, .container:after {
          content: "";
          display: block;
          clear: both;
        }
        .container .info {
          margin: 50px auto;
          text-align: center;
        }
        .container .info h1 {
          margin: 0 0 15px;
          padding: 0;
          font-size: 36px;
          font-weight: 300;
          color: #1a1a1a;
        }
        .container .info span {
          color: #4d4d4d;
          font-size: 12px;
        }
        .container .info span a {
          color: #000000;
          text-decoration: none;
        }
        .container .info span .fa {
          color: #EF3B3A;
        }
        body {
          background: #fcd844; /* fallback for old browsers */
          background: -webkit-linear-gradient(right, #fcd844, #f7b051);
          background: -moz-linear-gradient(right, #fcd844, #f7b051);
          background: -o-linear-gradient(right, #fcd844, #f7b051);
          background: linear-gradient(to left, #fcd844, #f7b051);
          font-family: "Roboto", sans-serif;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;      
        }
        .brand-icon-mventry {
            display: inline-block;
            padding: 10px 20px !important;
            font-size: 20px;
            font-weight: 700;
            line-height: 50px;
            text-align: center;
        }
  </style>
</head>
<body>
    <div class="login-page">
        
      <div class="form">
        <div class="">
            <img  height="100" src= "<?php echo base_url(); ?>assets/img/logo_english.png" class="brand-icon" style="
    height: 131px;>
        </div>
        <form class="login-form">
          <input type="text" placeholder="username" id="username" />
          <input type="password" placeholder="password" id="password" />
          <button id="submit">login</button>
          <p class="message" id="error_message" style="display: none;">Invalid Credentials</p>
        </form>
      </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;
    $('#submit').click(function(){
        $.ajax({
            type: 'POST',
            url: baseUrl + "api/login", 
            data: { 
                    'username': $('#username').val(), 
                    'password': $('#password').val() 
            },
            //headers: {"Authorization": localStorage.getItem("session_id")},
            success: function(result){
                var obj = jQuery.parseJSON( result );
                console.log(obj.Message);
                if(obj.Code){
                    if (obj.Code == 200) { 
                        localStorage.setItem("token", obj.Message);
                        window.location.replace(baseUrl+"admin/home");
                    }else{
                        $('#error_message').show();
                    }
                }

            }
        });
    });

</script>

</script>
</html>