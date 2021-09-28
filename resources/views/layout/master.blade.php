<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta-->
        @include('layout.FrontMeta')
        <!-- Title-->
        <title>@yield('title')</title>
        <!-- CSS-->
        @include('layout.FrontCSS')
    </head>
    <body id="page-top">
        <a class="ab-item" href="{{route('login')}}">Log In</a>
        <a class="ab-item" href="{{route('register')}}">Register</a>
            @include('layout.FrontNavigation')
{{--        <div class="container-fluid p-0">--}}
            <!-- About-->
            @include('layout.FrontAbout')
            <!-- Experience-->
            @include('layout.FrontExperience')
            <!-- Wrok Samlpes-->
            @include('layout.FrontProjects')
            <!-- Education-->
            @include('layout.FrontEducation')
            <!-- Skills-->
            @include('layout.FrontSkills')
            <!-- Interests-->
            @include('layout.FrontInterests')
            <!-- Awards-->
            @include('layout.FrontAwards')
            <!-- Donate-->
            @include('layout.FrontDonate')
{{--        </div>--}}
        <!-- FrontJS-->
        @include('layout.FrontJS')
    </body>
</html>
