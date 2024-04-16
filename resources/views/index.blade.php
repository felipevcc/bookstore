<x-app title="Inicio">
	<section class="my-3 d-flex justify-content-center">
		<h1>Listado de Libros</h1>
	</section>

	<section class="d-flex flex-wrap justify-content-center">
		@foreach ($books as $book)
			<div class="card mx-2 my-3 card_size">
				<img src="{{ $book->file->route }}" class="card-img-top" alt="Portada Libro">
				<div class="card-body">
					<h5 class="card-title">{{ $book->title }}</h5>
					<p class="card-text">{{ $book->format_description }}</p>
					<div class="d-flex flex-wrap">
						<span class="w-100">
							<strong>Autor: </strong>{{ $book->author->name }}
						</span>
						<span class="mt-2">
							<strong>Categoría: </strong>{{ $book->category->name }}
						</span>
					</div>
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
