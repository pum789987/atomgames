<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    protected $fillable = ['PU_ID','MT_ID','S_ID','S_YEAR',
                           'CP_GROUP','CP_LINE','CP_PAIR','CP_ROUND_NAME','CP_ROUND_NUM',
                           'CP_DATE','CP_RAC_PLA','CP_NUM_PG','CP_PW',
                           'CP_PH','CP_PD','CP_PS','CP_STATUS','CP_SCORE',
                           'CP_MEDAL'];
    protected $primaryKey = 'CP_ID';
    protected $table = 'competition';
    public $timestamps = false;
}
