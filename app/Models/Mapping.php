<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    use HasFactory;

    const UNIQUE_KEY = 'unique_key';

    protected $table = "mappings";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    protected $fillable = [
        'group',
        'date',
        'time',
        'key',
        'sdp_l6',
        'lp_l6',
        'sdp_l7',
        'lp_l7',
        'sdp_l8',
        'lp_l8',
        'tgl_input',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'date',
        'tgl_input'
    ];

    public static function generateKey($group, $date, $time)
    {
        return $group . '_' . Carbon::createFromFormat('Y/m/d', $date)->format('Ymd') . '_' . Carbon::createFromFormat('H:i', $time)->format('H');
    }

    public static function formatDate($value)
    {
        return Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d');
    }
}
