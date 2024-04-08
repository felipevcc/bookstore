<x-app title="Registro">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Registro</div>

					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="row mb-3">
								<label for="number_id" class="col-md-4 col-form-label text-md-end">
									Cedula
								</label>

								<div class="col-md-6">
									<input id="number_id" type="text"
										class="form-control @error('number_id') is-invalid @enderror" name="number_id"
										value="{{ old('number_id') }}" required autocomplete="number_id" autofocus>

									@error('number_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="name" class="col-md-4 col-form-label text-md-end">
									Nombre
								</label>

								<div class="col-md-6">
									<input id="name" type="text"
										class="form-control @error('name') is-invalid @enderror" name="name"
										value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="last_name" class="col-md-4 col-form-label text-md-end">
									Apellido
								</label>

								<div class="col-md-6">
									<input id="last_name" type="text"
										class="form-control @error('last_name') is-invalid @enderror" name="last_name"
										value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

									@error('last_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="email" class="col-md-4 col-form-label text-md-end">
									Correo electrónico
								</label>

								<div class="col-md-6">
									<input id="email" type="email"
										class="form-control @error('email') is-invalid @enderror" name="email"
										value="{{ old('email') }}" required autocomplete="email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="password" class="col-md-4 col-form-label text-md-end">
									Contraseña
								</label>

								<div class="col-md-6">
									<input id="password" type="password"
										class="form-control @error('password') is-invalid @enderror" name="password"
										required autocomplete="new-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="password-confirm" class="col-md-4 col-form-label text-md-end">
									Confirmar contraseña
								</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control"
										name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>

							<div class="row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										Registrar
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app>
