@if( $profile->donates->count())
    <section class="resume-section" id="donate">
    <div class="resume-section-content">
        <h2 class="mb-5">Support/Donate</h2>
        @foreach($profile->donates as $donate)
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">{{$donate->title}}</h3>
                    <div class="subheading mb-3">{{$donate->description}}</div>
                    <div>{{$donate->link}}</div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<hr class="m-0" />
@endif
