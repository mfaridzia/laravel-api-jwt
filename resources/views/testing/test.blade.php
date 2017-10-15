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
			url: "http://localhost:8000/api/tutorial",
			dataType: "json",
			type: "GET",
			//data: {"token":your toke here},
			success: function (datas) {
				//console.log(datas)
				let data = '';
				for(let i = 0; i < datas.length; i++) { 
				   data += "<p> Title : " + datas[i].title + " Content : " + datas[i].body + "</p>"
				} 
				document.getElementById('box').innerHTML = data;
			}
		});

	});

</script>

</body>
</html>