<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servico extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'servicos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * Get all of the vtxValores for the Servico
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vtxValores(): HasMany
    {
        return $this->hasMany(VtexValor::class, 'id_servico');
    }

    /**
     * Get all of the cotacoes for the Servico
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cotacoes(): HasMany
    {
        return $this->hasMany(Cotacao::class, 'id_servico');
    }
}
