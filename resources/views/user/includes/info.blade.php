<!-- InfoModal -->
<div class="modal fade" id="searchModal{{ $idea->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<button type="button" class="close text-right pr-4 pt-4" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

			<div class="p-5 text-center">
				<div class="modal-header">
					<p class="brand-subtitle f-18">
						{{ $idea->title }}
					</p>
				</div>

				<div class="overflow-auto z-index">
	        		<embed
		        		src="https://medium.com/@mscherrenberg/laravel-5-6-vue-js-simple-form-submission-using-components-92b6d5fd4434" 
		        		width="100%"
		        		height="600" 
		        	>
		        	</embed> 
	        	</div>

	        	<div class="modal-footer text-center">

	        		<div class="col-12">
	        			<a href="{{ $idea->url }}" target="_blank">Leer artículo original</a>
	        		</div>

	        		@guest
	        		<div class="col-12">
	        			<form action="{{ route('url.session.store') }}" method="POST">
	        				<input type="text" name="slug" value="{{ $idea->slug }}">
	        				@csrf
	        				<button type="submit" class="mt-1 btn btn-primary btn-lg">
	        					¿Cómo hacer de esta idea un negocio?
	        				</button>
	        			</form>
	        		</div>
	        		@else
	        		<div class="col-12">
	        			<a href="{{ route('user.ideas.show', $idea->slug) }}" class="mt-1 btn btn-primary btn-lg">
	        				¿Cómo hacer de esta idea un negocio?
	        			</a>
	        		</div>
	        		@endguest
	        	</div>

			</div>

		</div>
	</div>
</div>
