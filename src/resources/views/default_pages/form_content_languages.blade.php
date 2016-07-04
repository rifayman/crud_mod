<div class="">

    @if(isset($crud['fields']['normal']))
        @foreach ($crud['fields']['normal'] as $field)
            @if(is_array($field))
                <!-- load the view from the application if it exists, otherwise load the one in the package -->
                @if(view()->exists('crud::fields.'.$field['type']))
                    @include('crud::fields.'.$field['type'], ['field' => $field])
                @else
                    @include('crud::fields.'.$field['type'], ['field' => $field])
                @endif
            @endif
        @endforeach
    @endif

    @if(isset($crud['fields']['translate']))

        <ul class="nav nav-tabs nav-tabs-simple">
            <?php $x = 0; ?>
            @foreach($crud["languages"] as $language)
                <li class="{{ ($x == 0) ? 'active' : '' }}">
                    <a data-toggle="tab" href="#tab_{{$language["iso"]}}">{{$language["language"]}}</a>
                </li>
                <?php $x++; ?>
            @endforeach

        </ul>
        <div class="tab-content">
            <?php $x = 0; ?>
            <form role="form">
                @foreach($crud["languages"] as $language)
                    <div class="tab-pane {{ ($x == 0) ? 'active' : '' }}" id="tab_{{$language["iso"]}}">
                        <?php $lng = $language["iso"]; ?>

                        <?php $section = ""; ?>
                        <?php $y = 0 ?>
                        @foreach ($crud['fields']['translate'][$lng] as $field)
                            @if(is_array($field))
                            <?php /* dd($crud['fields']['translate']); */ ?>
                                {{--splits by sections--}}

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

                                    {{--  load the view from the application if it exists, otherwise load the one in the package --}}
                                    @if(view()->exists('crud::fields.'.$field['type']))
                                        @include('crud::fields.'.$field['type'], ['field' => $field, 'language' => $language])
                                    @else
                                        @include('crud::fields.'.$field['type'], ['field' => $field, 'language' => $language])
                                    @endif
                                    <?php $y++; ?>
                                    @endif
                                @endforeach
                            </div>
                            <?php $x++; ?>
                        @endforeach
                    </form>
                </div>
            @endif
        </div>

        {{-- For each form type, load its assets, if needed --}}
{{-- But only once per field type (no need to include the same css/js files multiple times on the same page) --}}
<?php
$loaded_form_types_css = array();
$loaded_form_types_js = array();

?>

@section('styles')

        <!-- FORM CONTENT CSS ASSETS -->

        
    @if(isset($crud['fields']['normal']))
        @foreach ($crud['fields']["normal"] as $field)
            @if(!isset($loaded_form_types_css[$field['type']]) || $loaded_form_types_css[$field['type']]==false)
                @if (View::exists('crud::fields.assets.css.'.$field['type'], ['field' => $field]))
                    @include('crud::fields.assets.css.'.$field['type'], ['field' => $field])
                        <?php $loaded_form_types_css[$field['type']] = true; ?>
                @elseif (View::exists('crud::fields.assets.css.'.$field['type'], ['field' => $field]))
                    @include('crud::fields.assets.css.'.$field['type'], ['field' => $field])
                <?php $loaded_form_types_css[$field['type']] = true; ?>
                @endif
            @endif
        @endforeach
    @endif
    @if(isset($crud['fields']['translate']))
        @foreach($crud["languages"] as $language)
            <?php $lng = $language["iso"]; ?>
            @foreach ($crud['fields']["translate"][$lng] as $field )
                @if(!isset($loaded_form_types_css[$field['type']]) || $loaded_form_types_css[$field['type']]==false)
                    @if (View::exists('crud::fields.assets.css.'.$field['type'], ['field' => $field]))
                        @include('crud::fields.assets.css.'.$field['type'], ['field' => $field])
                        <?php $loaded_form_types_css[$field['type']] = true; ?>
                    @elseif (View::exists('crud::fields.assets.css.'.$field['type'], ['field' => $field]))
                         @include('crud::fields.assets.css.'.$field['type'], ['field' => $field])
                    <?php $loaded_form_types_css[$field['type']] = true; ?>
                    @endif
                @endif
            @endforeach
        @endforeach
    @endif
@endsection

@section('scripts')
        <!-- FORM CONTENT JAVSCRIPT ASSETS -->
    <?php
        $fieldsScripts;
        if(isset($crud['fields']['normal'])){
            foreach($crud['fields']["normal"] as $field ){
                if(view()->exists('vendor.infinety.crud.fields.assets.js.'.$field['type'] )){
                    $fieldsScripts["normal"][ $field['type'] ][] = $field;
                } elseif(view()->exists('crud::fields.assets.js.'.$field['type'])){
                    $fieldsScripts["normal"][ $field['type'] ][] = $field;
                }
            }
        }
        if(isset($crud['fields']['translate'])){
            foreach($crud["languages"] as $language){
                foreach($crud['fields']["translate"][$language["iso"]] as $field ){
                    if(View::exists('crud::fields.assets.js.'.$field['type'] )){
                        $fieldsScripts["translate"][ $field['type'] ]["lang"][ $language["iso"] ][] = $field;
                    } elseif(View::exists('crud::fields.assets.js.'.$field['type'])){
                        $fieldsScripts["translate"][ $field['type'] ]["lang"][ $language["iso"] ][] = $field;
                    }
                }
            }
        }
    ?>
    @if(isset($fieldsScripts["normal"]))
        @foreach($fieldsScripts["normal"] as $type => $typeFields)
            @if (View::exists('vendor.infinety.crud.fields.assets.js.'.$type))
                @include('vendor.infinety.crud.fields.assets.js.'.$type, ['fields' => $typeFields])
            @elseif (View::exists('crud::fields.assets.js.'.$type))
                @include('crud::fields.assets.js.'.$type, ['fields' => $typeFields])
            @endif
        @endforeach
    @endif
    @if(isset($fieldsScripts["translate"]))
        @foreach($fieldsScripts["translate"] as $type => $typeFields)
            @if (View::exists('vendor.infinety.crud.fields.assets.js.'.$type))
                @include('vendor.infinety.crud.fields.assets.js.'.$type, ['fields' => $typeFields])
            @elseif (View::exists('crud::fields.assets.js.'.$type))
                @include('crud::fields.assets.js.'.$type, ['fields' => $typeFields])
            @endif
        @endforeach
    @endif
    @if(isset($crud['fields']['translate']))
        <script type="application/javascript">
                    @foreach($crud["languages"] as $language)
                        var data = $("#tab_{{$language["iso"]}}");
            data.find(".form-group").each(function () {
                $(this).find("> *").each(function () {
                    var inp = $(this).attr('name');
                    if (inp) {
                        $(this).attr('name', "translate[{{$language["iso"]}}][" + inp + "]");
                    }
                });

            });
            @endforeach
        </script>
    @endif


@endsection