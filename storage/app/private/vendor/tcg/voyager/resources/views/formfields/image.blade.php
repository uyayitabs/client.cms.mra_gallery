@php $className = (new ReflectionClass($dataTypeContent))->getShortName(); @endphp
@if(isset($dataTypeContent->{$row->field}))
    <div data-field-name="{{ $row->field }}">
        <a href="#" class="voyager-x remove-single-image" style="position:absolute;"></a>
        @php
            $image = '';
            switch ($className) {
                case 'Photo':
                   $s3KeyName = $dataTypeContent->thumbnail('small');
                    if (isProduction()) {
                        $s3KeyName = $dataTypeContent->s3_key_name_directory . "/" . \Illuminate\Support\Facades\File::basename($dataTypeContent->thumbnail('small'));
                    }
                    $image = getS3Image($s3KeyName);
                    break;
                default:
                    $image = Voyager::image($dataTypeContent->{$row->field});
                    break;
            }
        @endphp
        <img src="{{$image}}"
          data-file-name="{{ $dataTypeContent->{$row->field} }}" data-id="{{ $dataTypeContent->getKey() }}"
          style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
    </div>
@endif
<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" name="{{ $row->field }}" accept="image/*">
