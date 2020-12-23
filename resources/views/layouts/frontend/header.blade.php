    <?php
        $categories = App\Models\Category::where('status', 1)->where('parent_id', 0)->get();
        $user_id = Session::get('user_id');
        $user_name = Session::get('name');

        $first_name = Session::get('first_name');
        $Cart = Cart::content()->count();
    ?>

     <style>
         
        .cart{
            position: absolute;
            top: 0;
            top: 26px;
            font-weight: 900;
            color: #FF6A00;
            font-size: 18px;

        }

     </style>                

    <header>
        <nav>        
            <!-- =================== nav bar middle start =================== -->
            <div class="navbar-middle">
                <div class="container-fluid p-0 p-md-4">
                    <div class="d-flex justify-content-between">
                        <div class="logo-area"><a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/img/logo.png')}}" alt="" class="logo"></a></div> <!-- logo -->
        
                        <div class="search-area">
                            <div class="search-box">
                                <form action="#">
                                    <input type="text" name="search" placeholder="I'm searching for ...">
                                    <select name="category" class="d-none d-lg-block">
                                        <option>All Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="d-none d-lg-block"><i class="icofont-search"></i></button>
                                </form>
                            </div>
                            <!-- end of search box -->
                        </div>
                        <!-- end of search area -->
        
                        <div class="card-love d-none d-lg-block">
                            @if($user_id)
                                @if($first_name)
                                    <a href="#"><i class="icofont-waiter-alt"></i> <br> {{$first_name}}</a>
                                @else
                                    <a href="#"><i class="icofont-waiter-alt"></i> <br> {{$user_name}}</a>
                                @endif
                            <a href="{{route('logout')}}"><i class="icofont-logout"></i><br> Logout</a>
                            @else
                            <a href="{{route('registration')}}"><i class="icofont-waiter-alt"></i> <br> Registration</a>
                            <a href="{{route('loginForm')}}"><i class="icofont-login"></i> <br> Login</a>
                            @endif
                            <a href="#"><i class="icofont-ui-message"></i> <br> Messages</a>
                            <a href="{{route('cart')}}"><i class="icofont-ui-cart"></i> <sub>{{$Cart}}</sub><br> Cart </a>
                        </div>
                    </div>
                </div>
                <!-- end of container -->
            </div>
            <!-- end of navbar middle -->
        
            <div class="nav-wrapper">
                <div class="main-desktop-nav d-none d-lg-block">
                    <div class="container-fluid clearfix navigation">
                        <ul>
                            <li><a href="#" class="pl-0">Category <i class="icofont-rounded-down"></i></a>
                                <ul class="border" style="z-index: 999;">

                                    @foreach($categories as $category)
                                    <li><a href="#">{{$category->name ?? ''}} <i class="icofont-rounded-right float-right"></i></a>
                                        <?php
                                            $subcategories = App\Models\Category::where('status', 1)->where('parent_id', $category->id)->get();
                                        ?>
                                        <ul class="border">
                                            <!-- @foreach($subcategories as $subcategory)
                                            <li><a href="#">{{$subcategory->name}}<i class="icofont-rounded-right float-right"></i></a></li>
                                            @endforeach -->

                                            <div class="row">
                                                @foreach($subcategories as $subcategory)


                                                <div class="col-6">
                                                    <li><a href="#" class="font-weight-bold">{{$subcategory->name}}</a></li>
                                                    <?php
                                                        $prosubcategories = App\Models\Category::where('status', 1)->where('parent_id', $subcategory->id)->get();
                                                    ?>
                                                    @foreach($prosubcategories as $prosubcategory)
                                                    <li><a href="#" class="font-weight-normal">{{$prosubcategory->name}}</a></li>
                                                    @endforeach
                                                </div>
                                                @endforeach

                                            </div>
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a href="#">Ready To Ship</a></li>
                            <li><a href="#">Trade Shop</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                        <ul class="float-right">
                            <li><a href="#">SPACIAL OFFER</a></li>
                            <li><a href="#">BUY</a></li>
                        </ul>
                    </div>
                    <!-- end of container fluid -->
                </div>
                <!-- end of main desktop nav -->
                <div class="mobile-nav d-lg-none">
                    <div class="container-fluid">
                        <ul>
                            <li><a class="d-block" href="#" class="active">Category</a></li>
                            @foreach($categories as $category)
                            <li><a class="d-block" href="#">{{$category->name ?? ''}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of navbar wrapper -->

            <div class="bottom-nav-bar border-top d-lg-none">
                <a href="#" class="active">
                    <i class="icofont-ui-home"></i>
                    <p class="mb-0">Home</p>
                </a>
                <a href="#">
                    <i class="icofont-feedburner"></i>
                    <p class="mb-0">Feeds</p>
                </a>
                <a href="#">
                    <i class="icofont-ui-message"></i>
                    <p class="mb-0">Message</p>
                </a>
                <a href="{{route('cart')}}">
                    <i class="icofont-cart-alt "></i>
                    <p class="mb-0">Cart <sub>{{$Cart}}</sub></p>
                </a>
                <a href="#">
                    <i class="icofont-waiter-alt"></i>
                    <p class="mb-0">My Profile</p>
                </a>
                <a href="#">
                    <i class="icofont-waiter-alt"></i>
                    <p class="mb-0">Registration</p>
                </a>
            </div>
            <!-- end of bottom nav bar -->
        </nav>
    </header>