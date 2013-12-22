<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css"/>
<link href="css/icheck/line/blue.css" rel="stylesheet"/>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/icheck.js"></script>
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
<script>
$(document).ready(function(){
  $('input').each(function(){
    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-blue',
      radioClass: 'iradio_line-blue',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });
});
</script>
</head>
    <body style="background-color:#202020" onload=mySearch(); > 
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
                <form name="search" method="get" action="">
                <li><input id="search" name="query" type="text" placeholder="Quick Search" style="margin-left:100px;margin-top:10px;width:500px;height:40px;"/></li>
                <li><button  class="btn btn-danger" style="height:40px;"><span class="glyphicon glyphicon-search"></span></button> </input></li>
                </form>
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
<?php 
?>

</div>

<!--<div class="container" id="status">
<br><img src='http://covers.booktopia.com.au/big/9780470547557/fox-and-mcdonald-s-introduction-to-fluid-mechanics.jpg' alt='book1' style='height:200px;width:200px'class='img-rounded'><br><br><p><font size="4"><b><font color='green'>Name:</font>Introduction to Fluid Mechanics</b><br><br><b><font color='green'>Author:</font>Robert W.Fox, Alan T.McDonald and Philip J.Pritchard</b><br><br><b><font color='green'>Course:</font>AM2530 Foundations of Fluid Mechanics</b></font></p><button type='submit' style='margin-left:220px' class="btn btn-danger"> More<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></button><br>
</div>-->


<div class="panel-group" id="accordion" style="width:200px;margin-left: 0px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title" style="height:10px">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Academic</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
             <ul id="tech" class="list">
                    <li><input type="checkbox" id = "ae" name="subject" value="ae" checked/><label>AE</label></li>
                    <li><input type="checkbox" id = "bt" name="subject" value="bt" checked/><label>BT</label></li>
                    <li><input type="checkbox" id = "ed" name="subject" value="ed" checked/><label>ED</label></li>
                    <li><input type="checkbox" id = "cs" name="subject" value="cs" checked/><label>CS</label></li>
                    <li><input type="checkbox" id = "ma" name="subject" value="ma" checked/><label>MA</label></li>
                    <li><input type="checkbox" id = "ep" name="subject" value="ep" checked/><label>EP</label></li>
                    <li><input type="checkbox" id = "ms" name="subject" value="ms" checked/><label>MS</label></li>
                    <li><input type="checkbox" id = "hs" name="subject" value="hs" checked/><label>HS</label></li>
                    <li><input type="checkbox" id = "ee" name="subject" value="ee" checked/><label>EE</label></li>
                    <li><input type="checkbox" id = "ch" name="subject" value="ch" checked/><label>CH</label></li>
                    <li><input type="checkbox" id = "na" name="subject" value="na" checked/><label>NA</label></li>
                    <li><input type="checkbox" id = "ce" name="subject" value="ce" checked/><label>CE</label></li>
                    <li><input type="checkbox" id = "me" name="subject" value="me" checked/><label>ME</label></li>
                    <li><input type="checkbox" id = "mm" name="subject" value="mm" checked/><label>MM</label></li>
             </ul>   
            </div>	
        </div>
    </div>
    
    <div class="panel panel-default" style="width:200px">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Non Academic</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<span class="badge" style="background-color:#234723"><span class="glyphicon glyphicon-folder-open"></span> Fiction</span>
										<span class="badge" style="background-color:#234723"><span class="glyphicon glyphicon-folder-open"></span> Biography</span><br><br>
										<span class="badge" style="background-color:#234723"><span class="glyphicon glyphicon-folder-open"></span> Lit</span>
										<span class="badge" style="background-color:#234723"><span class="glyphicon glyphicon-folder-open"></span> Magazine</span><br><br>
										<span class="badge" style="background-color:#234723"><span class="glyphicon glyphicon-folder-open"></span> Art</span>
										<span class="badge" style="background-color:#234723"><span class="glyphicon glyphicon-folder-open"></span> Fashion</span>
									</div>
								</div>
							</div>

						</div>

<script type="text/javascript">
    
function mySearch(){
//update query with tags
$('input').iCheck('update');
var tags = new Array();     //$(this).val() stores the value
$('input:checkbox[name=subject]:checked').each(function(){
    tags.push(this.value);
});
var q = '<?php if(isset($_GET['query'])){echo $_GET['query'];}else {echo '';}?>';
//console.log(q);
//update query with search term       
//var q = "gaskell";
if(q.length>2)
    $.ajax({
		url: "phpajax/search.php",
        type: "GET",
        dataType: 'json',
        data: { call: 1, query: q, tags: tags }
    })
        .success(function(data,status) {
            tags = data['tags'];        //latest tags updated from the database
    
        //updating checkboxes on the page with tags from database
        console.log(tags);        
        $('input:checkbox[name=subject]').attr('checked',false);
        $('input:checkbox[name=subject]').iCheck('update');
        $.each(data['tags'], function(i,value){
            $('#'+value).iCheck('check');
        });
        
        //writing search results to html
        $("#results_panel").empty(); var htmlData = '';
        $.each(data['vals'], function(i,value){
			$("#results_panel").append('<div class="result">');
			htmlData += '<div class="result">';
			htmlData += '<img src="/Rustypages/images/flumech.jpg" alt="book1" id="img"class="img-thumbnail"/>';
			htmlData += '<p style="margin-top:-80px;margin-left:120px;"><font size="3">';
			htmlData += '<b><font color="green">Name:</font>' + data["vals"][i].b_name + '</b><br/>';
			htmlData += '<b><font color="green">Author:</font>'+data["vals"][i].b_author+'</b><br/>';
			htmlData += '<b><font color="green">Course:</font>'+data["vals"][i].b_course+' '+data["vals"][i].b_course_title+'<a href="#"><span class="badge">Preview</span></a></b></font><br></p>';
			htmlData += '<div class="tags"><button class="btn btn-success">Available</button><br/><button class="btn btn-danger">Unavailable</button></div>';
			htmlData += '</div><br/>';
			console.log(data["vals"][i].b_name);
			});
$('#results_panel').html(htmlData);			
    });
    }

//ajax call on unchecking

//ajax call on checking
$("input:checkbox[name=subject]").on(
    'ifClicked', function(){
        $('#'+this.id).iCheck('toggle');
    console.log("clicked");
    mySearch();}
);  


</script>

</body>
</html>

