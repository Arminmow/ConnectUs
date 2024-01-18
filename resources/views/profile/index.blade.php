@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            {{-- user info --}}
            @include('user.partials.userblock')
            <hr>

        </div>
        <div class="col-lg-4 col-lg-offset-3">
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
