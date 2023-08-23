@extends('frontend.layout')
@section('title')
    Sepetim ({{\App\Http\Controllers\Frontend\DefaultController::basketCount()}})
@endsection
@section('content')

    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Alışveriş Sepetim</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alışveriş Sepetim({{\App\Http\Controllers\Frontend\DefaultController::basketCount()}})</li>
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
                            <th scope="col">Adet</th>
                            <th scope="col">Toplam Fiyat</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($baskets)==null)
                            <div class="alert alert-warning col-md-12 text-center">
                                Sepetinizde Hiç Bir Ürün Bulunmamaktadır(0)
                            </div>
                        @else
                        @foreach($baskets as $basket)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img style="width: 60px" src="{{asset('public_directory')}}/image/products/{{$basket->products->images[0]->image}}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$basket->products->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{$basket->products->price}}TL</h5>
                            </td>

                            <td>
                                <div class="product_count">
                                    <nav aria-label="Page navigation example">
                                        <ul style="border:1px solid darkgrey" class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="{{route('basketCountDown',$basket->id)}}" aria-label="Previous">
                                                    <span style="color:black" aria-hidden="true">«</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link">{{$basket->product_count}}</a></li>

                                            <li class="page-item">
                                                <a class="page-link" href="{{route('basketCountUp',$basket->id)}}" aria-label="Next">
                                                    <span style="color:black" aria-hidden="true">»</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </td>
                            <td>
                                <h5>{{$basket->products->price * $basket->product_count}}TL</h5>
                            </td>
                            <td class="remove-col"><a href="{{route('basketDelete',$basket->id)}}" class="btn-remove"><i class="ti-close"></i></a></td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Kargo Ücreti</h5>
                            </td>
                            <td>
                                <h5>0TL</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Ödenecek Tutar</h5>
                            </td>
                            <td>
                                <h5>{{$total}}TL</h5>
                            </td>
                        </tr>

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
                                    <a class="primary-btn ml-2" href="#order">Ödemeye Geç</a>
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
