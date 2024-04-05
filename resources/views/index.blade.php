<x-app title="Biblioteca Central | Home">
	<section class="my-3 mx-5">
		<h1>Listado de Libros</h1>
	</section>

	<section class="d-flex flex-wrap justify-content-center">
		@foreach ($books as $book)
			<div class="card mx-2 my-3 card_size">
				<div class="card-header">
					<h2 class="h5">{{ $book->title }}</h2>
				</div>
				<div class="card-body">
					<p>{{ $book->description }}</p>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Solicitar</button>
				</div>
			</div>
		@endforeach
	</section>
</x-app>
