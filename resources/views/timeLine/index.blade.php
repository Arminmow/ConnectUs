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
                    <div class="media">
                        <a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
                            <img class="media-object img-circle" alt="{{ $status->user->getNameOrUsername() }}"
                                 src="{{ $status->user->getAvatarUrl() }}">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">
                                    {{ $status->user->getNameOrUsername() }}
                                </a>
                            </h4>
                            <p>{{ $status->body }}</p>
                            <ul class="list-inline">
                                <li>{{ $status->created_at->diffForHumans() }}</li>
                                <li><a href="#">Like</a></li>
                                <li>10 Likes</li>
                            </ul>

                            <form role="form" action="#" method="post">
                                <div class="form-group">
                                    <textarea name="reply-1" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
                                </div>
                                <input type="submit" value="Reply" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>

                @endforeach

                {{ $statuses->links() }}

            @endif

        </div>

@stop
