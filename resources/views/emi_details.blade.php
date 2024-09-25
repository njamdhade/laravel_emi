@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between">
                    <span>{{ __('EMI Details') }}</span>
                   <div>
                       <a onclick="document.getElementById('loader').style.display = 'block'" class="btn btn-success btn-sm text-white pe-1" href="{{route('process_data')}}">Process Data</a>
                       <a class="btn btn-warning btn-sm  " href="{{route('home')}}">Back to Load Details</a>
                   </div>
                </div>

                <div class="card-body table-responsive px-0 ">
                    <div class="loader" id="loader"></div>
                    <?php

                    if(!empty($emi_details['emi_details'])){
                        $emi_details = $emi_details['emi_details'];
                        // find keys from first row
                        $keys =    array_keys((array) $emi_details->all()[0]);

                        ?>
                    <table class=" emi table table-bordered table-striped" width="100%">
                        <thead class="thead-dark">
                        <tr>
                            <?php
                                //create column list
                                foreach($keys as $key=>$col){
                                    echo "<th>$col</th>";
                                }
                            ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                         foreach ($emi_details as $ksy=>$details){
                             ?>
                           <tr>
                                   <?php
                                   foreach($details as $month=>$amount){
                                       echo "<td>$amount</td>";
                                   }
                                   ?>
                           </tr>
                      <?php
                         }
                        ?>

                        </tbody>
                    </table>
                    <?php
                    }
                     ?>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .emi.table thead tr th:first-child,.emi.table tbody tr td:first-child {
        position: sticky;
        left: 0;
        background-color: white; /* Change this as needed */
        z-index: 10; /* Ensures the fixed column is above other content */
    }</style>
<style>
    .loader {
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #3498db;
        width: 60px;
        height: 60px;
        animation: spin 2s linear infinite;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .card-body {
        position: relative;
        min-height: 200px;
    }
</style>
