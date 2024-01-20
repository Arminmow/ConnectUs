@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            @include('user.partials.userblock')
            <hr>

            @if(!$statuses->count())
                <p>{{ $user->getNameOrUsername() }} hasn't posted anything yet.</p>
            @else
                @foreach($statuses as $status)

                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- User Profile Image -->
                                <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">
                                    <img src="{{ $status->user->getAvatarUrl() }}"
                                         alt="{{ $status->user->getNameOrUsername() }}" class="img-fluid rounded-circle"
                                         style="width: 50px; height: 50px;">
                                </a>
                                <!-- User Name -->
                                <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">
                                    <h5 class="card-title ml-2">{{ $status->user->getNameOrUsername() }}</h5>
                                </a>
                                <!-- User Comment -->
                                <p class="card-text mt-2">{{ $status->body }}</p>

                                <!-- Time Posted -->
                                <small class="text-muted">{{ $status->created_at->diffForHumans() }}</small>

                                <!-- Like Button and Number of Likes -->
                                <div class="mt-3">
                                    <span class="ml-2">{{ $status->likes->count() }} Likes</span>

                                    <!------------------------------------------ Replies ------------------------------>
                                    @foreach($status->replies as $reply)

                                        <div class="card-body">
                                            <!-- User Profile Image -->
                                            <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
                                                <img src="{{ $reply->user->getAvatarUrl() }}"
                                                     alt="{{ $reply->user->getNameOrUsername() }}"
                                                     class="img-fluid rounded-circle"
                                                     style="width: 50px; height: 50px;">
                                            </a>
                                            <!-- User Name -->
                                            <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
                                                <h5 class="card-title ml-2">{{ $reply->user->getNameOrUsername() }}</h5>
                                            </a>
                                            <!-- User Comment -->
                                            <p class="card-text mt-2">{{ $reply->body }}</p>

                                            <!-- Time Posted -->
                                            <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>

                                            <!-- Like Button and Number of Likes -->
                                            @if($reply->user_id !== Auth::user()->id)
                                                <div class="mt-3" style="display: inline-block">
                                                    <a class="btn btn-primary btn-sm"
                                                       href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a>
                                                </div>
                                            @endif
                                            <span class="ml-2">{{ $reply->likes->count() }} Likes Likes</span>
                                        </div>

                                    @endforeach


                                    @if($authUserIsFriend || Auth::user()->id === $status->user_id)
                                        <!-- Reply Form -->
                                        <form role="form"
                                              action="{{ route('status.reply' , ['statusId' =>$status->id ]) }}"
                                              method="post" class="mt-3">
                                            <div class="form-group">
                                                <textarea
                                                    class="form-control{{ $errors->has("reply-". $status->id) ? ' is-invalid' : '' }}"
                                                    name="reply-{{ $status->id }}"
                                                    placeholder="Reply to this status"></textarea>
                                                <span
                                                    class="help-block invalid-feedback">{{ $errors->first("reply-". $status->id) }}</span>
                                            </div>
                                            <input type="submit" class="btn btn-success mt-2" value="Reply">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

        </div>


        @endforeach



        @endif

    </div>
    <div class="col-lg-4 col-lg-offset-3">

        @if(Auth::user()->hasFriendRequestPending($user))
            <p>Waiting for {{ $user->getNameOrUsername() }} to accept your request</p>

        @elseif (Auth::user()->hasFriendRequestReceived($user))
            <a href="{{ route('friends.accept' , ['username' =>$user->username]) }}" class="btn btn-primary">Accept
                friend request</a>
        @elseif (Auth::user()->isFriendWith($user))
            <p>you and {{ $user->getNameOrUsername() }} are friends :)</p>

            <form action="{{ route('friends.delete', ['username' => $user->username]) }}" method="post">
                <input type="submit" value="Delete friend." class="btn btn-warning">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>

        @elseif (Auth::user()->id !== $user->id)
            <a href="{{ route('friends.add', ['username'=>$user->username]) }}" class="btn btn-primary">Add friend</a>
        @endif


        <h4>{{ $user->getNameOrUsername() }}'s friends</h4>
        @if(!$user->friends()->count())
            <p>{{ $user->getNameOrUsername() }} has no friends :)</p>
        @else
            @foreach($user->friends() as $user)
                @include('user.partials.userblock')
            @endforeach
        @endif
    </div>
    </div>
@stop
