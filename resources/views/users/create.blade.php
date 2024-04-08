<x-app title="Crear usuario">
	<section class="container my-5">
		<div class="card">
			<div class="card-header">
				<h2 class="h4">Crear usuario</h2>
			</div>
			<div class="card-body">
				<form action="{{ route('users.store') }}" method="POST">
					@csrf
					<x-users.form />
				</form>
			</div>
		</div>
	</section>
</x-app>
