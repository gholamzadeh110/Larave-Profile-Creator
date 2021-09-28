<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{route('dashboard.index')}}"><img src="../assets/images/logo.svg" width="25" alt="Gnew"><span class="m-l-10">Gnew.ir</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="http://www.gnew.ir"><img src="../assets/images/profile_av.jpg" alt="User"></a></div>
                    <div class="detail">
                        <h4>Abbas</h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </li>
            <li class="{{ Request::segment(1) === 'dashboard' ? 'active open' : null }}"><a href="{{route('dashboard.index')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('profile.index')}}"><i class="zmdi zmdi-account"></i><span>My Profile</span></a>
{{--            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('contacts.index')}}"><i class="zmdi zmdi-twitter"></i><span>Contacts</span></a></li>--}}
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('experience.index')}}"><i class="zmdi zmdi-amazon"></i><span>Experence</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('projects.index')}}"><i class="zmdi zmdi-github-alt"></i><span>Projects</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('education.index')}}"><i class="zmdi zmdi-youtube"></i><span>Education</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('skills.index')}}"><i class="zmdi zmdi-android"></i><span>Skills</span></a></li>
{{--            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('workflow.index')}}"><i class="zmdi zmdi-format-list-numbered"></i><span>Workflow</span></a></li>--}}
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('interests.index')}}"><i class="zmdi zmdi-bike"></i><span>Interests</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('awards.index')}}"><i class="zmdi zmdi-collection-item-1"></i><span>Awards</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('donate.index')}}"><i class="zmdi zmdi-money"></i><span>Donate</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('setting.index')}}"><i class="zmdi zmdi-settings"></i><span>Setting</span></a></li>
        </ul>
    </div>
</aside>
