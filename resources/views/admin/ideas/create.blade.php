@extends('layouts.app')

@section('content')

<div class="vh-100">
	<div class="container">
		<div class="row">
	        <div class="col-sm-12 col-md-10 col-lg-8">
	        	<h1 class="display-4 bold pt-3 brand-title">Digi-Talent</h1>
	        	<h4 class="bold pt-3 brand-title">Hola {{ Auth::user()->name }}</h4>

	        	<h5 class="brand-subtitle mt-4"><b>Crear nueva tarea:</b></h5>

	        	<form method="POST" action="{{ route('admin.ideas.store') }}">
                    @csrf

                    <div class="form-group row mt-2">
						<div class="col-sm-12 mt-5">
							<p class="mb-3">{{ __('Título') }}</p>
							<input id="title" type="text" class="form-control mb-1 @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

							@error('title')
								<p class="text-danger" role="alert">
						    		<strong>{{ $message }}</strong>
								</p>
							@enderror
						</div>
                    </div>

                    <div class="form-group row z-index">
                    	<div class="col-sm-12 col-md-6">
							<p class="mb-3">{{ __('Categoría') }}</p>
								<select class="form-control 
									@error('category_id') is-invalid @enderror" 
									name="category_id" 
									required>

									@forelse($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
									@empty
										<option>No hay preferencias aún</option>
									@endforelse

								</select>

							@error('category_id')
							<p class="text-danger" role="alert">
						    	<strong>{{ $message }}</strong>
							</p>
							@enderror
						</div>

                        <div class="col-sm-12 col-md-6">
                            <p class="mb-3">{{ __('Idea en inglés') }}</p>
                                <select class="form-control 
                                    @error('password') is-invalid @enderror" 
                                    name="english_idea" 
                                    required>
                                    <option value="1">Sí</option>
                                    <option value="0" selected>No</option>
                                </select>

                            @error('english_idea')
                            <p class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>

						<div class="col-sm-12 mt-3">
                            <p class="mb-3">{{ __('Enlace') }}</p>
                            <input id="url" type="text" class="form-control mb-1 @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>

                            @error('url')
                                <p class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <p class="mb-3">{{ __('Descripción') }}</p>

                            <textarea 
                            	name="extract" 
                            	class="form-control mb-1 
                            	@error('email') is-invalid @enderror"
                            	required
                            	rows="6" 
                            >{{old('extract')}}</textarea>

                            @error('extract')
                                <p class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="submit" class="mt-2 btn btn-primary btn-lg">
                                <span class="p-3 brand-button font-weight-bold">Ingresar</span>
                            </button>
                        </div>
                    </div>
                </form>

	        </div>       
	    </div>
	</div>    
</div>

@endsection


