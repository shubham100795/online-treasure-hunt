<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="index_style.css" />
<script type='text/javascript' src='jquery.particleground.min.js'></script>
<script type="text/javascript">

function login_redirect(){
	window.location="login.php";
}

function register_redirect(){
	window.location="register.php";
}
document.addEventListener('DOMContentLoaded', function () {
  particleground(document.getElementById('particles'), {
    dotColor: '#5cbdaa',//#5cbdaa
    lineColor: '#5cbdaa',
	minSpeedX: 0.6,
	maxSpeedX: 0.6,
	density: 8000,//density kam dots jyada
	proximity:100//kitni paas m dots judengi..value jyada to jyada distance ki dots judengi
  });
 
}, false);

</script>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div id="particles">
				<div id="intro">
				<h1>Treasure ground</h1>
				<p>An Online Fun Event</p>
				<a href="#" onclick="login_redirect();" class="btn">login</a>
				<a href="#" onclick="register_redirect();" class="btn">signup</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>