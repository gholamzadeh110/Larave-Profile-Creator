<!-- About-->
<section class="resume-section" id="about">
    <div class="resume-section-content">
        <h1 class="mb-0">
            {{ $profile->name }}
            <span class="text-primary"> {{ $profile->family }}</span>
        </h1>
        <div class="subheading mb-5">
            {{ $profile->address }} · {{ $profile->mobile }} ·
            <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
        </div>
        <p class="lead mb-5">{{ $profile->description }}</p>
        <div class="social-icons">
            @foreach($profile->Contacts as $contact)
                <a class="social-icon" href="{{$contact->link}}"><i class="{{$contact->avatar}}"></i></a>
            @endforeach
        </div>
    </div>
</section>
<hr class="m-0" />
