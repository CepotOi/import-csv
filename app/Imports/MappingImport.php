<?php

namespace App\Imports;

use App\Models\Mapping;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class MappingImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts
{
    public function uniqueBy()
    {
        return ['key'];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd(Mapping::generateKey($row['group'], $row['date'], $row['time']));
        return new Mapping([
            'group'     => $row['group'],
            'date'    => Mapping::formatDate($row['date']),
            'time'    => $row['time'],
            'key' => Mapping::generateKey($row['group'], $row['date'], $row['time']),
            'tgl_input'    => now(),
            'sdp_l6'    => $row['sdp_l6'] ? $row['sdp_l6'] : null,
            'lp_l6'    => $row['lp_l6'] ? $row['lp_l6'] : null,
            'sdp_l7'    => $row['sdp_l7'] ? $row['sdp_l7'] : null,
            'lp_l7'    => $row['lp_l7'] ? $row['lp_l7'] : null,
            'sdp_l8'    => $row['sdp_l8'] ? $row['sdp_l8'] : null,
            'lp_l8'    => $row['lp_l8'] ? $row['lp_l8'] : null,
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function upsert(bool $keyByField = false): bool
    {
        return true;
    }
}
