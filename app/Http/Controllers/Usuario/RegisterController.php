<?php

namespace App\Http\Controllers\Usuario;

//Facades
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

//Controllers
use App\Http\Controllers\Controller;

//Requests
use App\Http\Requests\Usuario\RegisterRequest;

//Models
use App\Models\Pessoas;
use App\Models\Usuarios;

/**
 * Classe Register Controller
 *
 * @param Pessoas
 * @param Usuarios
 */
class RegisterController extends Controller
{

    private $usuario;
    private $pessoa;

    public function __construct()
    {
        $this->usuario = new Usuarios();
        $this->pessoa = new Pessoas();
    }

    public function index(RegisterRequest $request)
    {

        DB::beginTransaction();

        try {

            $this->pessoa->nome = $request->nome;
            $this->pessoa->cpf = $request->cpf;

            $this->pessoa->save();

            $this->usuario->pessoa_id = $this->pessoa->id;
            $this->usuario->email = $request->email;
            $this->usuario->password = Hash::make($request->password);

            $this->usuario->save();

            DB::commit();

            return response()->json(['msg' => 'Sua conta foi registrada com sucesso!'], 200);

        } catch (\Exception $erro) {

            DB::commit();

            $status = ifNull($erro->getCode(), 500);

            return response()->json([
                'msg' => $erro->getMessage(),
                'status' => $status
            ], 500);

        }

    }


}
