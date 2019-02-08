<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;
    //自分で設定したい
    protected $table = 'users';
    //勝手に設定してくれていいよ$guarded
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password',
    ];


    public static function getTlUser(){
        

        $where = [ 
            ['users.id','<>',Auth::id()],
        ];

        $users = User::where($where)->get();

        return $users;
    }

    public function follows()
    {

        return $this->hasMany('App\Follow','follow_id','id');
        //follows.follow_id = users.id

    }
}

    
