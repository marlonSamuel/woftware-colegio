<?php

namespace App;
use App\Curso;
use App\GradoNivelEducativo;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CursoGradNivEd extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'curso_grad_niv_edu';
    protected $fillable= [
    	'curso_id',
    	'grado_nivel_educativo_id'
    ];

    public function curso()
    {
    	return $this->belongsTo(Curso::class,'curso_id');
    }

    public function grado_nivel_educativo()
    {
    	return $this->belongsTo(GradoNivelEducativo::class,'grado_nivel_educativo_id');
    }
}
