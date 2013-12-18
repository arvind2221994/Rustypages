<?php 
$b_name='name';
$b_author='author';
$b_publisher='publisher';
$b_description='description';
include 'phpajax/db_connect.php';
if(isset($_GET['id'])){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
	$stmt = $mysqli->prepare("SELECT b_id, b_name, b_author, b_description
        FROM book_data
       WHERE b_id = ?
        LIMIT 1");
        $stmt->bind_param('i', $id);  
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($b_id, $b_name, $b_author, $b_description);
        $stmt->fetch();
		var_dump($b_name);
		$b_publisher = 'TBD';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css"/>
<link type="text/css" rel="stylesheet" href="css/social-buttons-3.css"/>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<style>
#back{width:100%; height: 380px;margin-left:100px; margin-top:200px;}
#tags{margin-left:1200px;}
#loginsignup{margin-left:10px;margin-top:-30px;}

#accordion{  position:relative;width:230px;margin-top:-500px;}
#bookpanel{
font-family: "Times New Roman;",Times,serif;
position:relative;height:630px;width:920px;margin-top:50px;
margin-left:250px;-webkit-border-radius :0px;
	-moz-border-radius : 0px;
	border-radius : 0px;
	-o-border-radius : 0px;background-color:white;transition:height 2s;}
#footer{position:relative;background-attachment:fixed;margin-top:500px;
background-color:black;height:50px;-webkit-border-radius : 5px;
	-moz-border-radius : 5px;
	border-radius : 5px;
	-o-border-radius : 5px;
 }
#textbox{margin-top:-270px;margin-left:300px;}
#owner{background-visibility:hidden;}
#details{background-color:#B0B0B0; }
</style>

</head>

<body style="background-color:white"> 

<div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-fixed-top" role="navigation" style=" background-color:black" cellpadding="100">
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
          <li>
	    <input type="text" placeholder="Quick Search" style="margin-left:300px;margin-top:10px;width:500px;height:40px;"><button class="btn btn-danger" style="height:40px;"><span class="glyphicon glyphicon-search"></span></button> </input></li>
	    </ul>	  
	  </li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
	    <li class="dropdown">
	      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://cf.badassdigest.com/_uploads/images/32183/calvin-and-hobbes-header__stamp.jpg"></a>  
	      <ul class="dropdown-menu">	
		<li><a href=#">Sign Out</a></li>
		<li><a href="#">Profile</a></li>
		<li><a href="#">Settings</a></li>
	      </ul>
	    </li>
	  </ul>
 </div>
	  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 		 <div class="modal-dialog">
   		 <div class="modal-content">
     			 <div class="modal-header">
        			<h4 class="modal-title" id="myModalLabel">Login details</h4>
      			 </div>
      			<div class="modal-body">
       			<form>
				<label>EmailID</label>
				<input type="email"style="width:200px"  placeholder=" Enter your email address" class="span3"/><br>
				<label>Password</label>
				<input type="text" placeholder="Keep it secure!" class="span3"/><br>
				<button type="submit" class="btn btn-success">Login</button>
				<button type="reset" class="btn">Clear</button>
			</form>	
      			</div>
         	 </div><!-- /.modal-content -->
  		 </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
  		  <div class="modal-content">
  		    <div class="modal-header">
  		      <h4 class="modal-title" id="myModalLabel">Registration</h4>
  		    </div>
  		    <div class="modal-body">
        			<form>
			
				<label>Name</label>
				<input type="text" placeholder="Your name" class="span3"/><br>
				<br><label>Roll number</label>
				<input type="text" placeholder="Roll number" class="span3"/><br>
				<br><label>Hostel</label>
					<select>
  					<option value="Alakananda">Alakananda</option>
  					<option value="Jamuna">Jamuna</option>
  					<option value="Ganga">Ganga</option>
  					<option value="Brahmaputra">Brahmaputra</option>
  					<option value="Sarayu">Sarayu</option>
  					<option value="Sharavati">Sharavati</option>
  					<option value="Tamiraparni">Tamiraparni</option>
  					<option value="Sindhu">Sindhu</option>
  					<option value="Krishna">Krishna</option>
  					<option value="Kavery">Kaveri</option>
  					<option value="Narmada">Narmada</option>
  					<option value="Tapti">Tapti</option>
  					<option value="Saraswati">Saraswati</option>
  					<option value="Godavari">Godavari</option>
  					<option value="Pampa">Pampa</option>
  					<option value="Mahanadi">Mahanadi</option>
  					</select>
				
				<br><label>EmailID</label>
				<input type="email" style="width:200px" placeholder=" Enter your email address" class="span3"/><br>
				<br><label>Password</label>
				<input type="text" placeholder="Password" class="span3"/><br>
				<br><label>Confirm Password</label>
				<input type="text" placeholder="Retype Password" class="span3"/><br>
				<br><button type="submit" class="btn btn-success">Submit</button>
				<button type="reset" class="btn">Clear</button>
				</form>
		
  		    </div>
      	          </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
