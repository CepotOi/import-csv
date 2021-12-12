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
        'kwh1',
        'kwh2',
        'kwh3',
        'kwh4',
        'kwh5',
        'kwh6',
        'kwh7',
        'kwh8',
        'kwh9',
        'kwh10',
        'kwh11',
        'kwh12',
        'kwh13',
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
