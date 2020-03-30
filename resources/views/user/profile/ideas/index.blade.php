@extends('layouts.app')

@section('content')

<div class="vh-100">
	<div class="container">
		<div class="row">
	        <div class="col-sm-12 col-md-10 col-lg-8">
	        	<h1 class="display-4 bold pt-3 brand-title">Digi-Talent</h1>
	        	<h1 class="bold pt-3 brand-title">Ideas de Negocio en Internet</h1>

	        	<h5 class="brand-subtitle mt-4"><b>Resultados de búsqueda:</b></h5>

	        	<p class="mt-4 brand-subtitle f-18 mb-5">Ideas recomendadas para  
	        		<span>
	        			{{ Auth::user()->name }}
	        		</span>
	        	</p>
	        
	        	@forelse($ideas as $idea)
	        	@include('user.includes.info')
	        	<div class="card shadow p-4 mt-3 mb-4 z-index border-0">
	        		<h5>
	        			<a href="{{ route('user.ideas.show', $idea) }}" class="text-dark">
	        				{{ $idea->title }}
	        			</a>
	        		</h5>

	        		<div class="progress mt-3 rounded-0">
						<div class="progress-bar" role="progressbar" style="width: {{$idea->pivot->progress}}%;" aria-valuenow="{{$idea->pivot->progress}}" aria-valuemin="0" aria-valuemax="100">{{$idea->pivot->progress}}%</div>
					</div>
	        	</div>
	        	@empty
	        	<div class="mt-5 card shadow p-4 border-0">
	        		<h5>Lo sentimos, no tenemos ideas actualizadas. <b>Debes seleccionar un interés</b></h5>
	        	</div>
	        	@endforelse

	        	<a class="mt-5 btn btn-primary btn-lg" href="{{ url('/') }}">
	        		Buscar ideas
	        	</a>

	        </div>
	        <div class="col-sm-12 col-md-2 col-lg-4 mt-0 d-sm-none d-md-block">
	        	<img class="results-bg" src="/assets/images/results-bg.png" width="1000">
	        </div>	        
	    </div>
	</div>    
</div>

@endsection


