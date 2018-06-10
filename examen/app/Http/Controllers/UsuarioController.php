<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{    
    private $mensaje = ['datos'=>null, 'msg'=>'La petición se hizo correctamente'];
    public function getUsuarios(){
        $usuarios=Usuario::all();
        $this->mensaje['datos'] = $usuarios;
        return response()->json($this->mensaje);
    }
    public function getUsuariosFull(Request $request){
        $usuarios=Usuario::all();
        foreach($usuarios as $usuario){
            $usuario->skills = $usuario->getSkills();
        }
        $this->mensaje['datos'] = $usuarios;
        return response()->json($this->mensaje);
    }
    
    public function getUsuarios2(Request $request){
        return response()->json($this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required']));
    }
    
    public function getUsuario($id){
        $usuario = Usuario::find($id);
        $usuario->skills = $usuario->getSkills();        
        $this->mensaje['datos'] = $usuario;
        return response()->json($this->mensaje);
    }
    public function createUsuario(Request $request){
        $this->validate($request,[ 'nombre'=>'required', 'email'=>'required', 'puesto'=>'required', 'fechanacimiento'=>'required', 'domicilio'=>'required']);
        $skills = json_decode($request->skills);
        if(count($skills)>0){
            $usuario = Usuario::create($request->all());
            $usuario->addSkills($skills);
            $usuario->skills = $usuario->getSkills();
            $this->mensaje['datos'] = $usuario;
        }else{
            $this->mensaje['msg'] = 'Error al crear usuario, no tiene se enviaron skills';
        }
        return response()->json($this->mensaje);
    }
}