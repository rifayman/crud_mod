<!-- summernote editor -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
    <textarea
      class="form-control redactor"

      @foreach ($field as $attribute => $value)
        {{ $attribute }}="{{ $value }}"
      @endforeach
      @if(isset($language["iso"]))
        id="redactor-{{ $field['name'] }}-{{ $language["iso"] }}"
      @else
      id="redactor-{{ $field['name'] }}"
      @endif
      >{!! (isset($field['value'])) ? $field['value'] : '' !!}</textarea>
  </div>
