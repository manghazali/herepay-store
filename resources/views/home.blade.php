@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="row col-lg-6">
            <div class="col-lg-6">
                <div class="card text-white bg-success">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h6 class="card-title">Products</h6>
                            <h3 class="card-text"><strong>{{ $totalProductsCount }}</strong></h3>
                        </div>
                        <div class="ml-auto d-flex align-items-center justify-content-center" style="font-size: 3rem; color: rgba(255, 255, 255, 0.8);">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6"> 
                <div class="card text-white bg-warning">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h6 class="card-title">Appointments Tomorrow</h6>
                            <h3 class="card-text"><strong>{{ $totalOrdersCount }} </strong></h3>
                        </div>
                        <div class="ml-auto d-flex align-items-center justify-content-center" style="font-size: 3rem; color: rgba(255, 255, 255, 0.8);">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection