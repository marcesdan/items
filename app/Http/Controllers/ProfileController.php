<?php

namespace App\Http\Controllers;

use App\Services\DesarrolladorService;
use App\Http\Requests\DesarrolladorRequest;

/**
 * Class DesarrolladorController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Edit the specified resource in storage.
     *
     * @param DesarrolladorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(DesarrolladorRequest $request)
    {
        $user = auth()->user();
        $validatedData = $request->validated();
        $desarrolladorSrv = new DesarrolladorService();
        $desarrolladorSrv->update($validatedData, $user);
        return redirect('/')->with('status', 'Perfil editado con éxito!');
    }
}
