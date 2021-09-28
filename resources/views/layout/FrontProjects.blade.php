@if($profile->projects->count())
    <section class="resume-section" id="projects">
        <div class="resume-section-content">
            <h2 class="mb-5">{{ __('messages.Projects')}}</h2>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="row">
                        @foreach($profile->projects as $project)
                        <div class="form-group col-6">
                            <div class="blogitem mb-5">
                                <div class="blogitem-image">
                                    <a href="{{$project->link}}"><img src="{{URL::asset('/uploads/projects/'.$project->image)}}"  alt="{{$project->title}}" style="max-width: 100%;max-height: 100%"></a>
                                </div>
                                <div class="blogitem-content">
                                    <h5>
                                        <a href="{{$project->link}}">{{$project->title}}</a></h5>
                                    <p>{{$project->description}}</p>
                                    <a href="{{$project->link}}" class="btn btn-info">{{ __('messages.see_site')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
</section>
<hr class="m-0" />
@endif
