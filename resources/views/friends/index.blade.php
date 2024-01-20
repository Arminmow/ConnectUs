@extends('templates.default')

@section('content')
    <div class="row">


        <div class="card-body" style="width:50%;">
            <h2 class="card-subtitle mb-2 text-muted">Your Friends</h2>
            <ul class="list-group">
                @if(!$friends->count())
                    <p>you have no friends :)</p>
                @else
                    @foreach($friends as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center" >
                            <div class="d-flex align-items-center" style="display: flex; justify-content: space-between; width: 100%">
                                <a class="pull-left" href="{{ route('profile.index' , ['username' => $user->username]) }}" >
                                    <img class="media-project" alt="" src="{{ $user->getAvatarUrl() }}" style="border-radius: 30%">
                                </a>
                                <h6 class="card-title"><a href="{{ route('profile.index' , ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a></h6>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>


{{--        <div class="col-lg-6">--}}
{{--            <h4>Friend requests</h4>--}}

{{--            @if(!$requests->count())--}}
{{--                <p>You have no friend requests.</p>--}}
{{--            @else--}}
{{--                @foreach($requests as $user)--}}
{{--                    @include('user.partials.userblock')--}}
{{--                @endforeach--}}

{{--            @endif--}}

{{--        </div>--}}

        <div class="card-body" style="width:50%;">
            <h2 class="card-subtitle mb-2 text-muted">Friend Requests</h2>
            <ul class="list-group">
                @if(!$requests->count())
                    <p>You have no friend requests.</p>
                @else
                    @foreach($requests as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center" >
                            <div class="d-flex align-items-center" style="display: flex; justify-content: space-between; width: 100%">
                                <a class="pull-left" href="{{ route('profile.index' , ['username' => $user->username]) }}" >
                                    <img class="media-project" alt="" src="{{ $user->getAvatarUrl() }}" style="border-radius: 30%">
                                </a>
                                <h6 class="card-title"><a href="{{ route('profile.index' , ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a></h6>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>

    </div>
@stop
