<x-app title="Inicio">
	<section class="my-3 d-flex justify-content-center">
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
					<div class="d-grid gap-2">
						<button class="btn btn-outline-success" type="button">
							Solicitar
						</button>
					</div>
				</div>
			</div>
		@endforeach
	</section>
</x-app>
