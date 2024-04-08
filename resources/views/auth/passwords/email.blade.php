<x-app title="Recuperacion de contraseña">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Recuperar contraseña</div>

					<div class="card-body">

						<form method="POST" action="{{ route('password.email') }}">
							@csrf

							<div class="row mb-3">
								<label for="email" class="col-md-4 col-form-label text-md-end">
									Correo electrónico
								</label>

								<div class="col-md-6">
									<input id="email" type="email"
										class="form-control @error('email') is-invalid @enderror" name="email"
										value="{{ old('email') }}" required autocomplete="email" autofocus>

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-0">
								<div class="col-md-6 offset-md-4">
									<a href="{{ route('login') }}" class="me-2 btn btn-secondary"> Atrás
									</a>
									<button type="submit" class="btn btn-primary">
										Enviar a mi correo
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
