<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css"/>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="jquery.js"></script>
<script src="jquery.validation.js"></script>
<style>
#results_panel{ position:absolute;
margin-left:350px; height:100%;width:720px;-webkit-border-radius : 5px;
	-moz-border-radius : 5px;
	border-radius : 5px;
	-o-border-radius : 5px;
}
.result{position:relative;
height:120px;width:760px;background-color:white;-webkit-border-radius : 5px;
	-moz-border-radius : 5px;
	border-radius : 5px;
	-o-border-radius : 5px;

}
#accordion{  width:230px;}
#status{
background-color:#C0C0C0;
-webkit-border-radius : 5px;
	-moz-border-radius : 5px;
	border-radius : 5px;
	-o-border-radius : 5px;
height:500px;
width:350px;
margin-left:790px;
position:absolute;	
}
#img{
margin-top:10px;margin-left:20px;height:90px;width:90px;
}
.tags{
    position:absolute;margin-top:-80px;margin-left:630px;
}
</style>
</head>
    <body style="background-color:#202020"> 
        <div class="container">
            
            <div class="container">

    <!-- Static navbar -->
    <div class="navbar navbar-default" role="navigation" style=" background-color:black" cellpadding="100">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project BookWorm</a>
        </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><input type="text" placeholder="Quick Search" style="margin-left:300px;margin-top:10px;width:500px;height:40px;"><button class="btn btn-danger" style="height:40px;"><span class="glyphicon glyphicon-search"></span></button> </input></li></li>
                    </ul>        
		<?php include '/phpajax/checklogin.php';
		//$toggle = 1 means logged in, 0 means logged out
                if(!$toggle) : //logged out?>
        <link rel='stylesheet' href='/Rustypages/css/validationEngine.jquery.css' type='text/css'/>
        <link href='/Rustypages/css/progression.css' rel='stylesheet' type='text/css'>
            <script type='text/javascript' src='js/progression.js'></script>
            <script src='/Rustypages/js/jquery.validationEngine-en.js' type='text/javascript' charset='utf-8'></script>
            <script src='/Rustypages/js/jquery.validationEngine.js' type='text/javascript' charset='utf-8'></script>

		<script>
