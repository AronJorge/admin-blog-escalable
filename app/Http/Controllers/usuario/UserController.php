<?php

namespace App\Http\Controllers\usuario;

use App\Http\Controllers\Controller;
use App\Roles;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $user = new User();
        $roles = Roles::all();
        $roles->push(['id' => null, 'nombre' => 'Seleccione un rol']);
        $users->each(function ($users) {
            $users->roles->each(function ($users) {
                $users->privilegios->each(function ($users) {
                    $users->modulo->modulo;
                });
            });
        });
        $privilegios_modulo=$user->userModulo()['privilegios_modulo'];
        $privilegios_list=$user->userModulo()['privilegios_list'];
        return view('admin.usuario.usuario', compact('roles','users', 'privilegios_modulo','privilegios_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $privilegios_list=$user->userModulo()['privilegios_list'];
        return view('admin.usuario.fragmento.form_user','privilegios_list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'nombres' => 'required|string|min:3',
            'apellidos' => 'required|string||min:3',
            'correo' => 'required|email|min:5|unique:users,email',
            'rol' => 'required|numeric'
        ];

        $this->validate($request, $reglas);
        $timestamp = getdate();
        $password = $this->generateRandomPassword();

        $user = User::create([
            'name' => $request->nombres,
            'last_name' => $request->apellidos,
            'email' => $request->correo,
            'password' => Hash::make($password),
            'created_at' => $timestamp['year'] . '-' . $timestamp['mon'] . $timestamp['mday'] . ' ' . $timestamp['hours'] . ':' . $timestamp['minutes'] . ':' . $timestamp['seconds'],
        ]);

        $user->roles()->sync($request->rol);

        $user->sendEmailVerificationNotification();

        Mail::to($request->correo)->send(new \App\Mail\SendMail(
            "<h2>Credenciales de acceso</h2><p>Hola " . $request->nombres . ",</p>
            <p><b>Usuario:</b> " . $request->correo . " <br>
            <b>Contraseña:</b>  " . $password . "</p>"));

        $user->roles;

        return response()->json($user);
    }

    function generateRandomPassword()
    {
        $password = ''; //Initialize a random desired length
        $desired_length = rand(8, 12);
        for ($length = 0; $length < $desired_length; $length++) {
            $password .= chr(rand(32, 126));
        }
        return $password;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        view('admin.usuario.fragmento.form_user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $reglas = [
            'nombres' => 'required|string|min:3',
            'apellidos' => 'required|string||min:3',
            'correo' => 'required|email|min:5',
            'rol' => 'required|numeric'
        ];

        $this->validate($request, $reglas);


        $date = Carbon::now();

        $email_old = $usuario->email;
        $usuario->name = $request->nombres;
        $usuario->last_name = $request->apellidos;

        if ($request->correo != $email_old) {
            $usuario->email = $request->correo;
            $usuario->email_verified_at = null;
        }
        $usuario->updated_at = $date->toDateTimeString();
        $usuario->update();

        $usuario->roles()->sync($request->rol);

        if ($usuario->email_verified_at == null) {
            $usuario->sendEmailVerificationNotification();
        }

        $usuario->roles;

        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->roles()->detach();
        $usuario->delete();
        return response()->json($usuario);
    }
}
