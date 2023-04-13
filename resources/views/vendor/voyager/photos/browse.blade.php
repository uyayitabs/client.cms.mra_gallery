@php $authUser = Auth::user(); @endphp
@php $authUserRole = $authUser->role->name ?? null; @endphp

@extends('voyager::bread.browse')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        </h1>
        @can('add', app($dataType->model_name))
            @php 
                $addRoute = route('voyager.'.$dataType->slug.'.create', ['previous_url' => Request::fullUrl()]); 
                $addBulkRoute = route('voyager.bulk-photos.create', ['previous_url' => Request::fullUrl()]); 
            @endphp
            <a href="{{ $addRoute }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Add Photo</span>
            </a>
            <a href="{{ $addBulkRoute }}" class="btn btn-info btn-add-new">
                <i class="voyager-plus"></i> <span>Add Bulk Photos</span>
            </a>
        @endcan
        
    </div>
@endsection

@section('content')
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    
                    <!-- TODO: Modify search fields (dynamic search / dropdown per User/photographer, Event, Category) -->
                    @if ($isServerSide)
                        <form method="get" class="form-search">
                            <div id="search-input">
                                <div class="col-2">
                                    <select id="search_key" name="key">
                                        @foreach($searchNames as $key => $name)
                                            <option value="{{ $key }}" @if($search->key == $key || (empty($search->key) && $key == $defaultSearchKey)) selected @endif>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select id="filter" name="filter">
                                        <option value="contains" @if($search->filter == "contains") selected @endif>contains</option>
                                        <option value="equals" @if($search->filter == "equals") selected @endif>=</option>
                                    </select>
                                </div>
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control" placeholder="{{ __('voyager::generic.search') }}" name="s" value="{{ $search->value }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            @if (Request::has('sort_order') && Request::has('order_by'))
                                <input type="hidden" name="sort_order" value="{{ Request::get('sort_order') }}">
                                <input type="hidden" name="order_by" value="{{ Request::get('order_by') }}">
                            @endif
                        </form>
                        <h4>{{$search->value}}</h4>
                    @endif



                    <!-- Thumbnail table goes here... -->
                    <div class="row text-center text-lg-start mt-3">
                        @foreach($dataTypeContent as $data) 
                        
                        {{-- TODO: Optimize using Eloquent relationship --}}
                        @php
                            $photographer = \App\Models\User::find($data->photographer_id);
                            $event = \App\Models\Event::find($data->event_id);
                            $category = \App\Models\Category::find($data->category_id);
                            $eventDate = \Carbon\Carbon::parse($event->date)->format('F d, Y');
                            $thumbnailS3KeyName = $data->thumbnail('small');
                            if (isProduction()) {
                                $thumbnailS3KeyName = $data->s3_key_name_directory . "/" . \Illuminate\Support\Facades\File::basename($data->thumbnail('small'));
                            }                    
                        @endphp 

                        <div class="col-lg-2 col-md-3 col-3 m-0">
                            {{-- admin | photographer --}}
                            @if (in_array($authUserRole, ['admin', 'photographer']))
                                @if (!$data->is_public)
                                    <span style="position: absolute; top: 41%; left: 42%; font-size: 36px; color: #fff;"><i class="voyager-lock"></i></span>    
                                @endif                                
                                <a href="{{config('app.url')}}/gallery/photos/{{$data->id}}" class="d-block mb-2 h-100">
                                    <img class="img-fluid img-thumbnail" src="{{getS3Image($thumbnailS3KeyName)}}" alt="{{$data->title}}" title="<p>&#127950; {{$event->name}}<br>&#128197; {{$eventDate ?? ''}}<br>&#127967; {{$event->venue->name}}<br> &#128247; {{$photographer->name ?? ''}} <br> &#128279; {{$category->name}} <br> [{{$data->is_public ? 'Public' : 'Private'}} Photo]</p>" style="min-widht: 250px; max-width:250px; max-height: 132px; min-height: 132px; object-fit: cover; width: 100%; height: 100%;">
                                </a>                            
                            {{-- category user --}}
                            @else 
                                @if ($data->is_public)
                                    <a href="{{config('app.url')}}/gallery/photos/{{$data->id}}" class="d-block mb-2 h-100">
                                    <img class="img-fluid img-thumbnail" src="{{getS3Image($thumbnailS3KeyName)}}" alt="{{$data->title}}" title="<p>&#127950; {{$event->name}}<br>&#128197; {{$eventDate ?? ''}}<br>&#127967; {{$event->venue->name}}<br> &#128247; {{$photographer->name ?? ''}} <br> &#128279; {{$category->name}} <br> [Public Photo]</p>" style="min-widht: 250px; max-width:250px; max-height: 132px; min-height: 132px; object-fit: cover; width: 100%; height: 100%;">
                                    </a>
                                @else
                                    <span style="position: absolute; top: 41%; left: 42%; font-size: 36px; color: #fff;"><i class="voyager-lock"></i></span>

                                    <img class="img-fluid img-thumbnail" src="{{getS3Image($thumbnailS3KeyName)}}" alt="{{$data->title}}" title="<p>&#127950; {{$event->name}}<br>&#128197; {{$eventDate ?? ''}}<br>&#127967; {{$event->venue->name}}<br> &#128247; {{$photographer->name ?? ''}} <br> &#128279; {{$category->name}} <br> [Private Photo]</p>" style="min-widht: 250px; max-width:250px; max-height: 132px; min-height: 132px; object-fit: cover; width: 100%; height: 100%;">
                                @endif                                
                            @endif                            
                        </div>
                        @endforeach
                    </div>
                    <div class="row">

                        @if ($isServerSide)
                            <div class="col-sm-6 pull-left">
                                <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ]) }}</div>
                            </div>
                            <div class="col-sm-6 pull-right">
                                {{ $dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder,
                                    'showSoftDeleted' => $showSoftDeleted,
                                ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Single delete modal --}}
<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
            </div>
            <div class="modal-footer">
                <form action="#" id="delete_form" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('css')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
    <style>
    .ui-tooltip {
        width: 360px;
    }
    .ui-tooltip-content {
        font-size: 12px;
        font-family: "Open Sans", sans-serif;
    }
    </style>
@stop

@section('javascript')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
    {{-- DISABLED  disable-devtool.min.js--}}
    {{-- @if (config('app.env') !== 'local')
    <script disable-devtool-auto src='https://fastly.jsdelivr.net/npm/disable-devtool/disable-devtool.min.js'></script>
    @endif --}}
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        // Disable right-click (not so good hack :p)
        window.oncontextmenu = function () {
            return false;
        };

        $(document).ready(function () {
             $(document).tooltip({
                content: function () {
                    return $(this).prop('title');
                }
            });
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [
                            ['targets' => 'dt-not-orderable', 'searchable' =>  false, 'orderable' => false],
                        ],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    width: '125px',
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', '__id') }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>
@stop