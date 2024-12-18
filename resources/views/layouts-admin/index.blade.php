@extends('components-admin.app')
@section('title-header','Admin')
@section('title','Dashboard')
@section('title-user','Admin')
@section('main')
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Tamu</h4>
                  </div>
                  <div class="card-body">
                  {{ $totalTamu }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                <i class="fas fa-people-carry"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Staf</h4>
                  </div>
                  <div class="card-body">
                    {{$totalStaf}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                <i class="fas fa-concierge-bell"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Reservasi</h4>
                  </div>
                  <div class="card-body">
                    {{$totalReservasi}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                <i class="fas fa-hotel"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Kamar</h4>
                  </div>
                  <div class="card-body">
                    {{$totalKamar}}
                  </div>
                </div>
              </div>
            </div>                  
          </div>
@endsection