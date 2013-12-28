<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css"/>


<script src="js/jquery.js"></script>
<script src="lib/backbone-min.js"></script>
<script src="lib/underscore-min.js"></script>
<script src="js/bootstrap.js"></script>
</head>


<script type="text/template" id="book-template">

	<div class="details">
	<img src="/Rustypages/images/flumech.jpg" alt="book1" id="img"class="img-thumbnail"/>
	<p style="margin-top:-80px;margin-left:120px;">
	<font size="3">
	<b><font color="green">Name:</font><%= bname %></b><br/>
	<b><font color="green">Author:</font><%= bauthor %></b><br/>
	<b><font color="green">Course:</font><%= bcourse bcoursename %></b>
	</font><br/>
	</p>
	</div>
	<br/>


</script>


<body> 

	<div id="wrapper">
		<H1>Search Test</H1>
		<div class="tools">
		Search<br/>
		<input type="text" id="searchBox" /><br/><br/>
			Filter:
			<div id="filters"></div>
			<div id="count"></div>
		</div>
		<ul id='listing'></ul>

	</div>
</body>
</html>

