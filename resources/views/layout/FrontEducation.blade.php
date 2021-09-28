@if( $profile->educations->count())
    <section class="resume-section" id="education">
    <div class="resume-section-content">
        <h2 class="mb-5">Education</h2>
        @foreach($profile->educations as $education)
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">{{$education->title}}</h3>
                    <div class="subheading mb-3">{{$education->subtitle}}</div>
                    <div>{{$education->description}}</div>
                    <p>GPA: {{$education->GPA}}</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">{{\Carbon\Carbon::parse($education->start_date)->format('F, Y')}}-{{\Carbon\Carbon::parse($education->end_date)->format('F, Y')}}</span></div>
            </div>
        @endforeach
    </div>
</section>
<hr class="m-0" />
@endif
