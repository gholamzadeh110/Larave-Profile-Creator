@if($profile->skills->count())
    <section class="resume-section" id="skills">
    <div class="resume-section-content">
        <h2 class="mb-5">Skills</h2>
        <div class="subheading mb-3">{{ __('messages.Programming_Languages')}}</div>
        <ul class="list-inline dev-icons">
            @foreach($profile->skills as $skill)
                <li class="list-inline-item"><i class="{{$skill->avatar}}"></i></li>
            @endforeach
        </ul>
        @if($profile->workflows->count())
            <div class="subheading mb-3">{{ __('messages.Workflow')}}</div>
            <ul class="fa-ul mb-0">
                @foreach($profile->workflows as $workflow)
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        {{$workflow->description}}
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
</section>
<hr class="m-0" />
@endif
