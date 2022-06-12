@section('title','Trang chủ')
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('users.layout.head')
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg fixed-top nav-custom" id="mainNav">
            @include('users.layout.navigation')
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            @include('users.layout.masthead')
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            @include('users.layout.about')
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            @include('users.layout.projects')
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            @include('users.layout.signup')
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            @include('users.layout.contact')
        </section>
        <!-- Footer-->
        @include('users.layout.footer')
    @include('users.layout.scripts')
    </body>
</html>
