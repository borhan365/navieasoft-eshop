    <?php
        $categories = App\Models\Category::where('status', 1)->where('parent_id', 0)->get();
    ?>

    <header>
        <nav>        
            <!-- =================== nav bar middle start =================== -->
            <div class="navbar-middle">
                <div class="container-fluid p-0 p-md-4">
                    <div class="d-flex justify-content-between">
                        <div class="logo-area"><img src="{{asset('public/frontend/img/logo.png')}}" alt="" class="logo"></div> <!-- logo -->
        
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
                            <a href="#"><i class="icofont-waiter-alt"></i> <br> Name</a>
                            <a href="#"><i class="icofont-ui-message"></i> <br> Messages</a>
                            <a href="#"><i class="icofont-list"></i> <br> Wishlist</a>
                            <a href="#"><i class="icofont-ui-cart"></i> <br> Card</a>
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
                                <ul class="border">
                                    @foreach($categories as $category)
                                    <li><a href="#">{{$category->name ?? ''}} <i class="icofont-rounded-right float-right"></i></a>
                                        <?php
                                            $subcategories = App\Models\Category::where('status', 1)->where('parent_id', $category->id)->get();
                                        ?>
                                        <ul class="border">
                                            @foreach($subcategories as $subcategory)
                                            <li><a href="#">{{$subcategory->name}}<i class="icofont-rounded-right float-right"></i></a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a href="#">Ready To Ship</a></li>
                            <li><a href="#">Trade Shop</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Sell On Alibaba</a></li>
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
                            <li><a class="d-block" href="#">PRODUCTS</a></li>
                            <li><a class="d-block" href="#">PAGES</a></li>
                            <li><a class="d-block" href="#">FEATURES</a></li>
                            <li><a class="d-block" href="#">SPACIAL OFFER</a></li>
                            <li><a class="d-block" href="#">BUY</a></li>
                            <li><a class="d-block" href="#">SPACIAL OFFER</a></li>
                            <li><a class="d-block" href="#">BUY</a></li>
                            <li><a class="d-block" href="#">READY TO SHIP</a></li>
                            <li><a class="d-block" href="#">SERVICES</a></li>
                            <li><a class="d-block" href="#">SPACIAL OFFER</a></li>
                            <li><a class="d-block" href="#">BUY</a></li>
                            <li><a class="d-block" href="#">SPACIAL OFFER</a></li>
                            <li><a class="d-block" href="#">BUY</a></li>
                            <li><a class="d-block" href="#">READY TO SHIP</a></li>
                            <li><a class="d-block" href="#">SERVICES</a></li>
                            <li><a class="d-block" href="#">SELL YOUR PRODUCTS</a></li>
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
                <a href="#">
                    <i class="icofont-cart-alt"></i>
                    <p class="mb-0">Cart</p>
                </a>
                <a href="#">
                    <i class="icofont-waiter-alt"></i>
                    <p class="mb-0">My Profile</p>
                </a>
            </div>
            <!-- end of bottom nav bar -->
        </nav>
    </header>