@extends('Admin.layout.master')
@section('title', __('messages.Education'))
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
                    <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.add_new_education') }}</strong></h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body mb-2">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('education.store') }}">
                        @csrf
                        <input type="hidden" id="profile_id" name="profile_id" value="{{$profile->id}}">
                        <div class="card col-12">
                            <div class="row">
                                <div class="form-group col-5">
                                    <label class="title_style4">{{ __('messages.title') }}:<i class="required_style1">*</i>
                                    </label>
                                    <input type="text" id="title" name="title" class="form-control" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Title') }}." >
                                </div>
                                <div class="form-group col-5">
                                    <label class="title_style4">{{ __('messages.subtitle') }}:<i class="required_style1"></i>
                                    </label>
                                    <input type="text" id="subtitle" name="subtitle" class="form-control" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Subtitle') }}.">
                                </div>
                                <div class="form-group col-2">
                                    <label class="title_style4">{{ __('messages.gpa') }}:<i class="required_style1"></i>
                                    </label>
                                    <input type="text" id="gpa" name="gpa" class="form-control" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_GPA') }}.">
                                </div>
                                <div class="form-group col-5">
                                    <label class="title_style4">{{ __('messages.start_date') }}:<i class="required_style1"></i>
                                    </label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" style="font-size: 12px" value="{{date('Y-m-d')}}" placeholder="{{ __('messages.Please_Enter_Your_Start_Date') }}.">
                                </div>
                                <div class="form-group col-5">
                                    <label class="title_style4">{{ __('messages.end_date') }}:<i class="required_style1"></i>
                                    </label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" style="font-size: 12px" value="{{date('Y-m-d')}}" placeholder="{{ __('messages.Please_Enter_Your_End_Date') }}.">
                                </div>
                                <div class="form-group col-12">
                                    <label class="title_style4">{{ __('messages.description') }}:<i class="required_style1"></i>
                                    </label>
                                    <textarea class="form-control"  id="description" name="description" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Description') }}."></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">{{ __('messages.send') }}</button>
                                <button class="btn btn-secondary" href="{{ route('education.create') }}" type="reset">{{ __('messages.refresh') }}</button>
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
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.Educations') }}</strong></h2>
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
                                        <th>{{ __('messages.title')}}</th>
                                        <th>{{ __('messages.subtitle')}}</th>
                                        <th>{{ __('messages.description')}}</th>
                                        <th>{{ __('messages.GPA')}}</th>
                                        <th>{{ __('messages.Period')}}</th>
                                        <th>{{ __('messages.state')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tablecontents" >
                                    @foreach ($educations as $education)
                                        <tr class="row1" data-index="{!! $education->id !!}">
                                            <td class="align-middle">
                                                {{ Str::limit( $education->title, 30) }}
                                            </td>
                                            <td class="align-middle">
                                                {{ Str::limit( $education->subtitle, 30) }}
                                            </td>
                                            <td class="align-middle">
                                                {{ Str::limit( $education->description, 100) }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $education->GPA }}
                                            </td>
                                            <td class="align-middle">
                                                <?php $v = new Verta($education->created_at); ?>
                                                <?php $v1 = new Verta($education->updated_at); ?>
                                                {{ $v->format('j %B Y') }}-{{ $v1->format('j %B Y') }}
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('education.destroy', ['education' => $education->id]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden"  id="id" name="id" value="{{$education->id}}">
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
