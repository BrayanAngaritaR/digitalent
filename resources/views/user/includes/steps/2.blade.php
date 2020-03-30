@extends('layouts.app')

@section('content')
<div class="vh-100">
	<div class="container">
		<div class="row">
	        <div class="col-sm-12 col-md-9">
	        	<h1 class="display-4 bold pt-3 brand-title">Digi-Talent</h1>
	        	<h1 class="bold pt-3 brand-title">Cómo convertir tu idea en un negocio</h1>

	        	<div class="row mt-5">
	        		<div class="col-md-3 p-0 my-auto">
	        			<div class="card pt-3 pl-3 pb-3 pr-0 step z-index">
	        				
	        				<span class="float-right">
	        					<a href="{{ route('user.ideas.show', $idea) }}" class="text-dark step-link">
		        					Paso 1
		        					<p class="m-0">Construye tu marca</p>
		        				</a>
	        				</span>
	        			</div>
	        		</div>

	        		<div class="col-md-3 p-0 my-auto">
	        			<div class="card pt-3 pl-3 pb-3 pr-0 step step-active z-index">
	        				<a href="{{ route('user.ideas.get.step2', $idea) }}" class="text-dark step-link">
	        					<h4 class="text-white">Paso 2</h4>
	        					<p class="m-0 text-white">Diseña tu negocio</p>
	        				</a>
	        			</div>
	        		</div>

	        		<div class="col-md-3 p-0 my-auto">
	        			<div class="card pt-3 pl-3 pb-3 pr-0 step z-index">
	        				<a href="{{ route('user.ideas.get.step3', $idea) }}" class="text-dark step-link">
	        					Paso 3
	        					<p class="m-0">Promociona tu negocio</p>
	        				</a>
	        			</div>
	        		</div>

	        		<div class="col-md-9">
	        			<div class="mt-5">
	        				<h5 class="bold raleway f-18">Diseña tu negocio</h5> 

							<p class="mt-4 raleway">{{ $idea->extract }}</p>
	        			</div>

	        			<div class="mt-5 z-index raleway">

	        				<h5 class="mb-4 bold">Recursos en línea</h5>
	        				<p>Visita los siguientes enlaces para aprender más sobre cómo diseñar tu negocio</p>


	        				@forelse($resources as $resource)
	        					<p>
	        						<a href="{{ $idea->url }}" target="_blank" class="raleway">
	        							@if($resource->english_resource)
	        								<span class="bold">{{ __('Recurso en inglés') }}</span> - 
	        							@endif
	        								{{ $idea->title }}
	        							</a>
	        						</p>
	        				@empty
	        					<p>No se han publicado recursos para esta idea de negocio.</p>
	        				@endforelse

	        			</div>

	        			<div class="mt-5 z-index raleway">

	        				<h5 class="mb-4 bold">Tareas</h5>
	        				<p>Una vez finalices las tareas que te indicamos a continuación, marca los campos para continuar:</p>

	        				<form action="{{ route('user.ideas.save.step2', $idea) }}" method="POST">
	        					@csrf
		        				@forelse($tasks as $task)
			        				<div class="form-check">
		        						<input class="form-check-input" 
		        							type="checkbox" 
		        							id="task{{$task->id}}" 
		        							value="{{ $task->id }}" 
		        							name="tasks[]"

		        							@if($user_tasks->contains($task->id))
												checked
											@endif
		        						>

		        						<label class="form-check-label" for="task{{$task->id}}">
		        							<h5>{{ $task->title }}</h5>
		        						</label>
		        					</div>

		        				@empty

		        					<p>No se han publicado tareas para esta idea de negocio.</p>

		        				@endforelse

		        				<div class="mt-5">
									<div class="mt-5">
										<button type="submit" id="continue" class="mt-5 btn btn-primary btn-lg">
			        						Marcar como finalizado
			        					</button>
				        			</div>
			        			</div>

	        				</form>
	        			</div>
	        		</div> 
	        	</div>
	        </div>

	        <div class="col-sm-12 col-md-3 mt-0">
	        	<img class="results-bg" src="/assets/images/results-bg.png" width="1000">
	        </div>	
	    </div>
	</div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/validate-steps.js') }}"></script>
@endpush


