@extends('layouts.frontend')
@section('content')
    <!-- breadcrumb__start -->
        <div class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb__title">
                            <h1>Cart</h1>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="color__blue">
                                   Cart
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- breadcrumb__end -->



        <!-- cart__section__start -->
            <div class="cartarea sp_bottom_100 sp_top_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="#">
                                <div class="cartarea__table__content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @forelse ($cartItems as $items)
                                            
                                            <tr>
                                               
                                                <td class="cartarea__product__thumbnail">
                                                    <a href="#">
                                                        <img src="{{ Storage::url($items->product->image)  }}" alt="cart" width="80">
                                                    </a>
                                                </td>
                                                <td class="cartarea__product__name"><a href="#">{{ $items->product->name }}</a></td>
                                                <td class="cartarea__product__price__cart"><span class="amount">Rp {{ number_format($items->product->price, '0', ',', '.') }}</span></td>
                                                <td class="cartarea__product__quantity">
                                                     
                                                       <form action="{{ route('cart.diupdate', $items->product->id) }}" method="post">    
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="input-group">
                                                            <input type="number" name="qty" value="{{ $items->qty }}" class="form-control" min="1" max="{{ $items->product->stock }}" style="max-width: 70px;">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                Update
                                                            </button>
                                                        </div>
                                                       </form>
                                                       
                                                </td>
                                                <td class="cartarea__product__subtotal">Rp {{ number_format($items->qty*$items->product->price, 0,',', '.') }}</td>
                                                <td class="cartarea__product__remove">
                                                    
                                                    <form action="{{ route('cart.remove', $items->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Keranjang masih kosong.</td>
                                            </tr>
                                             @endforelse

                                             @php
                                             $total = $cartItems->sum(fn($items)=> $items->qty*$items->product->price);
                                             @endphp
                                            <tr>
                                                <th class="text-center">Total</th>
                                                <td colspan="5" class="text-center"><b>Rp {{ number_format($total, 0 ,',', '.') }}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Continue shopping -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="cartarea__shiping__update__wrapper">
                            <div class="cartarea__shiping__update">
                            <a class="default__button" href="{{ route('cart.checkout') }}">Continue Shopping</a>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="cartarea__tax">
                                <div class="cartarea__title">
                                    <h4>Estimate Shipping And Tax</h4> 
                                </div>
                                <div class="cartarea__text">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                </div>
                                <div class="cartarea__select">
                                    <div class="cartarea__tax__select">
                                        <label for="address__country">* Country</label>
                                        <select name="email" id="address__country"></select>
                                    </div>
                                </div>
                                <div class="cartarea__code cartarea__select">
                                    <label for="address__zip">* Zip/Postal Code</label>
                                    <input type="text" placeholder="Zip/Postal Code" id="address__zip" name="address[zip]">
                                </div>
                                <button type="button" class="default__button">Calculate shipping</button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                            <div class="cartarea__discount__code__wrapper cartarea__tax">
                                <div class="cartarea__title">
                                    <h4>Cart Note</h4> 
                                </div>
                            <div class="cartarea__discount__code">
                                <p>Special instructions for seller</p>
                                <textarea name="note" id="CartSpecialInstructions"></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4 col-md-6 col-12">
                            <div class="cartarea__grand__totall cartarea__tax">
                                <div class="cartarea__title">
                                    <h4>Cart Total</h4> 
                                </div>
                            <h5>Cart Totals 
                                <span>$189.00</span>
                            </h5>
                            <a class="default__button" href="#">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- cart__section__end-->
@endsection