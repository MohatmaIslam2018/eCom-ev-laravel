@extends('master')
@section('content')

<div class="custom-product">
    <div class="col-sm-10">
        <table class="table table-striped">

            <tbody>
              <tr>
                <td>Amount</td>
                <td>$ {{ $totalPrice }}</td>
              </tr>
              <tr>
                <td>Tax</td>
                <td>$ 0</td>
              </tr>
              <tr>
                <td>Delivery</td>
                <td>$ 10</td>
              </tr>
              <tr>
                <td>Total Amount</td>
                <td>$ {{ $totalPrice + 10 }}</td>
              </tr>
            </tbody>
          </table>
          <form action="/orderPlaced" method="POST">
            @csrf
            <div class="form-group">
              <textarea type="text" name="address" placeholder="enter your address" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="pwd">Payment Method:</label> <br> <br>
              <input type="radio" value="online payment" name="payment"> <span>Online Payment</span> <br> <br>
              <input type="radio" value="emi Payment" name="payment"> <span>EMI Payment</span> <br> <br>
              <input type="radio" value="payment on delivery" name="payment"> <span>Payment on Delivery</span> <br> <br>
    
            </div>
            <button type="submit" class="btn btn-default">Order Now</button>
          </form>
    </div>

</div>
@endsection