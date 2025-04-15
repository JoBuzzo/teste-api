<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cotacao extends Model
{
    /** @use HasFactory<\Database\Factories\CotacaoFactory> */
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cotacao';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the user that owns the Cotacao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Get the servico that owns the Cotacao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }
}
