<?php //include 'phpajax/checklogin.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/bootstrap.js"></script>
<script type="text/JavaScript" src="forms.js"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>


<style>


#back{width:100%; height: 380px;margin-left:100px; margin-top:200px;}
#tags{margin-left:1200px;}
#loginsignup{margin-left:10px;margin-top:-30px;}
#footer{
	background-color:red;height:50px;-webkit-border-radius : 5px;
	-moz-border-radius : 5px;
	border-radius : 5px;
	-o-border-radius : 5px;
}
#foot1{
width:100px;text-align:center;margin-left:100px;margin-top:10px;}
#foot1:hover{
width:100px;text-align:center;margin-left:100px;margin-top:10px;color:yellow;}
#foot2{
	margin-top:-45px;margin-left:220px;width:100px;}
#foot2:hover{
	margin-top:-45px;margin-left:220px;width:100px;color:yellow;}
	</style>
	</head>

	<body style="background-color:#202020"> 

	<div class="container">

	<!-- Static navbar -->
	<div class="navbar navbar-default" role="navigation" style=" background-color:#9AA0EB" cellpadding="100">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="#">Project BookWorm</a>
	</div>
<?php include 'phpajax/checklogin.php';
echo "	<div class='navbar-collapse collapse'>
	<ul class='nav navbar-nav navbar-right'>

	<a href='#myModal'  class='btn btn-primary' data-toggle='modal'>Browse</a>";

//$toggle = 1 means logged in, 0 means logged out
if(!$toggle)
echo "
<script>

function beforeCall(form, options){
        
        //alert('ajax search initiated');
        
        return true;
		}
    function ajaxValidationCallback(status, form, json, options){
        if (window.console)
        console.log(status);
    
        if (status === true) {
			if(json[1]==true){
			form.attr('action','phpajax/process_login.php');
			form.validationEngine('detach');
			form.submit();}
			else{
			$('#email_login').validationEngine('showPrompt',json[2],'load');
			}
            //// uncomment these lines to submit the form to form.action
            //alert('1');
			//form.validationEngine('detach');
			//form.submit();
            //// or you may use AJAX again to submit the data
        }
    }

    
    $(document).ready(function(){
		// binds form submission and fields to the validation engine
		
        $('#registration_form').validationEngine({
            promptPosition : 'centerRight',
            ajaxFormValidation: true,
            ajaxFormValidationMethod: 'post',
            onBeforeAjaxFormValidation: beforeCall,
            onAjaxFormComplete: ajaxValidationCallback
        });
        
        $('#login_form').validationEngine({
            promptPosition : 'centerRight',
            ajaxFormValidation: true,
            ajaxFormValidationMethod: 'post',
            onAjaxFormComplete: ajaxValidationCallback
        });
    });

</script>

	<a href='#myModal'  class='btn btn-warning' data-toggle='modal'>Login</a>
	<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
	<div class='modal-content'>
	<div class='modal-header'>
	<h4 class='modal-title' id='myModalLabel'>Login details</h4>
	</div>
	<div class='modal-body'>



	<!-- LOGIN FORM-->
	<form action='phpajax/ajaxValidateUserLogin.php' name='login_form' id='login_form' method='post'>

	<table class='table'>
	<tr>
	<td>
	<label>EmailID</label>
	</td>
	<td>
	<input class='validate[required,custom[email]]' type='email' style='width:200px' id='email_login' name='email_login' placeholder=' Enter your email address' class='span3'/>
	</td>
	</tr>
	<tr>
	<td>
	<label>Password</label>
	</td>
	<td>
	<input class='validate[required,custom[password]]' type='password' name='password_login' id='password_login' placeholder='Keep it secure!' class='span3'/>
	</td>				
	</tr>
	</table>
	<button type='submit' value='login' onclick= 'return true' class='btn btn-success'>Login</button>
	<button type='reset' class='btn'>Clear</button>
	</form>	
	</div>
	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



	<a href='#myModal1'  class='btn btn-success' data-toggle='modal'>Signup</a>
	<div class='modal fade' id='myModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
	<div class='modal-content'>
	<div class='modal-header'>
	<h4 class='modal-title' id='myModalLabel'>Registration</h4>
	</div>
	<div class='modal-body'>
	<div id='warning'></div>
	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	</div>
	</div>
	"
?>




	</body>
	</html>

