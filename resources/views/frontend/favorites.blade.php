@extends('frontend.layout')
@section('title')
    Favorilerim ({{ $count }})
@endsection
@section('content')

    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Favorilerim</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Favorilerim({{$count}})</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Checkout Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Ürün</th>
                            <th scope="col">Fiyat</th>
                            <th scope="col">Kategori</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($favorites)==null)
                            <div class="alert alert-warning col-md-12 text-center">
                                Favori Ürününüz bulunmamaktadır(0)
                            </div>
                        @else
                            @foreach($favorites as $favorite)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img style="width: 60px" src="{{asset('public_directory')}}/image/products/{{$favorite->products->images[0]->image}}" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p>{{$favorite->products->name}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{$favorite->products->price}}TL</h5>
                                    </td>
                                    <td class="remove-col"><a href="{{route('favoriteDelete',$favorite->id)}}" class="btn-remove"><i class="ti-close"></i></a></td>
                                </tr>
                            @endforeach
                        @endif





                        <tr class="out_button_area">
                            <td class="d-none-l">

                            </td>
                            <td class="">

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{route('index')}}">Alışverişe Devam ET</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection
<link rel="stylesheet" href="vendors/linericon/style.css">
<link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

@section('css') @endsection
@section('js') @endsection
