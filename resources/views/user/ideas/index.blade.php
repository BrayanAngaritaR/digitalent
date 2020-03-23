@extends('layouts.app')

@section('content')
<div class="vh-100">
	<div class="container">
		<h5 class="text-muted mt-4"><a class="btn btn-link" href="{{ url('/') }}">Volver al inicio</a></h5>
		<div class="row">
	        <div class="col-sm-12 col-md-8">
	        	<h1 class="display-4 bold pt-3 brand-title">Digi-Talent</h1>
	        	<h1 class="bold pt-3 brand-title">Ideas de Negocio en Internet</h1>

	        	<h5 class="brand-subtitle mt-4"><b>Resultados de búsqueda:</b></h5>

	        	<p class="mt-4 brand-subtitle f-18">Ideas recomendadas para  
	        		<span>
	        			{{$idea_name}}
	        		</span>
	        	</p>
	        
	        	@forelse($ideas as $idea)
	        	@include('user.includes.info')
	        	<div class="card shadow p-4 mt-3 mb-4 z-index border-0">
	        		<h5>{{ $idea->title }}</h5>

	        		<p>{{ $idea->extract }}</p>

	        		<p>Fuente: {{ $idea->url }}</p>

	        		<button type="button" class="btn btn-link btn-lg text-right" data-toggle="modal" data-target="#searchModal{{ $idea->id }}" href="">
						<span class="p-3 brand-button font-weight-bold">Leer idea</span>
					</button>
	        	</div>
	        	@empty
	        	<div class="mt-5 card shadow p-4 border-0">
	        		<h5>Lo sentimos, no tenemos ideas actualizadas.</h5>
	        	</div>
	        	@endforelse

	        	<a class="mt-5 btn btn-primary btn-lg" href="{{ url('/') }}">
	        		Buscar ideas
	        	</a>

	        </div>
	        <div class="col-sm-12 col-md-4 mt-0">
	        	<img class="results-bg" src="/assets/images/results-bg.png" width="1000">
	        </div>	        
	    </div>
	</div>

	<footer class="mt-5 pt-5">
		<div class="container bg-dark mt-5">
			<p class="text-white text-center p-1">
				Digi-Talent 2020 by BePro
			</p>
		</div>
	</footer>
    
</div>




@endsection


