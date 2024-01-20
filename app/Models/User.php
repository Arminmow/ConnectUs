<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Status;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'location'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getName()
    {
        if ($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";

        }

        if ($this->first_name){
            return  $this->first_name;
        }
        return null;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }

    public function getAvatarUrl()
    {
        $hash = hash( 'sha256', strtolower( trim( $this->email ) ) );
        return "https://www.gravatar.com/avatar/$hash?d=mm&s=60";
    }

    public function statuses()
    {
        return $this->hasMany('\App\Models\Status', 'user_id');
    }

    public function likes()
    {
        return $this->hasMany('\App\Models\Like','user_id');
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\Models\User' , 'friends' , 'friend_id' , 'user_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany('App\Models\User' , 'friends' , 'user_id' , 'friend_id');
    }

    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()->merge($this->friendOf()->where('accepted',true)->get());
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestPending(User $user)
    {
        return $this->friendRequestsPending()->where('id' , $user->id)->count();
    }

    public function hasFriendRequestReceived(User $user)
    {
        return $this->friendRequests()->where('id',$user->id)->count();
    }

    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }

    public function deleteFriend(User $user)
    {
        $this->friendOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id' , $user->id)->first()->pivot->update([
            'accepted' => true
        ]);
    }

    public function isFriendWith(User $user)
    {
        return (bool) $this->friends()->where('id',$user->id)->count();
    }

    public function hasLikedStatus(Status $status)
    {
//        return (bool) $status->likes
//            ->where('likeable_id', $status->id)
//            ->where('likeable_type', get_class($status))
//            ->where('user_id' , $this->id)
//            ->count();

        return (bool) $status->likes()->where('user_id' , $this->id)->count();
    }

}
