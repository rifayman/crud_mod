<form role="form">

  {{-- Show the inputs --}}
  @foreach ($crud['fields'] as $field)

  {{-- splits by sections --}}
  @if(isset($field["section"]))
	  @if($y == 0)
		  <?php $section = $field["section"]; ?>
	  @else
		  @if($section != $field["section"])
			  <?php $section = $field["section"]; ?>
			  <hr />
			  <h4>{{ ucfirst($section) }}</h4>
		  @endif
	  @endif
  @endif
  <!-- load the view from the application if it exists, otherwise load the one in the package -->
  @if(view()->exists('crud::fields.'.$field['type']))
      @include('crud::fields.'.$field['type'], array('field' => $field))
  @else
      @include('crud::fields.'.$field['type'], array('field' => $field))
  @endif
@endforeach
</form>

{{-- For each form type, load its assets, if needed --}}
{{-- But only once per field type (no need to include the same css/js files multiple times on the same page) --}}
<?php
	$loaded_form_types_css = array();
	$loaded_form_types_js = array();

?>

@section('styles')
	<!-- FORM CONTENT CSS ASSETS -->
	@foreach ($crud['fields'] as $field)
		@if(!isset($loaded_form_types_css[$field['type']]) || $loaded_form_types_css[$field['type']]==false)
			@if (View::exists('crud::fields.assets.css.'.$field['type'], array('field' => $field)))
				@include('crud::fields.assets.css.'.$field['type'], array('field' => $field))
				<?php $loaded_form_types_css[$field['type']] = true; ?>
			@elseif (View::exists('crud::fields.assets.css.'.$field['type'], array('field' => $field)))

				@include('crud::fields.assets.css.'.$field['type'], array('field' => $field))
				<?php $loaded_form_types_css[$field['type']] = true; ?>
			@endif
		@endif
	@endforeach
@endsection

@section('scripts')
	<!-- FORM CONTENT JAVSCRIPT ASSETS -->

	@foreach ($crud['fields'] as $field )

		@if(!isset($loaded_form_types_js[$field['type']]) || $loaded_form_types_js[$field['type']]==false)

			@if (View::exists('crud::fields.assets.js.'.$field['type'], array('field' => $field)))
				@include('crud::fields.assets.js.'.$field['type'], array('field' => $field))
				<?php $loaded_form_types_js[$field['type']] = true; ?>
			@elseif (View::exists('crud::fields.assets.js.'.$field['type'], array('field' => $field)))

				@include('crud::fields.assets.js.'.$field['type'], array('field' => $field))
				<?php $loaded_form_types_js[$field['type']] = true; ?>
			@endif
		@endif
	@endforeach
@endsection