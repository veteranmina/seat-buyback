<?php

namespace WipeOutInc\Seat\SeatBuyback\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BuybackContract extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'buyback_contracts';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'contractId';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
