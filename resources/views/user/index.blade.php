@extends('layouts.app')

@section('content')
<div class="vh-100">
	<div class="container">
		<div class="row">
	        <div class="col-sm-12 col-md-6 mt-5 pt-5">
	        	<h1 class="display-4 bold mt-5 pt-3 brand-title">Digi-Talent</h1>

	        	<p class="mt-4 brand-subtitle f-18">Encuentra ideas para <span>trabajar por internet</span> o <span>crear negocios</span> según tu talentos, preferencias o hobbies.</p>

	        	<button type="button" class="mt-5 btn btn-primary btn-lg" data-toggle="modal" data-target="#searchModal">
					<span class="p-3 brand-button font-weight-bold">Empezar</span>
				</button>
	        </div>
	        <div class="col-sm-12 col-md-6 mt-0">
	        	<img class="home-bg" src="/assets/images/home-bg.svg" width="1000" style="margin-left: -100px; margin-right: 100px;">
	        </div>	        
	    </div>
	</div>
</div>


<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class="close text-right pr-4 pt-4" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

			<div class="p-5 text-center">
				<div class="modal-header">
					<p class="brand-subtitle f-18">Encuentra ideas de negocios en internet según tus preferencias.</p>
				</div>

				<form action="{{ route('user.ideas.index') }}" method="POST">
					@csrf
					<div class="mt-4">
						<select class="custom-select" name="category_id">
							<option selected>Selecciona tus preferencias</option>
							@forelse($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@empty
								<option>No hay preferencias aún</option>
							@endforelse
						</select>
					</div>	

					<div class="mt-3">

						<p>¿Quieres incluir resultados en inglés?</p>


						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="english_no" checked name="englishResults" class="custom-control-input" value="english_no">
							<label class="custom-control-label" for="english_no">No</label>
						</div>

						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="english_yes" value="english_yes" name="englishResults" class="custom-control-input">
							<label class="custom-control-label" for="english_yes">Sí</label>
						</div>
						
					</div>

					<div class="mt-4">
						<button type="submit" class="btn btn-primary">
							<span class="p-3">
								Buscar ideas
							</span>
						</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

@endsection


