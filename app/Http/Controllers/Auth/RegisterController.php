<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Traits\userTrait;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use userTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'numeric', 'unique:users'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'password_confirmation' => ['required_with:password', 'string', 'min:6', 'confirmed'],
        ]);
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request)));
        $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $user_filename = null;
        try {
            if ($request->hasfile('image'))
                $user_filename = $this->saveImage($request->file('image'), 'images/users/');

            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'status' => 1,
                'username' => $request->username,
                'phone_no' => $request->phone_no,
                'image' => $user_filename,
                'type' => 2,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollback();
            if ($user_filename != null)
                $this->deleteFile($user_filename, 'images/users/');
            return redirect()->back()->with('error', 'Added Unsuccessfull ... There is error (Error: ' . $e->getMessage() . ')');
        }
    }
}
