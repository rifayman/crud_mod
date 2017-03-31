@foreach($fieldsToFill as $field)
@if(!isset($field['translatable']) || $field['translatable']=='false')
'{{ $field['name'] }}',
@endif
@endforeach