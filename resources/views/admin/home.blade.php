@extends('layouts.adminlayout.master')


@section('content')

<?php
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Session;
$nbropen=TicketController::ticketopened();
$nbrpending=TicketController::ticketpending();
$nbrclosed=TicketController::ticketclosed();
?>
<div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
              <p class="font-weight-normal mb-2 text-muted"><?php
              Use \Carbon\Carbon;
              $date =Carbon::now();
              echo $date->toRfc850String();
              ?></p>
            </div>
          </div>
                <div class="row mt-3">
                  <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
                    <div class="row flex-grow">
                      <div class="col-sm-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Open Tickets</h4>
                                <h4 class="text-dark font-weight-bold mb-2">{{$nbropen}}</h4>
                            </div>
                          </div>
                      </div>
              
                    </div>
                  </div>
                  <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
                    <div class="row flex-grow">
                      <div class="col-sm-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pending Tickets</h4>
                                <h4 class="text-dark font-weight-bold mb-2">{{$nbrpending}}</h4>
                            </div>
                          </div>
                      </div>
              
                    </div>
                  </div>


                  <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
                    <div class="row flex-grow">
                      <div class="col-sm-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Solved Tickets</h4>
                                <h4 class="text-dark font-weight-bold mb-2">{{$nbrclosed}}</h4>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                
                </div>

                <div class="row mt-3">
                      <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Line chart</h4>
                            <canvas id="lineChart"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Bar chart</h4>
                            <canvas id="barChart"></canvas>
                          </div>
                        </div>
                      </div>
                </div>
        
</div>     
                
  

@endsection
