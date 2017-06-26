<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Asoyaracuy Factura</h1>
	<ul>
		<li>{{$payment->user->house}}</li>
		<li>{{$payment->bank}}</li>
		<li>{{$payment->date}}</li>
		<li>{{$payment->confirmation_code}}</li>
		<li>{{$payment->amount}}</li>
		<li>{{$payment->type}}</li>
	</ul>
</body>
</html>