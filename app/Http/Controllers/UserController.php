<?php

namespace App\Http\Controllers;

use App\Events\NewRegisteredUserEvent;
use App\Http\Helpers;
use App\Http\Requests\UserFormDataRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportAdminEmail;

class UserController extends Controller
{
    use Notifiable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $firstname_user = $request->get('firstname_user');
        $lastname_user  = $request->get('lastname_user');
        $ident_user     = $request->get('ident_user');

        $data = User::categoryJoin()
            ->filterByName($firstname_user, $lastname_user, $ident_user)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Verificar si enviaron filtros
        $filtered = false;
        if ( $firstname_user || $lastname_user || $ident_user ) {
            $filtered = true;
        }

        return view('users.index',
            [
                'users' => $data,
                'total' => $data->total(),
                'firstname_user' => $firstname_user,
                'lastname_user' => $lastname_user,
                'ident_user' => $ident_user,
                'filtered' => $filtered,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $countriesList = Helpers::getCountries();

        return view('users.create',
            [
                'categories' => $categories,
                'countries'  => $countriesList,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormDataRequest $request)
    {
        $input = $request->all();

        // Creo el usuario
        $user = User::create($input);

        // Envio email al usuario registrado
        event(new NewRegisteredUserEvent($user));

        // Envio email al administrador del sistema
        $emailAdmin = config('app.email_admin');

        if ( $emailAdmin ) {

            // Query
            $groupByCountry = User::groupByCountry()->get();

            $email = new ReportAdminEmail($groupByCountry);

            Mail::to($emailAdmin)->send($email);
        }

        return redirect()->route('users.index')
            ->with('success','Se ha guardado el nuevo usuario correctamente...');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::categoryJoin()->find($id);

        return view('users.show',
            [
                'user' => $user,
                'created' => $user->created_at->format('d-m-Y'),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::categoryJoin()->find($id);
        $countriesList = Helpers::getCountries();
        $categories = Category::all();

        return view('users.edit')->with([
            'user' => $user,
            'categories' => $categories,
            'countries' => $countriesList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormDataRequest $request, $id)
    {
        $data = User::find($id);

        if (! $data ) {

            return redirect()->route('users.index')
                ->with('error','Error, el usuario no existe...');
        }

        $isSaved = $data->update($request->all());

        if($isSaved) {

            return redirect()->route('users.index')
                ->with('success','Usuario actualizado correctamente...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index')
            ->with('success','Usuario eliminado correctamente...');
    }
}
