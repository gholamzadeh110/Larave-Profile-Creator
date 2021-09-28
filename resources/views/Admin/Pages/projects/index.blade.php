@extends('Admin.layout.master')
@section('title', __('messages.Projects'))
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.add_new_project') }}</strong></h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body mb-2">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('projects.store') }}">
                        @csrf
                        <input type="hidden" id="profile_id" name="profile_id" value="{{$profile->id}}">
                        <div class="card col-12">
                            <div class="row">
                                <div class="form-group col-2">
                                    <a class="navbar-brand js-scroll-trigger" href="#page-top">
                                        <span class="d-block d-lg-none"></span>
                                        <span class="d-none d-lg-block">
                                        <img class="file-upload-image img-fluid img-profile mx-auto "  src="{{asset("/uploads/profiles/$profile->image")}}" onclick="$('.file-upload-input').trigger( 'click' )" alt="..." />
                                    </span>
                                    </a>
                                    <input class="file-upload-input form-group form-control"  type="file" name="project_image" id="project_image" class="form-control" onchange="readURL(this);" accept="image/*">
                                </div>
                                <div class="form-group col-10">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="title_style4">{{ __('messages.title') }}:<i class="required_style1">*</i>
                                            </label>
                                            <input type="text" id="title" name="title" class="form-control" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Title') }}." >
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="title_style4">{{ __('messages.link') }}:<i class="required_style1"></i>
                                            </label>
                                            <input type="text" id="link" name="link" class="form-control" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Link') }}.">
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="title_style4">{{ __('messages.description') }}:<i class="required_style1"></i>
                                            </label>
                                            <textarea class="form-control"  id="description" name="description" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Description') }}."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">{{ __('messages.send') }}</button>
                                <button class="btn btn-secondary" href="{{ route('projects.create') }}" type="reset">{{ __('messages.refresh') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--   Items list --}}
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.Projects') }}</strong></h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body mb-2">
                    <input type="hidden" id="id" name="id" value="{{$profile->id}}">
                    <div class="card col-12">
                        <div class="table-responsive">
                            <div class="col-12">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;"  style="font-size: 12px">
                                    <thead>
                                    <tr>
                                        <th>{{ __('messages.image')}}</th>
                                        <th>{{ __('messages.title')}}</th>
                                        <th>{{ __('messages.description')}}</th>
                                        <th>{{ __('messages.link')}}</th>
                                        <th>{{ __('messages.create_date')}}</th>
                                        <th>{{ __('messages.update_date')}}</th>
                                        <th>{{ __('messages.state')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tablecontents" >
                                    @foreach ($projects as $project)
                                        <tr class="row1" data-index="{!! $project->id !!}">
                                            <td class="align-middle">
                                                @if( $project->image )
                                                    <img src="{{URL::asset('/uploads/projects/'.$project->image)}}" alt="profile Pic" height="50" width="50">
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                {{ Str::limit( $project->title, 30) }}
                                            </td>
                                            <td class="align-middle">
                                                {{ Str::limit( $project->description, 100) }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $project->link }}
                                            </td>
                                            <td class="align-middle">
                                                <?php $v = new Verta($project->created_at); ?>

                                                {{ $v->format('j %B Y') }}
                                            </td>
                                            <td class="align-middle">
                                                <?php $v1 = new Verta($project->updated_at); ?>

                                                {{ $v1->format('j %B Y') }}
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('projects.destroy', ['projects' => $project->id]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden"  id="id" name="id" value="{{$project->id}}">
                                                    <button type="submit" class="zmdi zmdi-delete"></button>
                                                </form>
                                            </td>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function(e) {
                $('.image-upload-wrap').hide();
                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();
                $('.image-title').html(input.files[0].name);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@stop
