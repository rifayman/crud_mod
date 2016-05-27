"fields" => [

			@foreach($fieldsToFill as $field)
            [
	            'name' => '{{ $field['name'] }}',
	            'label' => "{{ $field['name'] }}",
	            'type' => '{{ $field['type'] }}',
	            @if($field['type']=='browse')
	            @if($field['useMedia'])
	            'usemedia' => true,
	            @endif
	            @endif
	        	@if(isset($field['translatable']))	
	            'translate' => {{ $field['translatable'] }},
            	@endif
            ],
            @endforeach

        ],