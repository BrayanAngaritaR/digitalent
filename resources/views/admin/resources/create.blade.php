@extends('layouts.app')

@section('content')

<div class="vh-100">
	<div class="container">
		<div class="row">
	        <div class="col-sm-12 col-md-10 col-lg-8">
	        	<h1 class="display-4 bold pt-3 brand-title">Digi-Talent</h1>
	        	<h4 class="bold pt-3 brand-title">Hola {{ Auth::user()->name }}</h4>

	        	<h5 class="brand-subtitle mt-4 mb-5"><b>Crear nuevas tareas:</b></h5>

	        	<form method="POST" action="{{ route('admin.resources.store') }}">
                    @csrf

                    <div class="form-group row z-index">
                    	<div class="col-sm-12 col-md-6">
							<p class="mb-3">{{ __('Idea') }}</p>
								<select class="form-control 
									@error('password') is-invalid @enderror" 
									name="idea_id" 
									required>

									@forelse($ideas as $idea)
										<option value="{{$idea->id}}">{{$idea->title}}</option>
									@empty
										<option>No hay preferencias aún</option>
									@endforelse

								</select>

							@error('idea_id')
							<p class="text-danger" role="alert">
						    	<strong>{{ $message }}</strong>
							</p>
							@enderror
						</div>

						<div class="col-sm-12 col-md-6">
							<p class="mb-3">{{ __('Paso') }}</p>
								<select class="form-control 
									@error('password') is-invalid @enderror" 
									name="step_id" 
									required>

									@forelse($steps as $step)
										<option value="{{$step->id}}">{{$step->name}}</option>
									@empty
										<option>No hay preferencias aún</option>
									@endforelse

								</select>

							@error('step_id')
							<p class="text-danger" role="alert">
						    	<strong>{{ $message }}</strong>
							</p>
							@enderror
						</div>

						<div class="col-sm-12 mt-2">
							<div class="input-form">
								<p class="mb-3 mt-3">{{ __('Agregar recurso') }}</p>

								<input type="text" class="form-control mb-3 @error('title') is-invalid @enderror" name="title[]" value="{{ old('title') }}" placeholder="Título del recurso" required autocomplete="title" autofocus>

								@error('title')
									<p class="text-danger" role="alert">
							    		<strong>{{ $message }}</strong>
									</p>
								@enderror

								<input type="text" class="form-control mb-3 @error('url') is-invalid @enderror" name="url[]" value="{{ old('url') }}" placeholder="Enlace del recurso" required autocomplete="url" autofocus>

								@error('url')
									<p class="text-danger" role="alert">
							    		<strong>{{ $message }}</strong>
									</p>
								@enderror
							</div>
						</div>

						{{-- <div class="col-sm-12 mt-2">
							<p class="mb-3">{{ __('Enlace') }}</p>

							<div class="input-form">
								<input type="text" class="form-control mb-3 @error('url') is-invalid @enderror" name="url[]" value="{{ old('url') }}" placeholder="Título de la tarea" required autocomplete="url" autofocus>

								@error('url')
									<p class="text-danger" role="alert">
							    		<strong>{{ $message }}</strong>
									</p>
								@enderror
							</div>
						</div> --}}
					</div>

                    <div class="form-group row mb-0">
                    	<div class="col-sm-12 col-md-6">
                    		<p id="but_add" class="mt-2 btn btn-theme btn-lg">
                    			<span class="p-3 brand-button font-weight-bold">Duplicar</span>
                    		</p>
                        </div>

                        <div class="col-sm-12 col-md-6 text-right">
                            <button type="submit" class="mt-2 btn btn-primary btn-lg">
                                <span class="p-3 brand-button font-weight-bold">Guardar</span>
                            </button>
                        </div>
                    </div>
                </form>

	        </div>       
	    </div>
	</div>    
</div>

@endsection

 @push('scripts')

<script type="text/javascript">

	$(document).ready(function(){
		$('#but_add').click(function(){
			var newel = $('.input-form:last').clone();
			// Add after last <div class='input-form'>
			$(newel).insertAfter(".input-form:last");
		});
	});
</script>


@endpush 


