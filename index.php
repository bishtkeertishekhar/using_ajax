
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ajax Tutorial</title>
  </head>
  <body>
	<div class=" offset-md-2 mt-3">
		<button class="btn show btn-outline-success">Show data</button>
		<button class="btn toggle btn-outline-warning">Toggle data</button>
		<button class="btn hide btn-outline-danger">Hide data</button>
	</div>
	<div class="col-md-6 offset-md-2 data">
	
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
 <script>
  $(document).ready(function(){
	  //load_data();
        function load_data(page){
		  $.ajax({
			url: 'config.php',
			type:  'GET',
			data: {page:page},
			success: function(data){
			   $(".data").html(data);
			},
		   });
		}
	  $(document).on('click','.pagination_link',function(){
		 var page = $(this).attr("id");
				load_data(page);
	  });
	  $(".show").click(function(){
		  load_data();
		  $(".data").show();
	  });
	  $(".hide").click(function(){
		  $(".data").hide();
	  });
	  	  $(".toggle").click(function(){
			  load_data();
		  $(".data").toggle();
	  });
  });
  </script>
  </body>

  
</html>
