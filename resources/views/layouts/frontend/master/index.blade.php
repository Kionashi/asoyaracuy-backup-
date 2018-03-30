<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap -->
        {!!Html::style('frontend/css/bootstrap.min.css')!!}
        <!-- Font Awesome -->
        {!!Html::style('frontend/css/font-awesome.min.css')!!}
        <!-- Custom CSS -->
        {!!Html::style('frontend/css/owl.carousel.css')!!}
        {!!Html::style('frontend/css/responsive.css')!!}
        {!!Html::style('frontend/css/bootstrap-datepicker.css')!!}
        {!!Html::style('frontend/css/style.css')!!}
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <h1><a href="{!!URL::route('home')!!}"><img alt="Asoyaracuy" src="{!! asset('frontend/img/logo.png') !!}"></a></h1>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="shopping-item">
                            <a href="{!!URL::route('profile')!!}">
                            <p>Quinta {{$user->house}}</p>
                            Balance : 
                                @if($user->balance < 0)  
                                   <span class="cart-amunt" style="color: red"> {{$user->balance}} Bs</span> 
                                    </a>
                                    <!-- <i class="fa fa-shopping-cart"></i> --> 
                                       <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <span class="product-count" style="color: white; background-color: black !important;"><i class="fa fa-power-off" style="margin-left: 0px !important; font-size: 17px !important;" aria-hidden="true"></i></span>
                                    </a>
                                @else
                                    <span class="cart-amunt"> {{$user->balance}} Bs</span>   
                                   <!-- <i class="fa fa-shopping-cart"></i> --> 
                                   <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <span class="product-count" style="color: white; background-color: black !important;"><i class="fa fa-power-off" style="margin-left: 0px !important; font-size: 17px !important;" aria-hidden="true"></i></span>
                                    </a>    
                                @endif
                            </a>
                        </div>
                        
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: block;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- End site branding area -->
        @yield('content')
        <!-- <div class="footer-top-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-about-us">
                            <h2><span>Asoyaracuy</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                            <div class="footer-social">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">User Navigation </h2>
                            <ul>
                                <li><a href="#">My account</a></li>
                                <li><a href="#">Order history</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Vendor contact</a></li>
                                <li><a href="#">Front page</a></li>
                            </ul>                        
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">Categories</h2>
                            <ul>
                                <li><a href="#">Mobile Phone</a></li>
                                <li><a href="#">Home accesseries</a></li>
                                <li><a href="#">LED TV</a></li>
                                <li><a href="#">Computer</a></li>
                                <li><a href="#">Gadets</a></li>
                            </ul>                        
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-newsletter">
                            <h2 class="footer-wid-title">Newsletter</h2>
                            <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                            <div class="newsletter-form">
                                <form action="#">
                                    <input type="email" placeholder="Type your email">
                                    <input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        -->
        
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright">
                            <p>&copy; 2017 Cyberia TechLab. Todos los derechos reservados.</p>
                        </div>
                    </div>
                    
                    <!-- <div class="col-md-4">
                        <div class="footer-card-icon">
                            <i class="fa fa-cc-discover"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-paypal"></i>
                            <i class="fa fa-cc-visa"></i>
                        </div>
                    </div> -->
                </div>
            </div>
        </div> <!-- End footer bottom area -->
       
        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>
        
        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        <!-- jQuery sticky menu -->
        {!!Html::script('frontend/js/owl.carousel.min.js')!!}
        {!!Html::script('frontend/js/jquery.sticky.js')!!}
        
        <!-- jQuery easing -->
        {!!Html::script('frontend/js/jquery.easing.1.3.min.js')!!}
        
        <!-- Main Script -->
        {!!Html::script('frontend/js/main.js')!!}
        
        <!-- Slider -->
        {!!Html::script('frontend/js/bxslider.min.js')!!}
        {!!Html::script('frontend/js/script.slider.js')!!}
        {!!Html::script('frontend/js/bootstrap-datepicker.js')!!}
        @yield('custom_script')
    </body>
</html>