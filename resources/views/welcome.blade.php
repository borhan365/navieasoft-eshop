@extends('layouts.frontend.app')

@section('content')

    <section class="banner-section mt-lg-40">
        <div class="container-fluid p-0 p-lg-4">
            <div class="bg-white border p-lg-4">
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block navigation">
                        <h5 class="heading-3 mb-4">MY MARKETS</h5>

                        <ul class="d-block">
                            @foreach($categories as $category)

                            <li><a class="fz-small d-block py-2 pl-0" href="#">{{$category->name ?? ''}} <i class="icofont-rounded-right float-right"></i></a>
                                <ul class="border" style="width: 40rem;">
                                    <?php
                                        $subcategories = App\Models\Category::where('status', 1)->where('parent_id', $category->id)->get();
                                    ?>
                                    @foreach($subcategories as $subcategory)
                                    <li><a class="fz-small d-block py-2" href="#">{{$subcategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end of col -->
                    <div class="col-lg-9 p-0 px-md-4">
                        <div class="banner-slider">
                            <div class="slide">
                                <a href="#"><img class="w-100" src="{{asset('public/frontend/img/banner/banner-img-1.jpg')}}" alt="Banner Image"></a>
                            </div>
                            <!-- end of slide -->
                            <div class="slide">
                                <a href="#"><img class="w-100" src="{{asset('public/frontend/img/banner/banner-img-2.jpg')}}" alt="Banner Image"></a>
                            </div>
                            <!-- end of slide -->
                            <div class="slide">
                                <a href="#"><img class="w-100" src="{{asset('public/frontend/img/banner/banner-img-3.jpg')}}" alt="Banner Image"></a>
                            </div>
                            <!-- end of slide -->
                            <div class="slide">
                                <a href="#"><img class="w-100" src="{{asset('public/frontend/img/banner/banner-img-4.jpg')}}" alt="Banner Image"></a>
                            </div>
                            <!-- end of slide -->
                        </div>
                        <!-- end of slider -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
        </div>
        <!-- end of container fluid -->
    </section>
    <!-- end of banner section -->

    <section class="product-type-section my-40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="bg-white rounded-10 p-3">
                        <h5 class="heading-3 mb-3">LATEST PRODUCTS</h5>
                        <div class="row">
                            @foreach($newProducts as $newProduct)
                            <div class="col-6 col-sm-3 text-center mb-5 mb-sm-2">
                                <a class="d-inline-block border" href="{{route('product-details', [$newProduct->slug])}}">
                                    <img src="{{asset($newProduct->image)}}" alt="Product">
                                    <h5 class="mb-0">BDT {{$newProduct->sell_price}}</h5>
                                    <p class="text-muted mb-0">{{$newProduct->name}}</p>
                                </a>
                            </div>
                            <!-- end of col -->
                            @endforeach


                        </div>
                        <!-- end of row -->
                    </div>
                </div>
                <!-- end of col -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="bg-white rounded-10 p-3">
                        <h5 class="heading-3 mb-3">OLDEST PRODUCTS</h5>
                        <div class="row">
                            @foreach($oldProducts as $oldProduct)
                            <div class="col-6 col-sm-3 mb-5 mb-sm-2 text-center">
                                <a class="d-inline-block border" href="{{route('product-details', [$oldProduct->slug])}}">
                                    <img src="{{asset($oldProduct->image)}}" alt="Product">
                                    <h5 class="mb-0">BDT {{$oldProduct->sell_price}}</h5>
                                    <p class="text-muted mb-0">{{$oldProduct->name}}</p>
                                </a>
                            </div>
                            <!-- end of col -->
                            @endforeach

                        </div>
                        <!-- end of row -->
                    </div>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container fluid -->
    </section>
    <!-- end of product type section -->


    <section class="mb-40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="bg-white rounded-10 p-3">
                        <h2 class="heading-1">CUSTOMIZED PRODUCTS</h2>
                        <p class="font-weight-medium fz-normal w-75 mb-5">Partner with one of 60,000 experienced manufacturers with design & production capabilities and on-time delivery.</p>

                        <div class="row">
                            <div class="col-sm-6 mb-5 mb-sm-1">
                                <a href="#">
                                    <div class="p-4 rounded-10" style="background-color: #eee;">
                                        <h5 class="heading-3 text-dark text-center">Premium OEM Factories</h5>
                                        <div class="row m-0">
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-1.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-2.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-3.jpg')}}" alt="" class="w-100">
                                            </div>
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 mb-5 mb-sm-1">
                                <a href="#">
                                    <div class="p-4 rounded-10" style="background-color: #eee;">
                                        <h5 class="heading-3 text-dark text-center">Premium OEM Factories</h5>
                                        <div class="row m-0">
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-1.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-2.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-3.jpg')}}" alt="" class="w-100">
                                            </div>
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of col -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="bg-white rounded-10 p-3">
                        <h2 class="heading-1">READY-TO-SHIP PRODUCTS</h2>
                        <p class="font-weight-medium fz-normal w-75 mb-5">Partner with one of 60,000 experienced manufacturers with design & production capabilities and on-time delivery.</p>

                        <div class="row">
                            <div class="col-sm-6 mb-5 mb-sm-1">
                                <a href="#">
                                    <div class="p-4 rounded-10" style="background-color: #eee;">
                                        <h5 class="heading-3 text-dark text-center">Premium OEM Factories</h5>
                                        <div class="row m-0">
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-1.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-2.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-3.jpg')}}" alt="" class="w-100">
                                            </div>
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 mb-5 mb-sm-1">
                                <a href="#">
                                    <div class="p-4 rounded-10" style="background-color: #eee;">
                                        <h5 class="heading-3 text-dark text-center">Premium OEM Factories</h5>
                                        <div class="row m-0">
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-1.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-2.jpg')}}" alt="" class="w-100">
                                            </div>
                                            <div class="col-4 p-0">
                                                <img src="{{asset('public/frontend/img/products/small/product-3.jpg')}}" alt="" class="w-100">
                                            </div>
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </section>

    <section class="mb-40 d-none d-lg-block">
        <div class="container-fluid">
            <h2 class="heading-1 pb-4">OUR SHOPS</h2>

            <div class="product-gallery">
                <div class="d-flex flex-column justify-content-between p-5 big"  style="background-image: url('{{asset('public/frontend/img/products/medium/product-1.jpg')}}')">
                    <h2 class="heading-1 font-weight-medium">SELECTED NOVELY PRODUCTS</h2>
                    <div><a href="#" class="bg-white fz-normal px-4 py-3">Source Now</a></div>
                </div>
                <div class="tall">
                    <div>
                        <h4 class="heading-3"><a href="#" class="hover-text-theme">{{$LatestShop->name ?? ''}}</a></h4>
                        <p class="fz-extra-small mb-0">Customization Service Available</p>
                        <p class="fz-extra-small text-primary font-weight-bold mb-50">Verified</p>
                    </div>
                    <div><img src="{{asset('public/frontend/img/products/small/product-white-3.jpg')}}" class="float-right" alt=""></div>
                </div>

                @foreach($Shops as $Shop)
                <div class="small">
                    <h4 class="heading-3"><a href="#" class="hover-text-theme">{{$Shop->name}}</a></h4>
                    <p class="fz-extra-small mb-0">Customization Service Available</p>
                    <img src="{{asset('public/frontend/img/products/small/product-white-4.jpg')}}" class="float-right" alt="">
                </div>
                @endforeach
            </div>
            <!-- end of product gallery -->
        </div>
        <!-- end of container fluid -->
    </section>




<!--     <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 mb-5 mb-xl-0">
                    <h2 class="heading-1 my-4">WEEKLY DEAL</h2>

                   <div class="bg-white">
                        <div class="row m-0">
                            <div class="col-lg-6" style="background-image: url('{{asset('public/frontend/img/pattern/pattern-2.jpg')}}'); background-size: cover;">
                                <div class="p-4 py-5">
                                    <h3 class="heading-1 text-white">FROM 10% OFF</h3>
                                    <p class="fz-normal text-white mb-0 mt-4 ">Deal ends in: </p>
                                    <p>
                                        <span class="count-down fz-normal text-white" data-count-down="2021/10/30 0:34:56"></span>
                                    </p>
                                    <a href="#" class="d-inline-block px-4 py-2 bg-white rounded-pill text-black fz-normal mt-4">View More</a>
                                </div>
                            </div>
                            <div class="col-6 col-xl-3 text-center">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/products/product-1.jpg')}}" alt="">
                                    <p class="fz-small font-weight-bold">BDT 402</p>
                                    <p class="fz-small">BDT 600 <span class="bg-theme text-white fz-extra-small px-2 py-1 ml-2">- 10%</span></p>
                                </a>
                            </div>
                            <div class="col-6 col-xl-3 text-center">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/products/product-1.jpg')}}" alt="">
                                    <p class="fz-small font-weight-bold">BDT 402</p>
                                    <p class="fz-small">BDT 600 <span class="bg-theme text-white fz-extra-small px-2 py-1 ml-2">- 10%</span></p>
                                </a>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="col-xl-6 mb-5 mb-xl-0">
                    <h2 class="heading-1 my-4">SMALL COMMODITIES MARKETPLACE</h2>

                   <div class="bg-white">
                        <div class="row m-0">
                            <div class="col-lg-6" style="background-image: url('{{asset('public/frontend/img/pattern/pattern-3.jpg')}}'); background-size: cover;">
                                <div class="p-4 py-5">
                                    <h3 class="heading-1 text-white">FROM 10% OFF</h3>
                                    <p class="fz-normal text-white mb-0 mt-4 ">Deal ends in: </p>
                                    <p>
                                        <span class="count-down fz-normal text-white" data-count-down="2021/10/10 0:34:56"></span>
                                    </p>
                                    <a href="#" class="d-inline-block px-4 py-2 bg-white rounded-pill text-black fz-normal mt-4">View More</a>
                                </div>
                            </div>
                            <div class="col-6 col-xl-3 text-center">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/products/product-3.jpg')}}" alt="">
                                    <p class="fz-small font-weight-bold">BDT 402</p>
                                    <p class="fz-small">BDT 600 <span class="bg-theme text-white fz-extra-small px-2 py-1 ml-2">- 10%</span></p>
                                </a>
                            </div>
                            <div class="col-6 col-xl-3 text-center">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/products/product-4.jpg')}}" alt="">
                                    <p class="fz-small font-weight-bold">BDT 402</p>
                                    <p class="fz-small">BDT 600 <span class="bg-theme text-white fz-extra-small px-2 py-1 ml-2">- 10%</span></p>
                                </a>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
 -->
    <section class="quotation-section my-40">
        <div class="container-fluid">
            <h2 class="heading-1 py-4">REQUEST FOR QUOTATION</h2>

            <div class="row">
                <div class="col-lg-6">
                    <div class="px-40 py-50" style="background-image: linear-gradient(rgba(0,0,0, .6),rgba(0,0,0, .6)), url('{{asset('public/frontend/img/banner/banner-5.jpg')}}');">
                        <h3 class="mb-5 text-white">GLOBAL SOURCING MARKETPLACE</h3>

                        <div class="row">
                            <div class="col-6 mb-5">
                                <h3 class="text-white"><span class="countTo" data-from="0" data-to="142455"></span>+</h3>
                                <h5 class="text-white">RFQs</h5>
                            </div>
                            <div class="col-6 mb-5">
                                <h3 class="text-white">&lt;20 Hour</h3>
                                <h5 class="text-white">Avg Quotation Duration</h5>
                            </div>
                            <div class="col-6 mb-5">
                                <h3 class="text-white"><span class="countTo" data-from="0" data-to="51121"></span>+</h3>
                                <h5 class="text-white">Active Suppliers</h5>
                            </div>
                            <div class="col-6 mb-5">
                                <h3 class="text-white"><span class="countTo" data-from="0" data-to="513"></span></h3>
                                <h5 class="text-white">Industries</h5>
                            </div>
                        </div>

                        <a href="#" class="button button-transparent" data-color="white">Learn More</a>
                    </div>
                </div>
                <!-- end of col -->

                <div class="col-lg-6 d-flex align-content-center">
                    <div class="bg-white h-100 px-40 py-50">
                        <form action="#">
                            <h2 class="mb-5">ONE REQUEST, MULTIPLE QUOTES</h2>

                            <div class="row">
                                <div class="col-12"><input type="text" class="form-control h-auto fz-small mb-20 py-3 px-4" placeholder="What are you searching for ..."></div>
                                <div class="col-6"><input type="number" class="form-control h-auto fz-small mb-20 py-3 px-4" min="0" placeholder="Quantity"></div>
                                <div class="col-6">
                                    <select class="form-control h-auto fz-small mb-20 py-3 px-4">
                                        <option value="">Barrel/Barrels</option>
                                        <option value="">Cubic Meter/Cubic Meters</option>
                                        <option value="">Dozen/Dozens</option>
                                        <option value="">Gallon/Gallons</option>
                                        <option value="">Gram/Grams</option>
                                        <option value="">Cubic Meter/Cubic Meters</option>
                                        <option value="">Dozen/Dozens</option>
                                        <option value="">Gallon/Gallons</option>
                                        <option value="">Cubic Meter/Cubic Meters</option>
                                        <option value="">Dozen/Dozens</option>
                                        <option value="">Gallon/Gallons</option>
                                        <option value="">Gram/Grams</option>
                                        <option value="">Cubic Meter/Cubic Meters</option>
                                        <option value="">Dozen/Dozens</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <a href="#!" class="button button-transparent bg-theme border-0 py-3 px-5 mt-4" data-color="white">Request For Quotation</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container fluid -->
    </section>

    <section class="for-you">
        <div class="container-fluid">
            <h2 class="mb-4 heading-1">JUST FOR YOU</h2>

            <div class="row m-0">

                @foreach($Products as $Product)
                <div class="col-6 col-md-4 col-lg-3 mb-3 px-2">
                    <a href="#" class="text-black">
                        <div class="bg-white hover-shadow rounded p-3 product-card">
                            <img src="{{asset($Product->image)}}" alt="{{$Product->name}}" class="w-100">
                            <a href="{{route('product-details', [$Product->slug])}}" class="fz-small hover-underline mb-4 text-black d-inline-block">{{$Product->name}}</a>
                            <h5 class="heading-3 mb-0"> <del>BDT {{$Product->market_price}} /-</del> BDT {{$Product->sell_price}} /-</h5>
                            <p class="fz-small text-muted">500 Sets (Min. Order)</p>
                        </div>
                    </a>
                </div>
                <!-- end of col -->
                @endforeach
            </div>
        </div>
    </section>

    <section class="trade-services-section mt-40">
        <div class="container-fluid">
            <h2 class="heading-1 py-4">OUR BLOG SERVICES ARE HERE FOR YOU</h2>
            <div class="row">
                @foreach($Posts as $Post)
                <div class="col-12 col-sm-6 col-md-3 mb-5">
                    <div class="bg-white trade-service">
                        <div class="position-relative">
                            <img src="{{asset($Post->image)}}" alt="" class="w-100" style="height: 20rem; object-fit: cover;">
                            <div class="position-absolute h-100 w-100 benefits">
                                <?php
                                    $PostCategory = App\Models\Post_category::where('post_id', $Post->id)->first();
                                ?>
                                <p class="mb-0 text-light">{{$PostCategory->category->name}}</p>
                                <ul class="mb-5 mt-3">
                                    <li>{{$Post->title}}</li>
                                </ul>
                                <a href="#" class="d-inline-block text-white hover-underline">Learn More <i class="icofont-long-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="p-4 pb-3">
                            <h5 class="fz-normal font-weight-bold mb-0">{{$Post->title}}</h5>
                            <p class="fz-extra-small mb-0">{{$PostCategory->category->name}}</p>
                        </div>
                    </div>
                </div>
                <!-- end of col -->
                @endforeach
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </section>


@endsection