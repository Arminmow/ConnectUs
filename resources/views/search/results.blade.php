@extends('templates.default')

@section('content')
    <h3>Your search for "{{ Request::input('query') }}"</h3>

    @if(!$users->count())
        <p>Sorry no results found :(</p>
    @else
        <div class="row" style="width: 50%;">
{{--            <div class="col-lg-12">--}}

{{--                @foreach($users as $user)--}}
{{--                    @include('user/partials/userblock')--}}
{{--                @endforeach--}}


{{--            </div>--}}

            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Friends</h6>
                <ul class="list-group">

                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center"
                                 style="display: flex; justify-content: space-between; width: 100%">
                                <a class="pull-left"
                                   href="{{ route('profile.index' , ['username' => $user->username]) }}">
                                    <img class="media-project" alt="" src="{{ $user->getAvatarUrl() }}"
                                         style="border-radius: 30%">
                                </a>
                                <h6 class="card-title"><a
                                        href="{{ route('profile.index' , ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a>
                                </h6>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
    @endif
@stop
