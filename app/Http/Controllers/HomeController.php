<?php

namespace App\Http\Controllers;

use App\Repositories\emi_repository;
use App\Repositories\LoanDetailRepository;
use App\Services\LoanProcessingService;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param LoanProcessingService $loanProcessingService
     *
     */
    public function __construct(LoanProcessingService $loanProcessingService)
    {
//        $this->middleware('auth');
        $this->loanProcessingService = $loanProcessingService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $loan_details = new LoanDetailRepository();
        $loan_details = $loan_details->all();

        return view('loan_details', ['loan_details' => $loan_details]);
    }

    public function emi_details()
    {
        $emi_repo = new emi_repository();
        $emi_details = $emi_repo->all();
        return view('emi_details', ['emi_details' => ['emi_details' => $emi_details]]);
    }

    public function process_data()
    {

       $this->loanProcessingService->process_data();

        return redirect()->route('emi_details');
    }
}
