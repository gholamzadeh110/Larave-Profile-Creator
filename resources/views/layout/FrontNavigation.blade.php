<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">{{$profile->name. ' '. $profile->family}}</span>
        <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset("/uploads/profiles/$profile->image")}}" alt="..." /></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">{{ __('messages.About')}}</a></li>
            @if( $profile->experiences->count())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">{{ __('messages.Experience')}}</a></li>
            @endif
            @if( $profile->projects->count())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">{{ __('messages.Projects')}}</a></li>
            @endif
            @if( $profile->educations->count())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">{{ __('messages.Education')}}</a></li>
            @endif
            @if( $profile->skills->count())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">{{ __('messages.Skills')}}</a></li>
            @endif
            @if( $profile->interests->count())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">{{ __('messages.Interests')}}</a></li>
            @endif
            @if($profile->awards->count())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">{{ __('messages.Awards')}}</a></li>
            @endif
            @if($profile->donates->count())
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#donate">{{ __('messages.Donate')}}</a></li>
            @endif
        </ul>
    </div>
</nav>
