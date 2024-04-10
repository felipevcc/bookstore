<template>
	<section>
		<div class="card">
			<div class="card-header d-flex justify-content-end">
				<button class="btn btn-primary">Crear libro</button>
			</div>
			<div class="card-body">
				<div class="table-responsive my-4 mx-2">
					<table class="table table-bordered" id="book_table">
						<thead>
							<tr>
								<th>Título</th>
								<th>Autor</th>
								<th>Categoría</th>
								<th>Cantidad</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(book, index) in books" :key="index">
								<td>{{ book.title }}</td>
								<td>{{ book.author.name }}</td>
								<td>{{ book.category.name }}</td>
								<td>{{ book.stock }}</td>
								<td>
									<button class="btn btn-primary">hola</button>
								</td>

								<!-- <td>
									<div class="d-flex justify-content-center">
										<a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">
											<i class="fa-solid fa-pencil"></i>
										</a>
										<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
											@csrf
											@method('DELETE')
											<button class="ms-2 btn btn-danger btn-sm">
												<i class="fa-solid fa-trash-can"></i>
											</button>
										</form>
									</div>
								</td> -->
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		name: '',
		props: ['books'],
		//components: {},
		data() {
			return {}
		},
		mounted() {
			this.index()
		},
		methods: {
			async index() {
				$('#book_table').DataTable()
			}
		}
	}
</script>
