<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ $title ?? 'Biblioteca' }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-">
	{{-- @include('components.menu') --}}

	{{-- Menu --}}
	<x-menu />

	{{-- Content --}}
	<main id="app">
		<div class="container mt-4">
			{{-- <x-alerts /> --}}
		</div>

		{{ $slot }}
	</main>
</body>

</html>
