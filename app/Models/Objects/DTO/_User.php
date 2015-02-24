<?php

//namespace App\Models\Objects\DTO;
//
//use Illuminate\Auth\Authenticatable;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
//
//class User extends Model implements AuthenticatableContract, CanResetPasswordContract
//{
//
//    use Authenticatable,
//        CanResetPassword;
//
//    /**
//     * The database table used by the model.
//     *
//     * @var string
//     */
//    protected $table = 'users';
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = ['first_name', 'last_name', 'username', 'name', 'email', 'password' ];
//
//    /**
//     * The attributes excluded from the model's JSON form.
//     *
//     * @var array
//     */
//    protected $hidden = ['password', 'remember_token' ];
//
//    /**
//     * Validation rules for this model
//     */
//    public static $Rules = array(
//        'first_name' => 'required|max:255',
//        'last_name' => 'required|max:255',
//        'username' => 'required|max:255|unique:users',
//        'email' => 'required|email|max:255|unique:users',
//        'password' => 'required|confirmed|min:6'
//    );
//
//}