$(document).ready(function(){
		// binds form submission and fields to the validation engine
		$('#registration_form').validationEngine({
                    promptPosition : 'centerRight',
                    ajaxFormValidation: true,
                    ajaxFormValidationMethod: 'post',
                    onAjaxFormComplete: function (status,form,json,options){
                        if (status == true){
                            if(json[1][1]==true && json[2][1]==true){
                                form.attr('action','/Rustypages/phpajax/register.php');
                                form.submit();
                            }
                            else if(json[1][1]==false){		//rollno is not available
                                $('#roll_no').validationEngine('showPrompt',json[1][2]);
                                if(json[2][1]==false){		//email is not available
                                    $('#email_register').validationEngine('showPrompt',json[2][2]);}
                            }
                            else{
                                $('#email_register').validationEngine('showPrompt',json[2][2]);}
                        }
                    }
                    });        
                    $('#login_form').validationEngine({
                        promptPosition : 'centerRight',
                        ajaxFormValidation: true,
                        ajaxFormValidationMethod: 'post',
                        onAjaxFormComplete: function (status,form,json,options){
                            if (status == true) {
                                if(json[1]==true){
                                    form.attr('action','/Rustypages/phpajax/process_login.php');
                                    form.validationEngine('detach');
                                    form.submit();}
                                else{$('#email_login').validationEngine('showPrompt',json[2]);}
                            }
                        }
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
                            <form action='/Rustypages/phpajax/ajaxValidateUserLogin.php' name='login_form' id='login_form' method='post'>
                                <table class='table'>
                                    <tr>
                                        <td><label>EmailID</label></td>
                                        <td><input data-progression class='validate[required,custom[email]]' type='email' style='width:200px' id='email_login' name='email_login' data-helper=' Enter your email address' class='span3'/></td>
                                    </tr>
                                    <tr>
                                        <td><label>Password</label></td>
                                        <td><input class='validate[required,custom[password]]' type='password' name='password_login' id='password_login' placeholder='Keep it secure!' class='span3'/></td>				
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
                                
                                <!--REGISTER FORM-->
                                <form action='/Rustypages/phpajax/ajaxValidateUser.php' method='post' name='registration_form' id='registration_form'>
                                    <fieldset>
                                        <label for='username'>Username*</label>
                                        <input class='validate[required,ajax[ajaxUserNameCall]' type='text' name='username' id='username' placeholder='Choose a username' class='span3' class='cname'/>		
                                        <br><label for='name'>Name*</label>
                                            <input type='text' class='validate[required]' name='name' id='name' placeholder='Your name' class='span3'/>
                                            <br><label for='roll_no'>Roll number*</label>
                                                <input type='text' class='validate[required,custom[rollNo]]' name='roll_no' id='roll_no' placeholder='Roll number' class='span3'/>
                                                <br><label for='hostel'>Hostel*</label>
                                                    <select id='hostel' name='hostel'>
                                                        <option value='alak'>Alakananda</option>
                                                        <option value='jam'>Jamuna</option>
                                                        <option value='ganga'>Ganga</option>
                                                        <option value='brahms'>Brahmaputra</option>
                                                        <option value='sarayu'>Sarayu</option>
                                                        <option value='sharav'>Sharavati</option>
                                                        <option value='tambi'>Tamiraparani</option>
                                                        <option value='sindhu'>Sindhu</option>
                                                        <option value='krishna'>Krishna</option>
                                                        <option value='cauvery'>Cauvery</option>
                                                        <option value='narmad'>Narmada</option>
                                                        <option value='tapti'>Tapti</option>
                                                        <option value='saras'>Saraswati</option>
                                                        <option value='godav'>Godavari</option>
                                                        <option value='pampa'>Pampa</option>
                                                        <option value='mahanadi'>Mahanadi</option>
                                                        <option value='mandak'>Mandakini</option>
                                                    </select>
                                                    
                                                    <br><label for='email'>Email-ID*</label>
                                                        <input class='validate[required,custom[email]]' type='email' id='email_register'  name='email_register' style='width:200px' placeholder=' Enter your email address'/><br>
                                                            <br><label for='password'>Password*</label>
                                                                <input class='validate[required,custom[password]]' type='password' id='password' name='password' placeholder='Password' class='span3' data-prompt-position='centerRight'/><br>
                                                                    <br><label for='confirmpwd'>Confirm Password*</label>
                                                                        <input class='validate[equals[password]]' type='password' id='confirmpwd' name='confirmpwd' placeholder='Retype Password' class='span3'/><br>
                                                                            </fieldset>
                                    <br><button type='submit' value='Register'  class='btn btn-success'>Submit</button>
                                        <button type='reset' class='btn'>Clear</button>
                                </form>
                            </div>
                            <div id='warning'></div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
		<?php else : //logged in ?>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://cf.badassdigest.com/_uploads/images/32183/calvin-and-hobbes-header__stamp.jpg"></a>  
                            <ul class="dropdown-menu">	
                                <li><a href="/Rustypages/phpajax/logout.php">Sign Out</a></li>
                                <li><a href="#"><label>Welcome <?php echo $_SESSION['uname'];?>!</label></a></li>
                                <li><a href="#">Settings</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
		<?php endif; ?>
        </div>
</div>



<!-- Sample of a search result-->
<div id="results_panel">

		<div class="result">
			
			<img src="http://covers.booktopia.com.au/big/9780470547557/fox-and-mcdonald-s-introduction-to-fluid-mechanics.jpg" alt="book1" id="img"class="img-thumbnail">
			<p style="margin-top:-80px;margin-left:120px;"><font size="3"><b><font color="green">Name:</font>Introduction to Fluid Mechanics</b><br><b><font color="green">Author:</font>Robert W.Fox, Alan T.McDonald and Philip J.Pritchard</b><br><b><font color="green">Course:</font>AM2530 Foundations of Fluid Mechanics<a href="#"><span class="badge">Preview</span></a></b></font><br></p>
			<div class="tags"><button class="btn btn-success">Available</button><br><br><button class="btn btn-danger">Unavailable</button></div>
		</div>
	<br>
		<div class="result">
			
			<img src="http://www-fp.pearsonhighered.com/assets/hip/images/bigcovers/0131481908.jpg" alt="book1" id="img"class="img-thumbnail">
			<p style="margin-top:-80px;margin-left:120px;"><font size="3"><b><font color="green">Name:</font>Machine Design(5th Edition)</b><br><b><font color="green">Author:</font>Robert L.Norton</b><br><b><font color="green">Course:</font>ME3350 Design of Machine Elements</b></font></p>
			<div class="tags"><button class="btn btn-success">Available</button><br><br><button class="btn btn-danger">Unavailable</button></div>

		</div>
	<br>
		<div class="result">
			
			<img src="http://www.gobookshopping.com/uploads/books/web/content/UBS/uploads/books/9781259006197.jpg" alt="book1" id="img" class="img-thumbnail">
			<p style="margin-top:-80px;margin-left:120px;"><font size="3"><b><font color="green">Name:</font>Internal Combustion Engines</b><br><b><font color="green">Author:</font>V. Ganesan</b><br><b><font color="green">Course:</font>ME3330: IC Engines</b></font></p>
			<div class="tags"><button class="btn btn-success">Available</button><br><br><button class="btn btn-danger">Unavailable</button></div>

		</div>


</div>

<!--<div class="container" id="status">
<br><img src='http://covers.booktopia.com.au/big/9780470547557/fox-and-mcdonald-s-introduction-to-fluid-mechanics.jpg' alt='book1' style='height:200px;width:200px'class='img-rounded'><br><br><p><font size="4"><b><font color='green'>Name:</font>Introduction to Fluid Mechanics</b><br><br><b><font color='green'>Author:</font>Robert W.Fox, Alan T.McDonald and Philip J.Pritchard</b><br><br><b><font color='green'>Course:</font>AM2530 Foundations of Fluid Mechanics</b></font></p><button type='submit' style='margin-left:220px' class="btn btn-danger"> More<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></button><br>
</div>-->


<div class="panel-group" id="accordion">
  <div class="panel panel-default" style="width:330px" >
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <b>Academic</b>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
	<table class="table">
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-plane"></span> All types</a></td></tr>
     	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-plane"></span> Aerospace Engg.</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-tint"></span> Biotechnology</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-fire"></span> Chemical Engg.</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-home"></span> Civil Engg.</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-fire"></span> Chemistry</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-hdd"></span> Computer Science & Engg.</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-off"></span> Electrical Engg.</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-info-sign"></span> Engineering Physics</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-picture"></span> Engineering Design</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-book"></span> Humanities</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-signal"></span> Mathematics</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-wrench"></span> Mechanical Engg.</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-cog"></span> Metallurgical & Material Sciences</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-briefcase"></span> Management Studies</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-flag"></span> Naval Architecture & Ocean Engg.</a></td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-leaf"></span> Physics</a></td></tr>
	
	</table>
	</div>	
    </div>
  </div>

  <div class="panel panel-default" style="width:330px">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
         <b>Non Academic</b>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
	<table class="table">
        <tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Fiction</a></td>  </tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Biography</a>  </tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Literature</a>   </td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Magazine/Journal</a>  </td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Art</a>  </td> </tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Fashion</a> </td> </tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Romance</a>   </td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Crime/Thriller</a> </td> </tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Comics</a>  </td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Sci-Fi</a>   </td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Sports</a>   </td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Non-fiction</a>   </td></tr>
	<tr><td><input type="checkbox"> <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Classics</a>  </td></tr>
	</table>
      </div>
    </div>
  </div>

</div>



</body>
</html>

