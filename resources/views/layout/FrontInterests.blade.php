@if( $profile->interests->count())
    <section class="resume-section" id="interests">
    <div class="resume-section-content">
        <h2 class="mb-5">Interests</h2>
        @foreach($profile->interests as $interest)
            <p>{{$interest->description}}</p>
        @endforeach
    </div>
</section>
<hr class="m-0" />
@endif
