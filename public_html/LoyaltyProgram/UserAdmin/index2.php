<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bizs Customer Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <!-- alertify CSS -->
    <link rel="stylesheet" href="../../alertify.js-0.3.10/themes/alertify.core.css" />
    <link rel="stylesheet" href="../../alertify.js-0.3.10/themes/alertify.default.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- alertify Javascript -->
    <script type="text/javascript" src="../../alertify.js-0.3.10/lib/alertify.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

   <!--  responsive-full-background-image.css stylesheet contains the code you  want  -->
    <link rel="stylesheet" href="responsive-full-background-image.css"> 

    <style>
        .navbar { 
            /*background-color: #00554C;
            color: #2FAEA0;
            border-color: #00554C;*/
            background-color: #369836;
            color: #2FAEA0;
        }
        .navbar-default .navbar-brand {
            /*color: #ffffff;*/
            color: #ffffff;
        }
        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            /*color: #2FAEA0;*/
            color: #BAE8BA;
        }
        .navbar-default .navbar-top-links .dropdown .dropdown-toggle {
            /*color: #ffffff;*/
            color: #ffffff;
        }
        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus,
        .navbar-default .navbar-top-links .dropdown .dropdown-toggle:hover,
        .navbar-default .navbar-top-links .dropdown .dropdown-toggle:focus,
        .navbar-default .navbar-top-links .dropdown.open .dropdown-toggle{
            /*background-color: #08AA99;*/
            background-color: #1B7C1B;
        }
        .navbar-default .navbar-top-links .dropdown .dropdown-toggle .fa:hover,
        .navbar-default .navbar-top-links .dropdown .dropdown-toggle .fa:focus,
        .navbar-default .navbar-top-links .dropdown.open .dropdown-toggle .fa{
            /*color: #ffffff;*/
            color: #BAE8BA;
        }
        .navbar-default .sidebar li a{
            /*color: #ffffff;*/
            color: #ffffff;
        }
        .navbar-default .sidebar li a:hover,
        .navbar-default .sidebar li a:focus ,
        .navbar-default .sidebar li a .active:hover,
        .navbar-default .sidebar li a .active:focus{
            /*background-color: #00554C;
            color: #2FAEA0;*/
            background-color: #369836;
            color: #BAE8BA;
        }
        .sidebar-nav,
        .navbar-default .sidebar li a .active,
        #wrapper,
        .navbar-default .sidebar li .active{
            /*background-color: #007064;
            border-color: #00554C;*/
            background-color: #5cb85c;
            border-color: #ffffff;
        }
        img {
            margin: auto;
        }
        html, body
        {
            background-color: #ffffff;
            height: 100%;
            width: 100%;
        }
        

        body {
            position: relative;
        }

        div.absolute {
            position: absolute;
            top: 50%;
            right: 10%;
        }


        #main_content {
            height: 50vh;
            /* Location of the image */
            background-image: url(tab.png);

            /* Image is centered vertically and horizontally at all times */
            background-position: center top;

            /* Image doesn't repeat */
            background-repeat: no-repeat;

            /* Makes the image fixed in the viewport so that it doesn't move when 
            the content height is greater than the image height */
            background-attachment: fixed;
            /* This is what makes the background image rescale based on its container's size */
            background-size: 100% 50vh;
        }

        .modal {
        text-align: center;
        overflow-y:auto;
        }

        @media screen and (min-width: 768px) { 
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>    

<script type="text/javascript">
    function init_login_page() {
        $("#message").attr("hidden", true);
        $("#main_passcode").val("");
    }
    function init_page_wrapper() {
        $("#page-wrapper").empty();
        $("#page-wrapper").load("dashboard.php");
    }
    /*function login() {
        $.post("../../SAMA/partner_login.php", {
            passcode: $("#passcode").val(),
        },function(data) {
            mm = data.split("*");
            if(mm[0] == "Success") {
                $("#status").val(mm[0]);
                $("#partner_id").val(mm[1]);
            }
            //alert("status: " + mm[0] + " partner_id: " + $("#partner_id").val());
            if($("#status").val()=="Success") {
                $("#wrapper").show();
            }
        })
    }*/
    function logout() {
        $("#status").val("logout");
        $("#partner_id").val("");
        $("#login_page").fadeIn("slow", "linear");
        $("#wrapper").hide();
    }
    
    function admin_role(partner_id) {
        //Hides
        $(".navbar-default .sidebar #side-menu").hide();
        $("#user_profile").hide();
        //Shows
        $(".navbar-default .sidebar #side-menu2").show();
    
        //init pages
        $("#page-wrapper").empty();
        
        $("#page-wrapper").load("admin_registration_form.php");
        $("#status").val(response[0].status);
        $("#partner_id").val(partner_id);
        
      //  alert("Here");
    }
    
    function partner_role(partner_id) {
        //Hides
       $(".navbar-default .sidebar #side-menu").hide();
        $("#user_profile").hide();
        //Shows
        $(".navbar-default .sidebar #side-menu2").show();

        $("#status").val(response[0].status);
        $("#partner_id").val(partner_id);
        $("#admin_sales_exec").hide();
      //  init_page_wrapper();
    }
    
    function merchant_role(partner_id) {
        //Hides
     //  $(".navbar-default .sidebar #side-menu").hide();
     //   $("#user_profile").hide();
        //Shows
     //   $(".navbar-default .sidebar #side-menu2").show();

    //    $("#status").val(response[0].status);
        $("#partner_id").val(partner_id);
    //    $("#admin_sales_exec").hide();
      //  init_page_wrapper();
    }
    
    $(document).ready(function(){
      //  $("#partner_id").val("admin");
       // $("#passcode").val("99999");
        document.getElementById('login_page').style.display='block';
        $("#main_login").click(function() {
            
          //  alert($("#partner_id").val());
          //  alert($("#passcode").val());
         //   $("#message").fadeOut("slow","linear");
            $.post("login.php", {
                option : '1',
                usrname: $("#partner_id").val(),
                psw: $("#passcode").val(),
            },function(data) {
              //  alert(data);
              //  response = jQuery.parseJSON(data);
                  response = data.split("*");
                if(response[0] > 0) {
                    localStorage.setItem("ownerid" , response[1]);
                    $("#partner_id").val("");
                    $("#passcode").val("");
                    
                    localStorage.setItem("user_id" , $("#partner_id").val());
                    
                //    if(response[0].role == "10002") {
                //        partner_role(response[0].partner_id);
	            //    }
	                
	            //    if(response[0].role == "10003") {
                        merchant_role(response[1]);
	            //    }
	                
	              //  $("#login_page").hide();
	                document.getElementById('login_page').style.display='none'; 
	                $("#wrapper").fadeIn("slow", "linear");
	                init_login_page();
	              //  alert("End");
                }
                else {
                    $("#message").empty();
                    $("#message").html("<p> Wrong Member ID or Password </p>");
                    $("#message").fadeIn("slow","linear");
                }
                //alert("status: " + mm[0] + " partner_id: " + $("#partner_id").val());
            })
        });
        $("#company_calendar").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("companyCalendar.php");
        });
        $("#user_profile").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("registrationForm.php");
        });
        $("#change_password").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("change_password_form.php");
        });
        $("#index").click(function() {
            init_page_wrapper();
        });
        $("#register_item_services").click(function() {
            
            $("#page-wrapper").empty();
            alert("Load Item Registeration Form");
            $("#page-wrapper").load("itemRegistrationForm.php");
        });
        $("#admin_registration_form").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("admin_registration_form.php");
        });
        $("#admin_account_management").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("admin_account_management.php");
        });
        $("#admin_load_partner").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("admin_load_partner_info.php");
        });
        $("#breakdown_setting").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("breakdownRegistrationForm.php");
        });
        $("#tyre_setting").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("tyreRegistrationForm.php");
        });
        $("#battery_setting").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("batteryRegistrationForm.php");
        });
        $("#services_item_setting").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("service_itemRegistrationForm.php");
        });
        $("#admin_manage_building").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("admin_manage_building.php");
        });
        
        $("#admin_sales_exec").click(function() {
            $("#page-wrapper").empty();
            $("#page-wrapper").load("admin_sales_exec.php");
        });
        
   //     $("#admin_item_approval").click(function() {
