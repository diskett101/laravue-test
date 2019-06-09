<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Article CRUD</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<body>
		<div id="app">
			<router-view></router-view>
		</div>
		<script src="/js/app.js"></script>
	</body>
</html>