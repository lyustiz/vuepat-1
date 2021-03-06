<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table 	  = 'persona';
	protected $primaryKey = 'id_persona';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'nb_nombre',
                            'nb_apellido',
                            'tx_cedula',
                            'tx_sexo',
                            'fe_nacimiento',
                            'id_estado_civil',
                            'tx_telefono',
                            'tx_celular',
                            'tx_observaciones'
                            'id_status'
                            'id_usuario'
                            ]; 
    
    protected $hidden     = ['id_persona','fe_creado','fe_actualizado'];

    public function estadoCivil()
    {
        return $this->BelongsTo('App\Models\EstadoCivil', 'id_estado_civil');
    }

    public function status()
    {
        return $this->BelongsTo('App\Models\Status', 'id_status');
    }

    public function usuario()
    {
    	return $this->BelongsTo('App\Models\Auth\Usuario', 'id_usuario');
    }

}
