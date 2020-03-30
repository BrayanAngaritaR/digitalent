@extends('layouts.app')

@section('content')

<div class="vh-100">
	<div class="container">
		<div class="row">
	        <div class="col-sm-12 col-md-10 col-lg-8">
	        	<h1 class="display-4 bold pt-3 brand-title">Digi-Talent</h1>
	        	<h4 class="bold pt-3 brand-title">Hola {{ Auth::user()->name }}</h4>

	        	<h5 class="brand-subtitle mt-4 mb-5"><b>Crear nuevas tareas:</b></h5>

	        	<form method="POST" action="{{ route('admin.tasks.store') }}">
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
							<p class="mb-3">{{ __('Título') }}</p>

							<input type="text" class="form-control mb-3 @error('title') is-invalid @enderror" name="title[]" value="{{ old('title') }}" placeholder="Título de la tarea" required autocomplete="title" autofocus>

							<input type="text" class="form-control mb-3" placeholder="Título de la tarea" name="title[]" value="{{ old('title') }}" >
							<input type="text" class="form-control mb-3" placeholder="Título de la tarea" name="title[]" value="{{ old('title') }}" >
							<input type="text" class="form-control mb-3" placeholder="Título de la tarea" name="title[]" value="{{ old('title') }}" >

							@error('title')
								<p class="text-danger" role="alert">
						    		<strong>{{ $message }}</strong>
								</p>
							@enderror
						</div>
						{{-- <div class="col-sm-1 mt-5">
							<button class="add">Add</button>
							<button class="remove">remove</button>
						</div> --}}

						{{-- <input type="text">


						<div id="new_chq"></div>
						<input type="hidden" value="1" id="total_chq"> --}}

                    <div class="form-group row mb-0">
                        <div class="col-md-6 ml-3">
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

{{-- @push('scripts')

<script type="text/javascript">
$(document).ready(function(){



	    $('.add').on('click', add);
    $('.remove').on('click', remove);

		function add() {
		  let new_chq_no = parseInt($('#total_chq').val()) + 1;
		  let new_input = "<input type='text' class='form-control' id='new_" + new_chq_no + " name='title[]' '>";

		  $('#new_chq').append(new_input);
		  
		  $('#total_chq').val(new_chq_no);
		}

function remove() {
  var last_chq_no = $('#total_chq').val();

  if (last_chq_no > 1) {
    $('#new_' + last_chq_no).remove();
    $('#total_chq').val(last_chq_no - 1);
  }
}


});
</script>


@endpush --}}


