@extends('templates.default')

@section('content')
    {{--    <div class="row">--}}
    {{--        <div class="col-lg-5">--}}
    {{--            @include('user.partials.userblock')--}}
    {{--            <hr>--}}

    {{--            @if(!$statuses->count())--}}
    {{--                <p>{{ $user->getNameOrUsername() }} hasn't posted anything yet.</p>--}}
    {{--            @else--}}
    {{--                @foreach($statuses as $status)--}}

    {{--                    <div class="row justify-content-center">--}}
    {{--                        <div class="col-md-6">--}}
    {{--                            <div class="card mb-4 shadow">--}}
    {{--                                <div--}}
    {{--                                    class="card-header d-flex justify-content-between align-items-center bg-primary text-white">--}}
    {{--                                    <div class="d-flex align-items-center">--}}
    {{--                                        <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">--}}
    {{--                                            <img src="{{ $status->user->getAvatarUrl() }}" alt="Profile Image" class="rounded-circle me-2"--}}
    {{--                                                 style="width: 40px; height: 40px;">--}}
    {{--                                        </a>--}}
    {{--                                        <a href="{{ route('profile.index', ['username' => $status->user->username]) }}" style="color: white">--}}
    {{--                                            <span class="fw-bold">{{ $status->user->getNameOrUsername() }}</span>--}}
    {{--                                        </a>--}}

    {{--                                    </div>--}}
    {{--                                    <small class="text-muted">{{ $status->created_at->diffForHumans() }}</small>--}}
    {{--                                </div>--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p class="card-text">{{ $status->body }}    </p>--}}


    {{--                                    <!-- Reply Form for Main Reply  -->--}}

    {{--                                    <div class="reply-form bg-light p-3 mb-3">--}}
    {{--                                        <h5 class="card-title mb-3">Reply to {{ $status->user->getNameOrUsername() }}'s Status</h5>--}}
    {{--                                        <form role="form" method="post" action="{{ route('status.reply' , ['statusId' =>$status->id ]) }}">--}}
    {{--                                            <div class="mb-3">--}}
    {{--                                            <textarea class="form-control{{ $errors->has("reply-". $status->id) ? ' is-invalid' : '' }}" rows="2"--}}
    {{--                                                      placeholder="Write your reply" name="reply-{{ $status->id }}"></textarea>--}}
    {{--                                            </div>--}}
    {{--                                            <input type="submit" class="btn btn-success mt-2" value="Submit Reply">--}}
    {{--                                            <input type="hidden" name="_token" value="{{ Session::token() }}">--}}
    {{--                                        </form>--}}
    {{--                                    </div>--}}



    {{--                                    <!-------------------------------------- Replies ----------------------------------------->--}}
    {{--                                    @foreach($status->replies as $reply)--}}

    {{--                                        <div class="card mb-3">--}}
    {{--                                            <div class="card-header d-flex justify-content-between align-items-center">--}}
    {{--                                                <div class="d-flex align-items-center">--}}
    {{--                                                    <img src="{{ $reply->user->getAvatarUrl() }}" alt="Profile Image" class="rounded-circle me-2"--}}
    {{--                                                         style="width: 30px; height: 30px;">--}}
    {{--                                                    <span class="fw-bold">{{ $reply->user->getNameOrUsername() }}</span>--}}
    {{--                                                </div>--}}
    {{--                                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="card-body">--}}
    {{--                                                <p class="card-text">{{ $reply->body }}</p>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="card-footer d-flex justify-content-end align-items-center bg-light">--}}
    {{--                                                <div class="d-flex align-items-center">--}}
    {{--                                                    --}}{{--                                                <span class="text-muted me-2">8 likes</span>--}}
    {{--                                                    <span class="text-muted me-2">{{ $reply->likes->count() }} Likes</span>--}}
    {{--                                                    @if($reply->user_id !== Auth::user()->id)--}}
    {{--                                                        <a class="btn btn-primary btn-sm" href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a>--}}
    {{--                                                    @endif--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}

    {{--                                    @endforeach--}}

    {{--                                </div>--}}
    {{--                                <div class="card-footer d-flex justify-content-between align-items-center bg-light">--}}
    {{--                                    <div class="d-flex align-items-center">--}}
    {{--                                        @if($status->user_id !== Auth::user()->id)--}}
    {{--                                            <a class="btn btn-primary btn-sm" href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>--}}
    {{--                                        @endif--}}

    {{--                                        <span class="text-muted">{{ $status->likes->count() }} Likes</span>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <!------------------------------------------ Old --------------------------------------------->--}}
    {{--                            --}}{{--                        <div class="container mt-4">--}}
    {{--                            --}}{{--                            <div class="card">--}}
    {{--                            --}}{{--                                <div class="card-body">--}}
    {{--                            --}}{{--                                    <!-- User Profile Image -->--}}
    {{--                            --}}{{--                                    <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">--}}
    {{--                            --}}{{--                                        <img src="{{ $status->user->getAvatarUrl() }}"--}}
    {{--                            --}}{{--                                             alt="{{ $status->user->getNameOrUsername() }}" class="img-fluid rounded-circle"--}}
    {{--                            --}}{{--                                             style="width: 50px; height: 50px;">--}}
    {{--                            --}}{{--                                    </a>--}}
    {{--                            --}}{{--                                    <!-- User Name -->--}}
    {{--                            --}}{{--                                    <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">--}}
    {{--                            --}}{{--                                        <h5 class="card-title ml-2">{{ $status->user->getNameOrUsername() }}</h5>--}}
    {{--                            --}}{{--                                    </a>--}}
    {{--                            --}}{{--                                    <!-- User Comment -->--}}
    {{--                            --}}{{--                                    <p class="card-text mt-2">{{ $status->body }}</p>--}}

    {{--                            --}}{{--                                    <!-- Time Posted -->--}}
    {{--                            --}}{{--                                    <small class="text-muted">{{ $status->created_at->diffForHumans() }}</small>--}}

    {{--                            --}}{{--                                    <!-- Like Button and Number of Likes -->--}}
    {{--                            --}}{{--                                    @if($status->user_id !== Auth::user()->id)--}}
    {{--                            --}}{{--                                        <div class="mt-3">--}}
    {{--                            --}}{{--                                            <a class="btn btn-primary btn-sm"--}}
    {{--                            --}}{{--                                               href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>--}}

    {{--                            --}}{{--                                            @endif--}}
    {{--                            --}}{{--                                            <span class="ml-2">{{ $status->likes->count() }} Likes</span>--}}
    {{--                            --}}{{--                                            <!--------------------------------- Replies -------------------------------------->--}}
    {{--                            --}}{{--                                            @foreach($status->replies as $reply)--}}

    {{--                            --}}{{--                                                <div class="card-body">--}}
    {{--                            --}}{{--                                                    <!-- User Profile Image -->--}}
    {{--                            --}}{{--                                                    <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">--}}
    {{--                            --}}{{--                                                        <img src="{{ $reply->user->getAvatarUrl() }}"--}}
    {{--                            --}}{{--                                                             alt="{{ $reply->user->getNameOrUsername() }}"--}}
    {{--                            --}}{{--                                                             class="img-fluid rounded-circle"--}}
    {{--                            --}}{{--                                                             style="width: 50px; height: 50px;">--}}
    {{--                            --}}{{--                                                    </a>--}}
    {{--                            --}}{{--                                                    <!-- User Name -->--}}
    {{--                            --}}{{--                                                    <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">--}}
    {{--                            --}}{{--                                                        <h5 class="card-title ml-2">{{ $reply->user->getNameOrUsername() }}</h5>--}}
    {{--                            --}}{{--                                                    </a>--}}
    {{--                            --}}{{--                                                    <!-- User Comment -->--}}
    {{--                            --}}{{--                                                    <p class="card-text mt-2">{{ $reply->body }}</p>--}}

    {{--                            --}}{{--                                                    <!-- Time Posted -->--}}
    {{--                            --}}{{--                                                    <small--}}
    {{--                            --}}{{--                                                        class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>--}}

    {{--                            --}}{{--                                                    <!-- Like Button and Number of Likes -->--}}
    {{--                            --}}{{--                                                    @if($reply->user_id !== Auth::user()->id)--}}
    {{--                            --}}{{--                                                        <div class="mt-3" style="display: inline-block">--}}
    {{--                            --}}{{--                                                            <a class="btn btn-primary btn-sm"--}}
    {{--                            --}}{{--                                                               href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a>--}}
    {{--                            --}}{{--                                                        </div>--}}
    {{--                            --}}{{--                                                    @endif--}}
    {{--                            --}}{{--                                                    <span class="ml-2">{{ $status->likes->count() }} Likes</span>--}}
    {{--                            --}}{{--                                                </div>--}}

    {{--                            --}}{{--                                            @endforeach--}}



    {{--                            --}}{{--                                            <!-- Reply Form -->--}}
    {{--                            --}}{{--                                            <form role="form"--}}
    {{--                            --}}{{--                                                  action="{{ route('status.reply' , ['statusId' =>$status->id ]) }}"--}}
    {{--                            --}}{{--                                                  method="post" class="mt-3">--}}
    {{--                            --}}{{--                                                <div class="form-group">--}}
    {{--                            --}}{{--                                            <textarea--}}
    {{--                            --}}{{--                                                class="form-control{{ $errors->has("reply-". $status->id) ? ' is-invalid' : '' }}"--}}
    {{--                            --}}{{--                                                name="reply-{{ $status->id }}"--}}
    {{--                            --}}{{--                                                placeholder="Reply to this status"></textarea>--}}
    {{--                            --}}{{--                                                    <span--}}
    {{--                            --}}{{--                                                        class="help-block invalid-feedback">{{ $errors->first("reply-". $status->id) }}</span>--}}
    {{--                            --}}{{--                                                </div>--}}
    {{--                            --}}{{--                                                <input type="submit" class="btn btn-success mt-2" value="Reply">--}}
    {{--                            --}}{{--                                                <input type="hidden" name="_token" value="{{ Session::token() }}">--}}
    {{--                            --}}{{--                                            </form>--}}
    {{--                            --}}{{--                                        </div>--}}
    {{--                            --}}{{--                                </div>--}}
    {{--                            --}}{{--                            </div>--}}
    {{--                            --}}{{--                        </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--        </div>--}}


    {{--        @endforeach--}}



    {{--        @endif--}}

    {{--    </div>--}}
    {{--    <div class="col-lg-4 col-lg-offset-3">--}}

    {{--        @if(Auth::user()->hasFriendRequestPending($user))--}}
    {{--            <p>Waiting for {{ $user->getNameOrUsername() }} to accept your request</p>--}}

    {{--        @elseif (Auth::user()->hasFriendRequestReceived($user))--}}
    {{--            <a href="{{ route('friends.accept' , ['username' =>$user->username]) }}" class="btn btn-primary">Accept--}}
    {{--                friend request</a>--}}
    {{--        @elseif (Auth::user()->isFriendWith($user))--}}
    {{--            <p>you and {{ $user->getNameOrUsername() }} are friends :)</p>--}}

    {{--            <form action="{{ route('friends.delete', ['username' => $user->username]) }}" method="post">--}}
    {{--                <input type="submit" value="Delete friend." class="btn btn-warning">--}}
    {{--                <input type="hidden" name="_token" value="{{ Session::token() }}">--}}
    {{--            </form>--}}

    {{--        @elseif (Auth::user()->id !== $user->id)--}}
    {{--            <a href="{{ route('friends.add', ['username'=>$user->username]) }}" class="btn btn-primary">Add friend</a>--}}
    {{--        @endif--}}


    {{--        <h4>{{ $user->getNameOrUsername() }}'s friends</h4>--}}
    {{--        @if(!$user->friends()->count())--}}
    {{--            <p>{{ $user->getNameOrUsername() }} has no friends :)</p>--}}
    {{--        @else--}}
    {{--            @foreach($user->friends() as $user)--}}
    {{--                @include('user.partials.userblock')--}}
    {{--            @endforeach--}}
    {{--        @endif--}}
    {{--    </div>--}}
    {{--    </div>--}}

    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card shadow">
                    <!-- Profile Image and User Name with Add Friend Button -->
                    <div class="card-header text-center">
                        <a href="{{ route('profile.index' , ['username' => $user->username]) }}">
                            <img class="rounded-circle mb-2" alt="" src="{{ $user->getAvatarUrl() }}"
                                 style="width: 80px; height: 80px;">
                        </a>
                        <h4 class="card-title"><a
                                href="{{ route('profile.index' , ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a>
                        </h4>
                        @if(Auth::user()->hasFriendRequestPending($user))
                            <p>Waiting for {{ $user->getNameOrUsername() }} to accept your request</p>

                        @elseif (Auth::user()->hasFriendRequestReceived($user))
                            <a href="{{ route('friends.accept' , ['username' =>$user->username]) }}"
                               class="btn btn-primary">Accept
                                friend request</a>
                        @elseif (Auth::user()->isFriendWith($user))
                            <p>you and {{ $user->getNameOrUsername() }} are friends :)</p>

                            <form action="{{ route('friends.delete', ['username' => $user->username]) }}" method="post">
                                <input type="submit" value="Delete friend." class="btn btn-warning">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>

                        @elseif (Auth::user()->id !== $user->id)
                            <a href="{{ route('friends.add', ['username'=>$user->username]) }}" class="btn btn-primary">Add
                                friend</a>
                        @endif
                    </div>

                    <!-- Line Separator -->
                    <hr class="my-0">

                    <!-- Friends List with Profile Images -->



                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Friends</h6>
                        <ul class="list-group">
                            @if(!$user->friends()->count())
                                <p>{{ $user->getNameOrUsername() }} has no friends :)</p>
                            @else
                                @foreach($user->friends() as $user)
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
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Centered Container for Status Cards -->
                <div class="d-flex justify-content-center">
                    <div class="container">
                        @foreach($statuses as $status)
                            <!-- Status Card 1 -->
                            <div class="card mx-auto mb-4 shadow">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $status->user->getAvatarUrl() }}" alt="Profile Image"
                                             class="rounded-circle me-2"
                                             style="width: 40px; height: 40px;">
                                        <span class="fw-bold">{{ $status->user->getNameOrUsername() }}</span>
                                    </div>
                                    <small class="text-muted">{{ $status->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $status->body }}</p>

                                    <!-- Reply Form for Main Reply  -->

                                    <div class="reply-form bg-light p-3 mb-3">
                                        <h5 class="card-title mb-3">Reply to {{ $status->user->getNameOrUsername() }}'s
                                            Status</h5>
                                        <form role="form" method="post"
                                              action="{{ route('status.reply' , ['statusId' =>$status->id ]) }}">
                                            <div class="mb-3">
                                            <textarea
                                                class="form-control{{ $errors->has("reply-". $status->id) ? ' is-invalid' : '' }}"
                                                rows="2"
                                                placeholder="Write your reply"
                                                name="reply-{{ $status->id }}"></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-success mt-2" value="Submit Reply">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>


                                    <!-------------------------------------- Replies ----------------------------------------->
                                    @foreach($status->replies as $reply)

                                        <div class="card mb-3">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $reply->user->getAvatarUrl() }}" alt="Profile Image"
                                                         class="rounded-circle me-2"
                                                         style="width: 30px; height: 30px;">
                                                    <span class="fw-bold">{{ $reply->user->getNameOrUsername() }}</span>
                                                </div>
                                                <small
                                                    class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{ $reply->body }}</p>
                                            </div>
                                            <div
                                                class="card-footer d-flex justify-content-end align-items-center bg-light">
                                                <div class="d-flex align-items-center">
                                                    {{--                                                <span class="text-muted me-2">8 likes</span>--}}
                                                    <span
                                                        class="text-muted me-2">{{ $reply->likes->count() }} Likes</span>
                                                    @if($reply->user_id !== Auth::user()->id)
                                                        <a class="btn btn-primary btn-sm"
                                                           href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                                    <div class="d-flex align-items-center">
                                        @if($status->user_id !== Auth::user()->id)
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>
                                        @endif

                                        <span class="text-muted">{{ $status->likes->count() }} Likes</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