//            $("#page-wrapper").empty();
 //           $("#page-wrapper").load("admin_item_approval.php");
 //       });
        $.post("../../SAMA/load_user_company_name.php", {
            partner_id: document.getElementById("partner_id").value,
        }, function(data) {
            $("#company_name").html(data);
        });
    });
</script>
</head>
<body>
 
<!--
  <div class="row" id="login_page">
        <div class="row">
            <div class="col-lg-3 absolute" id="login_component" style="height: 50%; width:20%">
                <input class="form-control" id="partner_id" placeholder="Member ID" style="text-align: center" type="text">
                <input class="form-control" id="passcode" placeholder="Passcode" style="text-align: center" type="password">
                
                <div class="alert alert-danger" id="message" style="display: none"></div>
                <br>
                <img src="login_btn.png" class="img-responsive" id="main_login">
             
            </div>
        </div>
    </div> 
-->    
    
  <div id="login_page" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('login_page').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <div class="w3-container" >
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" id="partner_id" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Password" id="passcode" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" id="main_login" >Login</button>
          
        </div>
      </div>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button type="button" class="w3-button w3-red"><a href="../../html/index3.html" target="_self" >Cancel</a></button>
        
      </div>

    </div>
  </div>


    <div id="wrapper" style="min-height: 100%; min-width: 100% ;background-color:green;" hidden>
     
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:green;">
            
         
            <div class="navbar-header">
              <a class="navbar-brand" style="float:left; color:white " href="#">Bizs App Customer Setup Page</a>
            </div>
            
            <ul class="nav navbar-nav navbar-right">
               <li><a href="#" style="margin-right:5px;color:white ">Ver 1.4.2</a></li>
               <li><a href="../../html/index.html" style="margin-right:5px;color:white "><i class='fas fa-home' style='font-size:18px;color:red'></i></a></li>
            </ul>
         
              

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu2" style="height:900px;background-color:green ">
                        <li>
                            <a href="#" id= "admin_registration_form" style="background-color:green"><i class="fas fa-file"></i> Customer Registration</a>
                        </li>
                   
                        <li>
                            <a href="#" id= "admin_account_management" style="background-color:green"><i class="fas fa-clipboard"></i> Customer Admin</a>
                        </li>
                   
                    </ul>
                </div>
            </div>  
            
             

            

        </nav>
        
        
  <div id="page-wrapper" style="min-height: 100%"></div>
    </div>
    <div id="partner_id"></div>
    <div id="status"></div>

  <!--  <div class="modal fade" id="sign_up_modal">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <p>To Sign up for SAMA PARTNER account. Please contact our customer services hotline: 010-345 6789</p>
                </div>  
            </div>
        </div>
    </div>  -->

    <div class="modal fade" id="forget_password_modal">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <h3>
                        <strong>Can't sign in? Forget your password?</strong><br>
                    </h3>
                    <p>
                        Find Your Account<br>
                    </p>
                    <div class="form-group">                        
                        <label>Member ID: </label>
                        <input type="text" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div> 
    
    <div id="user_id"></div>
</body>
</html>