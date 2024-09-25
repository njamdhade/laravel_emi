<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LoanDetailRepository implements BaseRepository
{

    public function all(): Collection
    {
        return DB::table('loan_details')->get();
    }

    public function create(array $data): bool
    {
        return DB::table('loan_details')->insert($data);
    }

    public function minFirstPaymentDate()
    {
        return DB::table('loan_details')->min('first_payment_date');
    }

    public function maxLastPaymentDate()
    {
        return DB::table('loan_details')->max('last_payment_date');
    }
}
