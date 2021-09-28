@extends('Admin.layout.master')
@section('title', __('messages.Skills'))
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
@stop
@section('content')
{{--Skills--}}
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.add_new_skill') }}</strong></h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body mb-2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('skills.store') }}">
                    @csrf
                    <input type="hidden" id="profile_id" name="profile_id" value="{{$profile->id}}">
                    <div class="card col-12">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="title_style4">{{ __('messages.skill') }}:<i class="required_style1">*</i>
                                </label>
                                <input type="text" id="skill" name="skill" class="form-control" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Skill') }}." >
                            </div>
                            <div class="form-group col-6">
                                <label class="title_style4">{{ __('messages.percent') }}:<i class="required_style1"></i>
                                </label>
                                <input type="number" min="0" max="100" id="percent" name="percent" class="form-control" style="font-size: 12px" value="100">
                            </div>
                            <div class="form-group col-12">
                                <div class="row">
                                    <label class="title_style4">{{ __('messages.avatar') }}:<i class="required_style1"></i>
                                    </label>
                                    @foreach ($avatars as $value)
                                        <div class="form-group col-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="avatar" id="{{$value}}" value="{{$value}}" @if ($loop->first) checked @endif >
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    <div class="social-icons"><i class="{{$value}}"></i></div>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="state" name="state" value="1">
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">{{ __('messages.send') }}</button>
                            <button class="btn btn-secondary" href="{{ route('skills.create') }}" type="reset">{{ __('messages.refresh') }}</button>
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
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.Skills') }}</strong></h2>
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
                                        <th>{{ __('messages.avatar')}}</th>
                                        <th>{{ __('messages.skill')}}</th>
                                        <th>{{ __('messages.ability')}}</th>
                                        <th>{{ __('messages.create_date')}}</th>
                                        <th>{{ __('messages.update_date')}}</th>
                                        <th>{{ __('messages.state')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tablecontents" >
                                    @foreach ($skills as $skill)
                                        <tr class="row1" data-index="{!! $skill->id !!}">
                                            <td class="align-middle">
                                                <div class="social-icons"><i class="{{$skill->avatar}}"></i></div>
                                            </td>
                                            <td class="align-middle">
                                                {{ Str::limit( $skill->skill, 30) }}
                                            </td>
                                            <td class="align-middle">
                                                %{{ $skill->percent }}
                                            </td>
                                            <td class="align-middle">
                                                <?php $v = new Verta($skill->created_at); ?>
                                                {{ $v->format('j %B Y') }}
                                            </td>
                                            <td class="align-middle">
                                                <?php $v1 = new Verta($skill->updated_at); ?>
                                                {{ $v1->format('j %B Y') }}
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('skills.destroy', ['skill' => $skill->id]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden"  id="id" name="id" value="{{$skill->id}}">
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

{{--workflow--}}
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.add_new_workflow') }}</strong></h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body mb-2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('workflow.store') }}">
                    @csrf
                    <input type="hidden" id="profile_id" name="profile_id" value="{{$profile->id}}">
                    <div class="card col-12">
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="title_style4">{{ __('messages.description') }}:<i class="required_style1">*</i>
                                </label>
                                <input type="text" id="description" name="description" class="form-control" style="font-size: 12px" placeholder="{{ __('messages.Please_Enter_Your_Description') }}." >
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">{{ __('messages.send') }}</button>
                            <button class="btn btn-secondary" href="{{ route('workflow.create') }}" type="reset">{{ __('messages.refresh') }}</button>
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
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.Workflow') }}</strong></h2>
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
                                    <th>{{ __('messages.description')}}</th>
                                    <th>{{ __('messages.create_date')}}</th>
                                    <th>{{ __('messages.update_date')}}</th>
                                    <th>{{ __('messages.state')}}</th>
                                </tr>
                                </thead>
                                <tbody id="tablecontents" >
                                @foreach ($workflows as $workflow)
                                    <tr class="row1" data-index="{!! $workflow->id !!}">
                                        <td class="align-middle">
                                            {{ Str::limit( $workflow->description, 100) }}
                                        </td>
                                        <td class="align-middle">
                                            <?php $v = new Verta($workflow->created_at); ?>

                                            {{ $v->format('j %B Y') }}
                                        </td>
                                        <td class="align-middle">
                                            <?php $v1 = new Verta($workflow->updated_at); ?>

                                            {{ $v1->format('j %B Y') }}
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('workflow.destroy', ['workflow' => $workflow->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden"  id="id" name="id" value="{{$workflow->id}}">
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