</div>
</div>
<div class="modal fade" id="creditmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 		 <div class="modal-dialog">
   		 <div class="modal-content">
     			 <div class="modal-header">
        			<h4 class="modal-title" id="myModalLabel">The Team!</h4>
      			 </div>
      			<div class="modal-body">
       			<h3>Abhishek Sharma</h3>
			<h3>Aniruddha Tamhane</h3>
			<h3>Pratik Kothari</h3>
			<h3>Arvind N</h3>
      			</div>
         	 </div><!-- /.modal-content -->
  		 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<div class="container" id="bookpanel">
	    <ul class="thumbnails" id="ulthumbs">
	      <li>
		<a class="thumbnail" style="width:270px;height:320px;margin-left:-15px;margin-top:100px;" ><img style="height:290px;width:270px;"src="http://covers.booktopia.com.au/big/9780470547557/fox-and-mcdonald-s-introduction-to-fluid-mechanics.jpg" id="image" alt="book1"class="img" style="border: thick;"></a>
	      </li>
	    </ul>
			<div id="textbox" style="margin-top: -340px">
				<table class="table table-bordered">
					<tr>
						<td><label><b><font size="4"color="green">NAME</font></b></label></td><td><font size="4"><?php echo $b_name;?></td>
					</tr>
					<tr>
						<td><label><b><font size="4"color="green">AUTHOR(S)</font></b></label></td><td><font size="4"><?php echo $b_author;?></td>
					</tr>
					<tr>
						<td><label><b><font size="4"color="green">PUBLISHER</font></b></label></td><td><font size="4"><?php echo $b_publisher;?></td>
					</tr>
					<tr>
						<td><label><b><font size="4"color="green">DESCRIPTION</font></b></label></td><td><font size="4"><?php echo $b_description;?></td>
					</tr>
					<tr>
						<td><label><b><font size="4"color="green">COURSE </font></b></label></td><td><font size="4">AM2530 Foundations of Fluid Mechanics<br>CH0007 Somerandomchemcourse</td>
					</tr>
					
					<tr>
						<td><label><b><font size="4"color="green">DEPARTMENT</font></b></label></td><td><font size="4">Mechanical Engineering</td>
					</tr>

				</table>
				<br><br>
				
			</div>
		<div><b>
		<div class="alert alert-danger"><div>This book is unavailable</div></div><!--button type="button" style="height:30px;width:100px;-webkit-border-radius:0px;-moz-border-radius: 0px;border-radius: 0px;" disabled="disabled"class="btn btn-success">Available</button>   <button type="button"  class="btn btn-default" style="height:30px;width:100px;-webkit-border-radius:0px;-moz-border-radius: 0px;border-radius: 0px;">Unavailable</button-->
				
			<table class="table table-bordered">
				<tr>
					<th>Owner's Name</th><th>Roll Number</th><th>Hostel</th><th>Room Number</th><th>Phone Number</th><th>Email ID</th><th></th>
				</tr>
				<tr>
					<td><a href="profile.html">Arvind Narayanan</a></td><td>ME11B124</td><td>Narmada</td><td>2005</td><td>+91-123456789</td><td>abc@example.com</td><td><a href="#" class="btn btn-primary">Request book<i class="glyphicon glyphicon-chevron-right"></i><i class="glyphicon glyphicon-chevron-right"></i><i class="glyphicon glyphicon-chevron-right"></i></a></td>
				</tr>
				<tr>
					<td>Aniruddha Tamhane</td><td>CH11B066</td><td>Narmada</td><td>2010</td><td>+91-123456789</td><td>abc2@example.com</td><td><a href="#" class="btn btn-primary">Request book<i class="glyphicon glyphicon-chevron-right"></i><i class="glyphicon glyphicon-chevron-right"></i><i class="glyphicon glyphicon-chevron-right"></i></a></td>
				</tr>
			</table></b>
		</div>
		<!--<b><a href="#">Go to Owner's profile<i class="glyphicon glyphicon-chevron-right"></i><i class="glyphicon glyphicon-chevron-right"></i><i class="glyphicon glyphicon-chevron-right"></i></a></b>-->
	</div>


<div class="panel-group" id="accordion" style="width:200px;margin-left: 0px;">
  <div class="panel panel-default" >
    <div class="panel-heading">
      <h4 class="panel-title" style="height:10px">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Academic
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">

     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-plane"></span> AE</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-tint"></span> BT/BS</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-wrench"></span> ME</span><br><br></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-flag"></span> NA/OE/OS</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-hdd"></span> CS</span><br><br></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-home"></span> CE</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-leaf"></span> Env</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-fire"></span> CH</span><br><br></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-off"></span> EE</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-briefcase"></span> MS</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-book"></span> HS</span><br><br></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-info-sign"></span> EP</span></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-cog"></span> MM</span> </a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-signal"></span> MA</span><br><br></a>
     <a href=""><span class="badge" style="background-color:#287AA9"><span class="glyphicon glyphicon-picture"></span> ED</span></a>


	</div>	
    </div>
  </div>

  <div class="panel panel-default" style="width:200px">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Non Academic
        </a>
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

<footer>
<div id="footer" class="footer-wrapper" >
		<img></img>
		<img></img>
		<img src="http://www.shaastra.org/2014/main/static/img/icons/social_google_color.png" alt="fb"/>
		<img></img>
		  <img></img>
		<img src="http://www.shaastra.org/2014/main/static/img/icons/social_fb_color.png" alt="fb"/>
	
</div>
</footer>




</body>
</html>

