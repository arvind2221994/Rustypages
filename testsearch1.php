
<html>
  <head>
    <script src="js/jquery.js"></script>
    <link href="css/icheck/line/blue.css" rel="stylesheet">
    <script src="js/icheck.js"></script>

    <title>Comperio Super Simple Instant Search</title>
  </head>
  <body>
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
      <h1>Search Rustypages!</h1>
	<br />
        <input id="searchterm"/><br />
        <button id="search">search</button>
        <div id="results">
        Hello!<br>
        
    </div>
    
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
                    <li><input type="checkbox" id = "ae" name="subject" value="ae" checked><label>AE</label></li>
                    <li><input type="checkbox" id = "bt" name="subject" value="bt" checked><label>BT</label></li>
                    <li><input type="checkbox" id = "cs" name="subject" value="cs" checked><label>CS</label></li>
                    <li><input type="checkbox" id = "ce" name="subject" value="ce" checked><label>CE</label></li>
                    <li><input type="checkbox" id = "me" name="subject" value="me" checked><label>ME</label></li>
                    <li><input type="checkbox" id = "mm" name="subject" value="mm" checked><label>MM</label></li>
                </ul>
            </div>	
        </div>
    </div>
        
        
    <div class="panel panel-default" style="width:200px">
        <div class="panel-heading">
            <h4 class="panel-title">
                <input type="checkbox" checked><label>Checkbox 2</label>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <span class="badge" style="background-color:#234723"><span class="glyphicon glyphicon-folder-open"></span> Fiction</span>
            </div>
        </div>
    </div>
        
    </div>
    -------------------------------------------------------------------
    
    
    
    
<script>
function mySearch(){
//update query with tags
$('input').iCheck('update');
var tags = new Array();     //$(this).val() stores the value
$('input:checkbox[name=subject]:checked').each(function(){
    tags.push(this.value);
});
    console.log(tags);
//update query with search term       
var q = $("#searchterm").val();
if(q.length>2)
    $.ajax({
        type: "GET",
        url: "phpajax/search.php",
        dataType: 'json',
        ifModified: false,
        data: { query: q, tags: tags }
    })
        .success(function(data,status) {
            tags = data['tags'];        //latest tags updated from the database
    
        //updating checkboxes on the page with tags from database
        
        $('input:checkbox[name=subject]').attr('checked',false);
        $('input:checkbox[name=subject]').iCheck('update');
        $.each(data['tags'], function(i,value){
            $('#'+value).iCheck('check');
        });
        
        //writing search results to html
        $("#results").empty();
        $("#results").append("<p>Results for <b>" + q + "</b></p>");
        $.each(data['vals'], function(i,value){
            $("#results").append("<div>" + data['vals'][i].b_id + "</a><br>" + data['vals'][i].b_name + "<br><br></div>");  });
    });
    }
$("#search").click(function(){
$('input:checkbox[name=subject]').iCheck('check');
mySearch();
//  change: myFunction
});
//ajax call on unchecking

//ajax call on checking
$("input:checkbox[name=subject]").on(
    'ifClicked', function(){
        $('#'+this.id).iCheck('toggle');
    console.log("clicked");
    mySearch();}
);  

</script>

    </div>
  </body>
</html>
