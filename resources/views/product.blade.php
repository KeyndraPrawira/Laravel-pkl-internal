@extends('layouts.frontend')
@section('content')
      <!-- breadcrumb__start -->
        <div class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb__title">
                            <h1>Shop</h1>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="color__blue">
                                    Shop
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- breadcrumb__end -->

    <!-- shop__section__start-->
        <div class="shop sp_top_80">
            <div class="container">
                <div class="row grid__responsive">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">

                        <div class="sidebar sidebar-collapse-hide">
                            <div class="sidebar__widget widget-collapse-show">
                                <div class="sidebar__title">
                                    <h4>Categories</h4>
                                    <i class="fa fa-angle-down"></i>
                                </div>
                                <div class="sidebar__menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('product.index') }}" class="{{ !isset($selectedCategory)? 'fw-bold text-primary' : '' }}  ">
                                                All Categories
                                            </a>
                                           
                                        </li>
                                         @foreach ($category as $cat)
                                        <li>
                                            <a href="{{ route('product.filter', $cat->slug) }}"   class="{{ !isset($selectedCategory) ? 'fw-bold text-primary' : ''  }} ">
                                                {{ $cat->name }} <span>{{ $cat->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach

                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                       


                        <div class="tab-content " id="myTabContent">
                            <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                                <div class="row grid__responsive">
                                    @if (isset($query))
                                            <h5 class="mb-5">Hasil pencarian untuk : <strong>{{ $query }}</strong></h5>
                                    @endif
                                    @if ($product->isEmpty())
                                        <p class="text-muted">Tidak ada yang cocok dengan pencarian.</p>
                                    @else
                                    @foreach ($product as $data)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                        <div class="grid__wraper">
                                            <div class="grid__wraper__img">
                                                <div class="grid__wraper__img__inner">
                                                    <a href="{{ url('/product/'.$data->slug) }}">
                                                        <img class="primary__image" src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}">
                                                        <img class="secondary__image" src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}">
                                                    </a>
                                                </div>
                                                <div class="grid__wraper__icon">                                
                                                    <ul>
                                                        <li>
                                                           
                                                                <a href="{{ route('cart.add', $data->id) }}" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $data->id }}').submit();"  data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View" data-bs-original-title="Quick View">
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                </a>
                                                            </span>
                                                        </li>
            
                                                       <form id="add-to-cart-form-{{ $data->id }}" action="{{ route('cart.add', $data->id) }}" method="post" class="d-none">
                                                            <input type="hidden" name="qty" value="1">
                                                            @csrf
                                                       </form>
            
                                                        
                                                    </ul>   
                                                </div>
            
                                                <div class="grid__wraper__badge">
                                                    <span class="new__badge">New</span>
                                                </div>
            
            
                                            </div>
                                            <div class="grid__wraper__info">
                                                <h3 class="grid__wraper__tittle">
                                                    <a href="{{ url('/product/'.$data->slug) }}" tabindex="0">{{ $data->name }}</a>
                                                </h3>
                                                <div class="grid__wraper__price">
                                                    <span>Rp{{ number_format($data->price, '0', ',', '.') }}</span> 
                                                </div>
                                               
                                            </div>
            
                                        </div>
                                    </div>
                                    @endforeach 
                                    @endif
                                          
            
                                  

            
                                    
            
                                </div>
                            </div>
    
                            
                        
    
                        </div>


                       


                    </div>
                </div>
            </div>
        </div>
    <!-- shop__section__start-->

       
@endsection