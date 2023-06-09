<?php

namespace App;

use App\Apoderado;
use App\PagoMes;
use App\PagoParcial;
use App\SerieFactura;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Pago extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'pagos';
    protected $fillable= [
    	'inscripcion_id',
    	'cuota_id',
    	'is_credito',
    	'total',
    	'total_cancelado',
        'mora',
        'dias_mora',
        'exonerar_mora',
    	'anulado',
        'pagado',
    	'motivo_anulado',
        'fecha',
        'serie_factura_id',
        'factura',
        'apoderado_id',
        'descripcion'
    ];

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class,'inscripcion_id');
    }

    public function cuota()
    {
        return $this->belongsTo(Cuota::class,'cuota_id');
    }

    public function pagos_parciales()
    {
        return $this->hasMany(PagoParcial::class);
    }

    public function pagos_meses()
    {
        return $this->hasMany(PagoMes::class);
    }

    public function serie()
    {
        return $this->belongsTo(SerieFactura::class,'serie_factura_id');
    }

    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class,'apoderado_id');
    }
}
