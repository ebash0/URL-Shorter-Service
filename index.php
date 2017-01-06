<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Сервис сокращения URL</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <h1>Сократить URL</h1>
	  
      <form id="shortener">
        <p><input type="text" name="url" id="longurl"  placeholder="http://google.com"></p>
        <p class="submit"><input type="submit" value="Сократить!"/></p>
      </form>
	  
	  <h3 id="response"></h3>
	  
	  <h3 id="error" style="color: red;"></h3>
	  
    </div>
  </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script>
$(function () {
	$('#shortener').submit(function () {
		$.ajax({
			  url: "shorten.php",
			  data: {longurl: $('#longurl').val()},
			  success: function(response){
				  $('#response').text(response);
			  }
		  });
		
		return false;
	});
});
</script>
</body>
</html>

