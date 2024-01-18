<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="text-primary font-weight-bold" style="font-size: 24px;">Connect</span><span class="text-danger" style="font-size: 30px; font-weight: bold;">Us</span>
            </a>
        </div>
        <div class="collapse navbar-collapse justify-content-between">
            @if (Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">TimeLine</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('friends.index') }}">Friends</a></li>
                    <li>
                        <form class="form-inline my-2 my-lg-0" action="{{ route('search.results') }}">
                            <div class="input-group" style="gap: 10px">
                                <input class="form-control" type="text" name="query" placeholder="Find People" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>

            @endif
            @if (Auth::check())
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.index' , ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Update Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{  route('auth.signout') }}">Sign out</a></li>
                </ul>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('auth.signup') }}">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('auth.signin') }}">Sign In</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>
