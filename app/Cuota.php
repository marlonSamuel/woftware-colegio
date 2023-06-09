<?php

namespace App;
use App\ConceptoPago;
use App\Ciclo;
use App\GradoNivelEducativo;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cuota extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'cuotas';

    protected $fillable=[
        'cuota',
        'grado_nivel_educativo_id',
        'concepto_pago_id',
        'ciclo_id'
    ];

    public function concepto_pago()
    {
        return $this->belongsTo(ConceptoPago::class,'concepto_pago_id');
    }
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class,'ciclo_id');
    }

    public function grado_nivel_educativo(){
        return $this->belongsTo(GradoNivelEducativo::class,'grado_nivel_educativo_id');
    }

    public function pagos(){
        return $this->hasMany(Pago::class,'cuota_id');
    }

}
