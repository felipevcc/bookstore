<x-app title="Editar usuario">
	<section class="container my-5">
		<div class="card">
			<div class="card-header">
				<h2 class="h4">Editar usuario</h2>
			</div>
			<div class="card-body">
				<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
					@csrf
					@method('PUT')
					<x-users.form :user="$user" :roles="$roles" />
				</form>
			</div>
		</div>
	</section>
</x-app>
