@if($profile->experiences->count())
<section class="resume-section" id="experience">
    <div class="resume-section-content">
        <h2 class="mb-5">Experience</h2>
        @foreach($profile->experiences as $experience)
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">{{$experience->title}}</h3>
                    <div class="subheading mb-3">{{$experience->subtitle}}</div>
                    <p>{{$experience->desciption}}</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">{{$experience->date}}</span></div>
            </div>
        @endforeach
    </div>
</section>
<hr class="m-0" />
@endif
