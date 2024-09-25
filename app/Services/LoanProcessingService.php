<?php

namespace App\Services;

use AllowDynamicProperties;
use App\Repositories\emi_repository;
use App\Repositories\LoanDetailRepository;
use Illuminate\Support\Facades\DB;

#[AllowDynamicProperties] class LoanProcessingService
{

    public function __construct(LoanDetailRepository $loan_detail_repository)
    {
        $this->loan_detail_repository = $loan_detail_repository;
    }

    public function process_data()
    {
        // Get the min and max payment dates
        $minDate = $this->loan_detail_repository->minFirstPaymentDate();
        $maxDate = $this->loan_detail_repository->maxLastPaymentDate();
        $emi_repo = new emi_repository();


        // Delete emi_details table if it exists
        DB::statement('DROP TABLE IF EXISTS emi_details');

        // Create the emi_details table dynamically
        // Create the query for the emi_details table
        $query = 'CREATE TABLE emi_details (clientid INT';
        //generate column name
        $monthColumns = $emi_repo->getMonthsBetween($minDate, $maxDate);
        foreach ($monthColumns as $monthName) {
            $query .= ", $monthName varchar(20) default 0.00";
        }
        $query .= ')';

        DB::statement($query);

        // Process each loan detail and populate the emi_details table
        $loan_detail_repository = $this->loan_detail_repository->all();
        foreach ($loan_detail_repository as $loan) {
            $emiAmount = round($loan->loan_amount / $loan->num_of_payment, 2);
            //find adjustment value it will always +ve so subtract it, if in case it comes - it will convert it into addition
            $adjustment = -1 * round(($emiAmount * $loan->num_of_payment) - $loan->loan_amount, 2);
            // Initialize the start date as the first day of the month of the first_payment_date
            $startDate = new \DateTime($loan->first_payment_date);
            // Set to the first day of the month
            /*
              adjust month date to first day to avoid issue of last day of payment day
                in case 29_NOV_2017 ,
                as it goes far when Feb month arrives 29 is not valid date for payment
                (SOME Invalid date may occurs like 31_APR, 31_JUN )
                so to find precise month we need a concrete valid date i.e. first of every month,
            */
            $startDate->modify('first day of this month');

            $rowData = ['clientid' => $loan->clientid];
            for ($i = 0; $i < $loan->num_of_payment; $i++) {
                // Convert back to 'Y-M' format (Year-Month) if needed
                $monthName = $startDate->format('Y_M');
                // Check if this month column exists in the dynamically generated columns
                if (($loan->num_of_payment - 1) == $i) {
                    // as it is last payment need to adjust the amount to match exact amount
                    // $adjustment is calculated such away that if amount spent more than loan amount it will minus diff and vice versa
                    $rowData[$monthName] = ($emiAmount + $adjustment) . " (Adjusted)";
                } else {
                    $rowData[$monthName] = $emiAmount;
                }
                // Modify startDate by adding one month, keeping the first day of the next month
                $startDate->modify('first day of next month');
            }

            // Insert the row into the emi_details table
            DB::table('emi_details')->insert($rowData);
        }

        return redirect()->route('emi_details');
    }
}
