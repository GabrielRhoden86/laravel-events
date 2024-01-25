<?php
// JOB
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\EmailCadastroUserJob;
use App\Models\User;

class ControllerUser extends Controller
{
    public function saveUser(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->save();

        EmailCadastroUserJob::dispatch($user)->onQueue('events');

        session(["msg" => "Cadastro realizado com sucesso!"]);
        return redirect("/cadastroUsuario");
    }
}
