<!DOCTYPE html>
<html>
	<head>
		@include('blocks.head')
	</head>
	<!--[if IE]>
		<body class="@yield('class') ie">
<![endif]-->
<!--[if IE 6]>
	<body class="@yield('class') ie-6">
<![endif]-->
<!--[if IE 7]>
	<body class="@yield('class') ie-7">
<![endif]-->
<!--[if IE 8]>
	<body class="@yield('class') ie-8">
<![endif]-->
<!--[if IE 9]>
	<body class="@yield('class') ie-9">
<![endif]-->
<!--[if gte IE 8]>
	<body class="@yield('class') ie-8 ie-9">
<![endif]-->
<!--[if lt IE 9]>
	<body class="@yield('class') ie-8 ie-7 ie-6">
<![endif]-->
<!--[if lte IE 7]>
	<body class="@yield('class') ie-7 ie-6">
<![endif]-->
<!--[if gt IE 6]>
	<body class="@yield('class') ie-7 ie-8 ie-9">
<![endif]-->
<!--[if !IE]> -->
	<body class="@yield('class')">
<!-- <![endif]-->
		@yield('body')
	</body>
</html>