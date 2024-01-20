@extends('templates.default')

@section('content')

    <!--------------------------------------- Status submit form ----------------------------------------------------->
    <div class="row">
        <div class="container mt-5 mb-5">
            {{--            <form role="form" action="{{ route('status.post') }}" method="post">--}}
            {{--                <div class="form-group">--}}
            {{--                    <textarea placeholder="What's up {{ Auth::user()->getNameOrUsername() }}?" name="status"--}}
            {{--                              class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" rows="2"></textarea>--}}
            {{--                    <span class="help-block invalid-feedback">{{ $errors->first('status') }}</span>--}}
            {{--                </div>--}}
            {{--                <button type="submit" class="btn btn-primary">Update status</button>--}}
            {{--                <input type="hidden" name="_token" value="{{Session::token()}}">--}}
            {{--            </form>--}}
            {{--            <hr>--}}

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Share Your Status</h4>
                            <form role="form" action="{{ route('status.post') }}" method="post">
                                <div class="form-group mb-3">
                                    <textarea placeholder="What's up {{ Auth::user()->getNameOrUsername() }}?"
                                              name="status"
                                              class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                              rows="3"></textarea>
                                    <span class="help-block invalid-feedback">{{ $errors->first('status') }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Update status</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!--------------------------------------- Status timeline --------------------------------------------------------->
    <div class="container mt-5">

        {{-- Status card --}}
        @if(!$statuses->count())
            <p>There is nothing in your timeline. :(</p>
        @else
            @foreach($statuses as $status)
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card mb-4 shadow">
                            <div
                                class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">
                                        <img src="{{ $status->user->getAvatarUrl() }}" alt="Profile Image" class="rounded-circle me-2"
                                             style="width: 40px; height: 40px;">
                                    </a>
                                    <a href="{{ route('profile.index', ['username' => $status->user->username]) }}" style="color: white">
                                        <span class="fw-bold">{{ $status->user->getNameOrUsername() }}</span>
                                    </a>

                                </div>
                                <small class="text-muted">{{ $status->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $status->body }}    </p>


                                <!-- Reply Form for Main Reply  -->

                                <div class="reply-form bg-light p-3 mb-3">
                                    <h5 class="card-title mb-3">Reply to {{ $status->user->getNameOrUsername() }}'s Status</h5>
                                    <form role="form" method="post" action="{{ route('status.reply' , ['statusId' =>$status->id ]) }}">
                                        <div class="mb-3">
                                            <textarea class="form-control{{ $errors->has("reply-". $status->id) ? ' is-invalid' : '' }}" rows="2"
                                                      placeholder="Write your reply" name="reply-{{ $status->id }}"></textarea>
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
                                                <img src="{{ $reply->user->getAvatarUrl() }}" alt="Profile Image" class="rounded-circle me-2"
                                                     style="width: 30px; height: 30px;">
                                                <span class="fw-bold">{{ $reply->user->getNameOrUsername() }}</span>
                                            </div>
                                            <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $reply->body }}</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-end align-items-center bg-light">
                                            <div class="d-flex align-items-center">
{{--                                                <span class="text-muted me-2">8 likes</span>--}}
                                                <span class="text-muted me-2">{{ $reply->likes->count() }} Likes</span>
                                                @if($reply->user_id !== Auth::user()->id)
                                                    <a class="btn btn-primary btn-sm" href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                                <div class="d-flex align-items-center">
                                    @if($status->user_id !== Auth::user()->id)
                                        <a class="btn btn-primary btn-sm" href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>
                                    @endif

                                    <span class="text-muted">{{ $status->likes->count() }} Likes</span>
                                </div>
                            </div>
                        </div>

                        <!------------------------------------------ Old --------------------------------------------->
                        {{--                        <div class="container mt-4">--}}
                        {{--                            <div class="card">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <!-- User Profile Image -->--}}
                        {{--                                    <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">--}}
                        {{--                                        <img src="{{ $status->user->getAvatarUrl() }}"--}}
                        {{--                                             alt="{{ $status->user->getNameOrUsername() }}" class="img-fluid rounded-circle"--}}
                        {{--                                             style="width: 50px; height: 50px;">--}}
                        {{--                                    </a>--}}
                        {{--                                    <!-- User Name -->--}}
                        {{--                                    <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">--}}
                        {{--                                        <h5 class="card-title ml-2">{{ $status->user->getNameOrUsername() }}</h5>--}}
                        {{--                                    </a>--}}
                        {{--                                    <!-- User Comment -->--}}
                        {{--                                    <p class="card-text mt-2">{{ $status->body }}</p>--}}

                        {{--                                    <!-- Time Posted -->--}}
                        {{--                                    <small class="text-muted">{{ $status->created_at->diffForHumans() }}</small>--}}

                        {{--                                    <!-- Like Button and Number of Likes -->--}}
                        {{--                                    @if($status->user_id !== Auth::user()->id)--}}
                        {{--                                        <div class="mt-3">--}}
                        {{--                                            <a class="btn btn-primary btn-sm"--}}
                        {{--                                               href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>--}}

                        {{--                                            @endif--}}
                        {{--                                            <span class="ml-2">{{ $status->likes->count() }} Likes</span>--}}
                        {{--                                            <!--------------------------------- Replies -------------------------------------->--}}
                        {{--                                            @foreach($status->replies as $reply)--}}

                        {{--                                                <div class="card-body">--}}
                        {{--                                                    <!-- User Profile Image -->--}}
                        {{--                                                    <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">--}}
                        {{--                                                        <img src="{{ $reply->user->getAvatarUrl() }}"--}}
                        {{--                                                             alt="{{ $reply->user->getNameOrUsername() }}"--}}
                        {{--                                                             class="img-fluid rounded-circle"--}}
                        {{--                                                             style="width: 50px; height: 50px;">--}}
                        {{--                                                    </a>--}}
                        {{--                                                    <!-- User Name -->--}}
                        {{--                                                    <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">--}}
                        {{--                                                        <h5 class="card-title ml-2">{{ $reply->user->getNameOrUsername() }}</h5>--}}
                        {{--                                                    </a>--}}
                        {{--                                                    <!-- User Comment -->--}}
                        {{--                                                    <p class="card-text mt-2">{{ $reply->body }}</p>--}}

                        {{--                                                    <!-- Time Posted -->--}}
                        {{--                                                    <small--}}
                        {{--                                                        class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>--}}

                        {{--                                                    <!-- Like Button and Number of Likes -->--}}
                        {{--                                                    @if($reply->user_id !== Auth::user()->id)--}}
                        {{--                                                        <div class="mt-3" style="display: inline-block">--}}
                        {{--                                                            <a class="btn btn-primary btn-sm"--}}
                        {{--                                                               href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    @endif--}}
                        {{--                                                    <span class="ml-2">{{ $status->likes->count() }} Likes</span>--}}
                        {{--                                                </div>--}}

                        {{--                                            @endforeach--}}



                        {{--                                            <!-- Reply Form -->--}}
                        {{--                                            <form role="form"--}}
                        {{--                                                  action="{{ route('status.reply' , ['statusId' =>$status->id ]) }}"--}}
                        {{--                                                  method="post" class="mt-3">--}}
                        {{--                                                <div class="form-group">--}}
                        {{--                                            <textarea--}}
                        {{--                                                class="form-control{{ $errors->has("reply-". $status->id) ? ' is-invalid' : '' }}"--}}
                        {{--                                                name="reply-{{ $status->id }}"--}}
                        {{--                                                placeholder="Reply to this status"></textarea>--}}
                        {{--                                                    <span--}}
                        {{--                                                        class="help-block invalid-feedback">{{ $errors->first("reply-". $status->id) }}</span>--}}
                        {{--                                                </div>--}}
                        {{--                                                <input type="submit" class="btn btn-success mt-2" value="Reply">--}}
                        {{--                                                <input type="hidden" name="_token" value="{{ Session::token() }}">--}}
                        {{--                                            </form>--}}
                        {{--                                        </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            @endforeach

            {{ $statuses->links() }}

        @endif

    </div>

@stop
