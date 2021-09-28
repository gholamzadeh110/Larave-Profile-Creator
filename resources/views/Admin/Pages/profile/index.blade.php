@extends('Admin.layout.master')
@section('title', 'Profile')
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
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.Edit_Your_Profile') }}</strong></h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body mb-2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('profile.store') }}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$profile->id}}">
                    <div class="card col-12">
                        <div class="row">
                            <div class="form-group col-3">
                                <a class="navbar-brand js-scroll-trigger" href="#page-top">
                                    <span class="d-block d-lg-none"></span>
                                    <span class="d-none d-lg-block">
                                        <img class="file-upload-image img-fluid img-profile rounded-circle mx-auto mb-2"  src="{{asset("/uploads/profiles/$profile->image")}}" onclick="$('.file-upload-input').trigger( 'click' )" alt="..." />
                                    </span>
                                </a>
                                <input class="file-upload-input form-group form-control"  type="file" name="profile_image" id="profile_image" class="form-control" onchange="readURL(this);" accept="image/*">
                            </div>
                            <div class="form-group col-9">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="title_style4">name:<i class="required_style1">*</i>
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control" style="font-size: 12px" placeholder="Please Enter Your Name." value="{{$profile->name}}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="title_style4">family:<i class="required_style1">*</i>
                                        </label>
                                        <input type="text" id="family" name="family" class="form-control" style="font-size: 12px" placeholder="Please Enter Your Family." value="{{$profile->family}}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="title_style4">mobile:<i class="required_style1">*</i>
                                        </label>
                                        <input type="text" id="mobile" name="mobile" class="form-control" style="font-size: 12px" placeholder="Please Enter Your Mobile." value="{{$profile->mobile}}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="title_style4">email:<i class="required_style1">*</i>
                                        </label>
                                        <input type="text" id="email" name="email" class="form-control" style="font-size: 12px" placeholder="Please Enter Your Email." value="{{$profile->email}}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="title_style4">Address:<i class="required_style1">*</i>
                                        </label>
                                        <input type="text" id="address" name="address" class="form-control" style="font-size: 12px" placeholder="Please Enter Your Address." value="{{$profile->address}}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="title_style4">Description:<i class="required_style1">*</i>
                                        </label>
                                        <textarea class="form-control"  id="description" name="description" style="font-size: 12px" placeholder="Please Enter Your Description.">{{$profile->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">ارسال</button>
                            <button class="btn btn-secondary" href="{{ route('profile.create') }}" type="reset">تنظیم مجدد</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.add_new_contacts') }}</strong></h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body mb-2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('contacts.store') }}">
                    @csrf
                    <input type="hidden" id="profile_id" name="profile_id" value="{{$profile->id}}">
                    <div class="card col-12">
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
                                    <th>{{ __('messages.avatar')}}</th>
                                    <th>{{ __('messages.title')}}</th>
                                    <th>{{ __('messages.link')}}</th>
                                    <th>{{ __('messages.create_date')}}</th>
                                    <th>{{ __('messages.update_date')}}</th>
                                    <th>{{ __('messages.state')}}</th>
                                </tr>
                                </thead>
                                <tbody id="tablecontents" >
                                @foreach ($contacts as $contact)
                                    <tr class="row1" data-index="{!! $contact->id !!}">
                                        <td class="align-middle">
                                            <div class="social-icons"><i class="{{$contact->avatar}}"></i></div>
                                        </td>
                                        <td class="align-middle">
                                            {{ Str::limit( $contact->title, 30) }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $contact->link }}
                                        </td>
                                        <td class="align-middle">
                                            <?php $v = new Verta($contact->created_at); ?>

                                            {{ $v->format('j %B Y') }}
                                        </td>
                                        <td class="align-middle">
                                            <?php $v1 = new Verta($contact->updated_at); ?>

                                            {{ $v1->format('j %B Y') }}
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden"  id="id" name="id" value="{{$contact->id}}">
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
