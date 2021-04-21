@extends('master')
@section('content')

<div class="custom-product">
 <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>My Order</h4>
            @foreach ($orders as $order )
                 <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                            <img src="{{ $order->gallery }}" alt="" class="trending-image">
                        </a>    
                    </div>

                    <div class="col-sm-4">
                        <h4>Name: {{ $order->name }}</h4>
                        <h4>Delivery Status: {{ $order->status }}</h4>  
                        <h4>Address: {{ $order->address }}</h4>
                        <h4>Payment Status: {{ $order->payment_status }}</h4>
                        <h4>Payment Method: {{ $order->payment_method }}</h4>
                    </div>

                </div>   
            @endforeach

        </div>
    </div>
</div>
@endsection