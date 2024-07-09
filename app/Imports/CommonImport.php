<?php

namespace App\Imports;

use App\Enumeration\Type;
use App\Models\AccountHead;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\Branch;
use App\Models\Cash;
use App\Models\CostCenter;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CommonImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //Cost Center
        foreach ($collection as $key => $data) {
            if ($key != 0) {
                $costCenter = new CostCenter();
                $costCenter->name = $data[1];
                $costCenter->save();
            }
        }
    }
}
