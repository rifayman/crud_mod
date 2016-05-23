@foreach($fieldsToFill as $field)

@if(!isset($field['translatable']) || $field['translatable']=='false')

$table->{{$field_equivalence[$field['type']]}}('{{ $field['name'] }}');
		            	        		
@endif

@endforeach