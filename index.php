<?php //https://www.youtube.com/watch?v=mZOpvhywT_E
//https://www.youtube.com/watch?v=rJesac0_Ftw&t=259s
// https://www.youtube.com/watch?v=KXRykH-3CJQ

?>
<!DOCTYPE HTML>
<html>
	<head>
            <meta http-equiv="Content - Type" content="text/html; charset=utf-8" />
            <title>Create Live Search Json Data by using jQuery Ajax</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                <link rel="stylesheet" href="css/bootstrap.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/main.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <style>
                #result{
                    position: absolute;
                    with:100%;
                    max-width: 870px;
                    cursor: pointer;
                    overflow-y: auto;
                    max-height:400px;
                    box-sizing: border-box;
                    z-index: 10001
                }
                
                .link-class:hover{
                    background-color: #f1f1f1;
                }
                </style>
	</head>	
	<body>
            <br/><br/>
            
		<div class="container" style="width:900px;">
                    <h2 align="center">JSON LIVE Data Search Using Ajax JQuery</h2>
                    <h3 align="center">Employee Data</h3>
                    <br/><br/>
                    <div align="center">
                        <input type="text" name="search" id="search" placeholder="Search Employee Details" class="form-control" />
                    </div>
                    <ul class="list-group" id="result"></ul>
                    <p id="nodata"></p>
                    <br/>			
		</div>           
         </body>
</html>

<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
            $('#result').html('');
            var searchField = $('#search').val();
            var expression = new RegExp(searchField, "i");
            $.getJSON('data.json', function(data){
                $.each(data, function(key, value){
                   if(value.name.search(expression) != -1 || value.location.search(expression) != -1 || value.image.search(expression) != -1){
                       $('#result').append('<li class="list-group-item link-class"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.name+' | <span class="text-muted">'+value.location+'</span></li>');
                   }else if((value.name.search(expression) != '' || value.location.search(expression) != '' || value.image.search(expression) != '')){
                       $('#result').append('');                                   
                    }                 
                       document.getElementById("nodata").innerHTML = 'No Data Found';
                });
            })
            
        });
    });

</script>