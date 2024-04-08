<x-app title="Reseteo de contraseña">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Reseteo de contraseña</div>

					<div class="card-body">
						<form method="POST" action="{{ route('password.update') }}">
							@csrf
							<input type="hidden" name="token" value="{{ $token }}">
							<input type="hidden" name="email" value="{{ $email ?? old('email') }}">


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
										Resetear contraseña
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
