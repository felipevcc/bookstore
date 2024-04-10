<x-app title="Libros">
	<section class="container">
		<div class="d-flex justify-content-center my-4">
			<h1>Listado de libros</h1>
		</div>

		<the-book-list :books="{{ $books }}" />
	</section>
</x-app>
