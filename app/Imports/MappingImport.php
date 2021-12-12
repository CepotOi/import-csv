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
            'kwh1'    => $row['kwh1'] ? $row['kwh1'] : null,
            'kwh2'    => $row['kwh2'] ? $row['kwh2'] : null,
            'kwh3'    => $row['kwh3'] ? $row['kwh3'] : null,
            'kwh4'    => $row['kwh4'] ? $row['kwh4'] : null,
            'kwh5'    => $row['kwh5'] ? $row['kwh5'] : null,
            'kwh6'    => $row['kwh6'] ? $row['kwh6'] : null,
            'kwh7'    => $row['kwh7'] ? $row['kwh7'] : null,
            'kwh8'    => $row['kwh8'] ? $row['kwh8'] : null,
            'kwh9'    => $row['kwh9'] ? $row['kwh9'] : null,
            'kwh10'    => $row['kwh10'] ? $row['kwh10'] : null,
            'kwh11'    => $row['kwh11'] ? $row['kwh11'] : null,
            'kwh12'    => $row['kwh12'] ? $row['kwh12'] : null,
            'kwh13'    => $row['kwh13'] ? $row['kwh13'] : null,
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
