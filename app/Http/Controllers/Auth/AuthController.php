<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Redirect;

use Validator;

use App\Models\Contracts\Repositories\IUserRepository;
use App\Models\Objects\DTO\User;

/*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
 */
class AuthController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * The registrar implementation.
     *
     * @var Registrar
     */
    private $userRepository;
    
    /** 
     * Create a new authentication controller instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     * @param \Illuminate\Contracts\Auth\Registrar $registrar
     * @param \App\Models\Contracts\Repositories\IUserRepository $userRepo
     * @return void
     */
    public function __Construct(  
            Guard $auth, 
            IUserRepository $userRepo )
    {
        $this->auth = $auth;
        $this->userRepository = $userRepo;

        $this->middleware( 'guest', ['except' => 'getLogout' ] );
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view( 'auth/register' );
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister( Request $request )
    {
        $validator = Validator::make( $request->all(), User::$Rules );

        if ( $validator->fails() )
        {
            $this->throwValidationException(
                    $request, $validator
            );
        }

        $user = new User( $request->all() );
        
        $this->auth->login( $this->userRepository->create( $user ) );

        return redirect( $this->redirectPath() );
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view( 'auth.login' );
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin( Request $request )
    {
        $this->validate( $request, [
            'email' => 'required', 'password' => 'required',
        ] );

        $credentials = $request->only( 'email', 'password' );

        if ( $this->auth->attempt( $credentials, $request->has( 'remember' ) ) )
        {
            return redirect()->intended( $this->redirectPath() );
        }

        return redirect( $this->loginPath() )
                        ->withInput( $request->only( 'email', 'remember' ) )
                        ->withErrors( [
                            'email' => 'These credentials do not match our records.',
        ] );
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return Redirect::action( "HomeController@index" );
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if ( property_exists( $this, 'redirectPath' ) )
        {
            return $this->redirectPath;
        }

        return property_exists( $this, 'redirectTo' ) ? $this->redirectTo : '/home';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists( $this, 'loginPath' ) ? $this->loginPath : '/auth/login';
    }
}
