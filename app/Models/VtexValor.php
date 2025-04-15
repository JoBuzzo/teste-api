<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VtexValor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vtex_valores';

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
     * Get the servico that owns the VtexValor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }
}
