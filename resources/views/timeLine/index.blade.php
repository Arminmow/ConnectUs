@extends('templates.default')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <form role="form" action="{{ route('status.post') }}" method="post">
                <div class="form-group">
                    <textarea placeholder="What's up {{ Auth::user()->getNameOrUsername() }}?" name="status"
                              class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" rows="2"></textarea>
                    <span class="help-block invalid-feedback">{{ $errors->first('status') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Update status</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            {{-- timeline shits --}}
            @if(!$statuses->count())
                <p>There is nothing in your timeline. :(</p>
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
                                @if($status->user_id !== Auth::user()->id)
                                    <div class="mt-3">
                                        <a class="btn btn-primary btn-sm"
                                           href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>

                                        @endif
                                        <span class="ml-2">{{ $status->likes->count() }} Likes</span>
                                        <!--------------------------------- Replies -------------------------------------->
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
                                                <small
                                                    class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>

                                                <!-- Like Button and Number of Likes -->
                                                @if($reply->user_id !== Auth::user()->id)
                                                    <div class="mt-3" style="display: inline-block">
                                                        <a class="btn btn-primary btn-sm"
                                                           href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a>
                                                    </div>
                                                @endif
                                                <span class="ml-2">{{ $status->likes->count() }} Likes</span>
                                            </div>

                                        @endforeach



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
                                    </div>
                            </div>
                        </div>
                    </div>


        </div>


        @endforeach

        {{ $statuses->links() }}

        @endif

    </div>

@stop
