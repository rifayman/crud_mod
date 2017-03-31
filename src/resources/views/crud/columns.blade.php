"columns" => [

			[
                'name' => 'id',
                'label' => "id"
            ],
			@foreach($fieldsToFill as $field)
            [
	            'name' => '{{ $field['name'] }}',
	            'label' => "{{ $field['name'] }}",
	            'type' => '{{ $field['type'] }}',
	            @if(isset($field['translatable']))	
	            'translate' => {{ $field['translatable'] }},
            	@endif
            ],
            @endforeach

        ],