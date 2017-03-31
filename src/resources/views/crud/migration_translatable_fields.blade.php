@foreach($fieldsToFill as $field)
@if(isset($field['translatable']))
@if($field['translatable'] == 'true')
$table->{{$field_equivalence[ $field['type'] ]}}('{{ $field['name'] }}');
@endif		            	        		
@endif
@endforeach