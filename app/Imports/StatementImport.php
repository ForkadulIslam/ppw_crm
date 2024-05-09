<?php

namespace App\Imports;


use App\Models\Bank_statement;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StatementImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        DB::beginTransaction();

        try {
            $grouped_by_sl = $rows->groupBy('sl');

            foreach ($grouped_by_sl as $sl => $grouped_rows) {
                $tolerance = 0.0001;

                $difference = abs($grouped_rows->sum('ppw_amount') - $grouped_rows->first()['amount']);

                if ($difference > $tolerance) {
                    throw new \Exception('Amount mismatch found in the SL NO: ' . $sl);
                }

                foreach ($grouped_rows as $row) {
                    if (isset($row['sl']) && $row['sl'] != null) {
                        $transaction_date_year = intval(substr($row['date'], -2));
                        $century = '20';
                        $carbonDate = Carbon::createFromFormat('m-d-y', $row['date'])->setYear($century . $transaction_date_year);
                        $converted_transaction_date = $carbonDate->toDateString();
                        $statement_data = [
                            'statement_sl' => $row['sl'],
                            'transaction_date' => $converted_transaction_date,
                            'description' => $row['description'],
                            'amount' => $row['amount'],
                            'balance' => $row['running_balance'],
                            'ppw_id' => $row['ppw_id'],
                            'ppw_amount' => $row['ppw_amount'],
                            'bank_code' => $row['bank_code']
                        ];

                        Bank_statement::updateOrCreate(['statement_sl' => $row['sl']], $statement_data);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception('An error occurred during the import process: ' . $exception->getMessage());
        }
    }
}
