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
                                    <img src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
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
                                    <button type="button" class="btn btn-primary btn-sm">Like</button>
                                    <span class="ml-2">10 Likes</span>

                                    <!-- Reply Form -->
                                    <form role="form" action="#" method="post" class="mt-3">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Reply to this status"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-success mt-2" value="Reply">
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
