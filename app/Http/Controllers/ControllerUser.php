<?php
// JOB
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\EnviarEmailUser;
use App\Models\User;

class ControllerUser extends Controller
{
    public function saveUser(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt(123456);
        $user->name = $request->name;
        $user->save();

        EnviarEmailUser::dispatch($user)->onQueue('events');

        session(["msg" => "Cadastro realizado com sucesso!"]);
        return redirect("/enviaEmail");
    }
}
