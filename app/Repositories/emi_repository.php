<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class emi_repository implements BaseRepository
{

    public function all()
    {
        $tableExists = DB::select("SHOW TABLES LIKE 'emi_details'");

        if (count($tableExists) > 0) {
            return DB::table('emi_details')->get();
        }
        else {
          return [];
        }

    }

    // Function to get months between two dates
    public function getMonthsBetween($startDate, $endDate)
    {
        $start = new \DateTime($startDate);
        $end = new \DateTime($endDate);
        $end->modify('first day of next month'); // Include the last month

        $months = [];

        while ($start < $end) {
            $months[] = $start->format('Y_M'); // Format as Year_M
            $start->modify('first day of next month');
        }

        return $months;
    }


    public function validateDate($dateString) {
        // get separate date by Year month day
        list( $year, $monthStr,$day) = explode('_', $dateString);

        // Convert the month name to a numeric value (e.g., Jan -> 1, Feb -> 2)
        $month = date('n', strtotime("1 $monthStr"));

        // Use the checkdate() function to validate the date (parameters: month, day, year)
        if (!checkdate($month, $day, $year)) {
            $lastDay = date('d', strtotime("last day of $year-$monthStr"));
            $dateString = $year."_".$month."_".$lastDay;
        }
        return $dateString;
    }


}
