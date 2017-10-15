<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<div id="box"> </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

	$(document).ready(function() {
		
		$.ajax({
			url: "http://localhost:8000/api/tutorial/{{ $id }}",
			dataType: "json",
			type: "GET",
			//data: {"token":your toke here},
			success: function (data) {
				//console.log(data)
				document.getElementById('box').innerHTML = "Title : " + data.title + " | Content : " + data.body
			},
			error: function() {
				document.getElementById('box').innerHTML = "Not Found!"
			}
		});

	});

</script>

</body>
</html>