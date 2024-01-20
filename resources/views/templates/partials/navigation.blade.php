<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">

    <div class="container">

        <!-- nav header -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="text-primary font-weight-bold" style="font-size: 24px;">Connect</span><span
                    class="text-danger" style="font-size: 30px; font-weight: bold;">Us</span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: space-between">

            <!-- if user is signed in -->
            @if (Auth::check())

                <!-- nav items -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('home') }}">TimeLine</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="{{ route('profile.index' , ['username' => Auth::user()->username]) }}"
                           id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            {{ Auth::user()->getNameOrUsername() }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{ route('profile.index' , ['username' => Auth::user()->username]) }} ">Profile</a>
                            <a class="dropdown-item" href="{{ route('friends.index') }}">Friends</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Update profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{  route('auth.signout') }}">Sign out</a>
                        </div>
                    </li>
                    {{--                    <li class="nav-item"><a class="dropdown-item" href="{{ route('profile.index' , ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>--}}
                    {{--                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Update Profile</a></li>--}}
                    {{--                    <li class="nav-item"><a class="nav-link" href="{{  route('auth.signout') }}">Sign out</a></li>--}}
                </ul>

                <!-- nav search -->
                <form class="form-inline my-2 my-lg-0" action="{{ route('search.results') }}">
                    <div class="input-group" style="gap: 10px">
                        <input class="form-control" type="text" name="query" placeholder="Find People"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>

            @else

                <!-- if user is NOT signed in -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('auth.signup') }}">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('auth.signin') }}">Sign In</a></li>
                </ul>

            @endif

        </div>

    </div>

</nav>
