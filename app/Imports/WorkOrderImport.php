<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Models\Work_order;
use Carbon\Carbon;
use Faker\Core\Number;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WorkOrderImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {

        if (isset($row['ppw']) && $row['ppw'] != null) {

            try {
                //DB::beginTransaction();
                $receive_date_year = intval(substr($row['date_received'], -2));
                $century = '20';
                $carbonDate = Carbon::createFromFormat('m-d-y', $row['date_received'])->setYear($century.$receive_date_year);
                $converted_date_received = $carbonDate->toDateString();
                $invoice_date_year = intval(substr($row['invoice_date'], -2));
                $converted_invoice_date = Carbon::createFromFormat('m-d-y', $row['date_received'])->setYear($century.$invoice_date_year);
                //Log::info($converted_date_received);
                $client = $row['client'];
                $client_code = $client % 100;
                $company_code = $client - $client_code;

                $clientModel = Client::where('code', $client_code)->first();
                $companyModel = Company::where('code', $company_code)->first();
                $workOrderData = [
                    'ppw_id' => $row['ppw'],
                    'client' => $client,
                    'client_id' => optional($clientModel)->id,
                    'company_id' => optional($companyModel)->id,
                    'company_code' => $company_code,
                    'sub_order_no' => $row['main_or_sub'],
                    'receive_date' => $converted_date_received,
                    'work_order_code' => $row['wo'],
                    'contractor' => $row['contractor'],
                    'work_type' => $row['work_type'],
                    'address' => $row['address'],
                    'city' => $row['city'],
                    'state' => $row['state'],
                    'zip' => $row['zip'],
                    'processor' => $row['processor'],
                    'invoice_date' => $converted_invoice_date->toDateString(),
                    'seller' => $row['seller'],
                    'source_ppw' => $row['source_ppw'],
                    'client_amount' => $row['client_amount'],
                    'vendor_amount' => $row['vendor_amount'],
                ];
                //Log::info($workOrderData);
                Work_order::updateOrCreate(['ppw_id' => $row['ppw']], $workOrderData);
                //DB::commit();
            } catch (\Exception $e) {
                //DB::rollBack();
                Log::error('Error during user and employee data insertion: ' . $e->getMessage());
            }
        }
    }
}
