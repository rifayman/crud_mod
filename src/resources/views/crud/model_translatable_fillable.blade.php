@foreach($fieldsToFill as $field)
@if(isset($field['translatable']))
@if($field['translatable'] == 'true')
'{{ $field['name'] }}',
@endif		            	        		
@endif
@endforeach