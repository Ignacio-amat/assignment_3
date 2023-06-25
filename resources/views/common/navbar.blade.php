<nav class="navbar is-primary  has-text-white" >
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">--}}
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <strong><i class="fas fa-graduation-cap"></i> HZ</strong>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a href="{{ route('dashboard') }}"
                   class="navbar-item {{ Request::route()->getName() === 'home' ? "is-active" : "" }}">
                    Home
                </a>
                <a href="{{ route('foos.index') }}"
                   class="navbar-item {{ Request::route()->getName() === 'foo.index' ? "is-active" : "" }}">
                    Foo
                </a>
            </div>
        </div>
    </div>
</nav>


