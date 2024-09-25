@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>{{ __('Loan Details') }}</span>
                    <a class="btn btn-info btn-sm text-white" href="{{route('emi_details')}}">EMI Details</a>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Client ID</th>
                            <th>Number of Payments</th>
                            <th>First Payment Date</th>
                            <th>Last Payment Date</th>
                            <th>Loan Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                         foreach ($loan_details as $details){
                             ?>
                           <tr>
                               <td><?=$details->clientid?></td>
                               <td><?=$details->num_of_payment?></td>
                               <td><?=$details->first_payment_date?></td>
                               <td><?=$details->last_payment_date?></td>
                               <td><?=$details->loan_amount?></td>
                           </tr>
                      <?php
                         }
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
