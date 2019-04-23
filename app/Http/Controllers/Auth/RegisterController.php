<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesarrolladorRequest;
use App\Services\DesarrolladorService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    use SendsPasswordResetEmails;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('register');
        $this->middleware('can:admin')->only('register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param DesarrolladorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(DesarrolladorRequest $request)
    {
        $input = $request->validated();
        $desarrolladorSrv = new DesarrolladorService();
        $user = $desarrolladorSrv->create($input);
        event(new Registered($user));
        $this->sendResetLinkEmail($request);
        return redirect()->route('admin.desarrolladores.index')->with('status', 'Desarrollador registrado con éxito');
    }
}
