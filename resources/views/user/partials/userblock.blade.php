<div class="media" style="display: flex; gap: 20px">
    <a class="pull-left" href="{{ route('profile.index' , ['username' => $user->username]) }}" >
        <img class="media-project" alt="" src="{{ $user->getAvatarUrl() }}" style="border-radius: 30%">
    </a>
    <div class="media-body">
        <h4 class="card-title"><a href="{{ route('profile.index' , ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a></h4>
        @if($user->location)
            <p>{{ $user->location }}</p>
        @endif
    </div>
</div>


