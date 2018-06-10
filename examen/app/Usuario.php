<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Skill;

class Usuario extends Model
{
    protected $fillable = ['nombre', 'email', 'puesto','fechanacimiento','domicilio'];
    public function getSkills()
    {
        return Skill::where('usuario_id', '=', $this->id)->get();
    }
    public function addSkills($skills)
    {
        foreach($skills as $skill){
            $newSkill = new Skill;
            $newSkill->nombre = $skill->nombre;
            $newSkill->calificacion = $skill->calificacion;
            $newSkill->usuario_id = $this->id;
            $newSkill->save();
        }
    }
}
