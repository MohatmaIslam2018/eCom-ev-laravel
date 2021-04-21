@extends('master')
@section('content')

<div class="custom-product">
 <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a> <br><br>
            @foreach ($products as $product )
                 <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $product->id }}">
                            <img src="{{ $product->gallery }}" alt="" class="trending-image">
                        </a>    
                    </div>

                    <div class="col-sm-4">
                                <h4>{{ $product->name }}</h4>
                                <h4>{{ $product->description }}</h4>  
                                <h4>Price: {{ $product->price }}</h4>
                    </div>

                    <div class="col-sm-3">
                        <a href="/removeCart/{{ $product->cart_id  }}" class="btn btn-warning">Remove from Cart</a>
                    </div>
                </div>   
            @endforeach

            <a class="btn btn-success" href="ordernow">Order Now</a> <br><br>

        </div>
    </div>
</div>
@endsection