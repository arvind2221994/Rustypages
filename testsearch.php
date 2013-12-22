
<html>
  <head>
      <script src="js/jquery.js"></script>
    <title>Comperio Super Simple Instant Search</title>
  </head>
  <body>
	<h1>Search Rustypages!</h1>
	<br />
    <input id="searchterm" />
    <button id="search">search</button>
    <div id="results">
        Hello!<br>
        
    </div>
    <script>
        var ctr = 0;
      $("#searchterm").keyup(function(e){
        
        var q = $("#searchterm").val();
        $.getJSON("phpajax/search.php",
        {
          query: q,
        },
        function(data) {
        ctr=q.length;    
        if(ctr>=3){
          $("#results").empty();
          $("#results").append("<p>Results for <b>" + q + "</b></p>");
          $.each(data, function(i,value){
            $("#results").append("<div>" + data[i].b_id + "</a><br>" + data[i].b_name + "<br><br></div>");
        });
        }
        else{ $("#results").empty();}
        });
      });
    </script>
    </div>
  </body>
</html>




<?php 
if(isset($_GET['query_string'])):
include "phpajax/search.php";
if(!empty($id))
foreach($id as $entry): 
    $stmt = $mysqli->prepare("SELECT b_id, b_title, b_author, b_course, b_course_title
        FROM book_data
        WHERE b_id = ?
        LIMIT 1");
$stmt->bind_param('i', $entry);  
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($b_id, $b_name, $b_author, $b_course, $b_course_title);
$stmt->fetch();
    ?>
    <div class="result">
        <img src="/Rustypages/images/flumech.jpg" alt="book1" id="img"class="img-thumbnail">
        <p style="margin-top:-80px;margin-left:120px;"><font size="3"><b><font color="green">Name:</font><?php echo $b_name;?></b><br><b><font color="green">Author:</font><?php echo $b_author;?></b><br><b><font color="green">Course:</font><?php echo $b_course." ".$b_course_title;?><a href="#"><span class="badge">Preview</span></a></b></font><br></p>
        <div class="tags"><button class="btn btn-success">Available</button><br><br><button class="btn btn-danger">Unavailable</button></div>
    </div>
    <br>
    <?php endforeach;
        endif; ?>
