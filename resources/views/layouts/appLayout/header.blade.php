	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="{{ url('/') }}" class="logo">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li @if(Route::currentRouteName() == 'home') class="active" @endif>
						<a href="{{route('home')}}">Home</a>
					</li>

					<li @if(Route::currentRouteName() == 'products') class="active" @endif>
						<a href="{{route('products')}}">Shop</a>
					</li>

					<li @if(Route::currentRouteName() == 'blog') class="active" @endif>
						<a href="{{route('blog')}}">Blog</a>
					</li>

					<li @if(Route::currentRouteName() == 'contact') class="active" @endif>
						<a href="{{route('contact')}}">Contact</a>
					</li>
					<li @if(Route::currentRouteName() == 'about') class="active" @endif>
						<a href="{{route('about')}}">About</a>
					</li>

				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
				@guest
                    <ul class="main_menu ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
               		</ul>
                @else
				<div class="header-wrapicon2">
					<img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti">0</span>

					<!-- Header cart noti -->
					<div  id="cart" class="header-cart header-dropdown">
						<ul>
							<li class="header-cart-item">
								<div class="header-user-img">
									<img src="images/item-cart-01.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										{{\Auth::user()->name }}
									</a>

									<span class="header-cart-item-info">
										{{\Auth::user()->email }}<br>
										<a href="#">Sittings</a>
									</span>
								</div>
							</li>
							<hr>
							<li class="header-cart-item">
                                <div class="header-cart-item-txt" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
							</li>									
						</ul>
					</div>
				</div>
				@endguest


			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
							@php							
						        if(\Auth::user()){
						            $userId = Auth::user()->id;
						        }else{
						            if (\Cookie::get('Guesst')) {
						                $userId = \Cookie::get('Guesst');
						            }else{
						                $Guesst = uniqid($prefix = 'Guesst_', $more_entropy = TRUE);
						                cookie('Guesst', $Guesst ,  (60 * 24 * 30));
						                $userId = \Cookie::get('Guesst');
						                
						            }
						        } 	
							@endphp					

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-01.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									White Shirt With Pleat Detail Back
								</a>

								<span class="header-cart-item-info">
									1 x $19.00
								</span>
							</div>
						</li>
					</ul>

					<div class="header-cart-total">
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="{{route('cart.index')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    @if (!\Cookie::get('Guesst'))
		<!-- top noti -->
		<div class="flex-c-m size22 bg0 s-text21 pos-relative">
				<strong>Don't be a dick! this app still in development</strong>
				<!--20% off everything!
				<a href="product.html" class="s-text22 hov6 p-l-5">
					Shop Now
				</a>-->

				<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
					<i class="fa fa-remove fs-13" aria-hidden="true"></i>
				</button>
		</div>
	@endif
	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<!-- Logo2 -->
				<a href="{{ url('/') }}" class="logo2">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">
					@auth
						<span class="topbar-email">
							{{\Auth::user()->email }}
						</span>
						<div class="topbar-language rs1-select2">
							<select class="selection-1" name="time">
								<option>USD</option>
								<option>EUR</option>
							</select>
						</div>
					@endauth

							<!-- Header Icon -->
							@guest
			                    <ul class="main_menu ml-auto">

			                        <li class="nav-item">
			                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			                        </li>
			                        <li class="nav-item">
			                            @if (Route::has('register'))
			                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			                            @endif
			                        </li>
			               		</ul>
			                @else
							<div class="header-wrapicon2">
								<img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
								<span class="header-icons-noti">0</span>

								<!-- Header cart noti -->
								<div class="header-cart header-dropdown">
									<ul>
										<li class="header-cart-item">
											<div class="header-user-img">
												<img src="images/item-cart-01.jpg" alt="IMG">
											</div>

											<div class="header-cart-item-txt">
												<a href="#" class="header-cart-item-name">
													{{\Auth::user()->name }}	
												</a>

												<span class="header-cart-item-info">
													{{\Auth::user()->email }}<br>
													<a href="#">Sittings</a>
												</span>
											</div>
										</li>
										<hr>
										<li class="header-cart-item">
			                                <div class="header-cart-item-txt" aria-labelledby="navbarDropdown">
			                                    <a class="dropdown-item" href="{{ route('logout') }}"
			                                       onclick="event.preventDefault();
			                                                     document.getElementById('logout-form').submit();">
			                                        {{ __('Logout') }}
			                                    </a>

			                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                                        @csrf
			                                    </form>
			                                </div>
										</li>									
									</ul>
								</div>
							</div>
							@endguest


						<span class="linedivide1"></span>

						<div class="header-wrapicon2">
							<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">	
							<span class="header-icons-noti">123</span>

							<!-- Header cart noti -->
							<div class="header-cart header-dropdown">
								<ul class="header-cart-wrapitem">
									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="images/item-cart-01.jpg" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												White Shirt With Pleat Detail Back
											</a>

											<span class="header-cart-item-info">
												1 x $19.00
											</span>
										</div>
									</li>

								</ul>

								<div class="header-cart-total">
									Total: $123
								</div>

								<div class="header-cart-buttons">
									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="{{route('cart.index')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											View Cart
										</a>
									</div>

									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Check Out
										</a>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li @if(Route::currentRouteName() == 'home') class="active" @endif>
								<a href="{{route('home')}}">Home</a>
							</li>

							<li @if(Route::currentRouteName() == 'products') class="active" @endif>
								<a href="{{route('products')}}">Shop</a>
							</li>

							<li @if(Route::currentRouteName() == 'blog') class="active" @endif>
								<a href="{{route('blog')}}">Blog</a>
							</li>

							<li @if(Route::currentRouteName() == 'contact') class="active" @endif>
								<a href="{{route('contact')}}">Contact</a>
							</li>
							<li @if(Route::currentRouteName() == 'about') class="active" @endif>
								<a href="{{route('about')}}">About</a>
							</li>

						</ul>
					</nav>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="{{ url('/') }}" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					@auth
						<div class="header-wrapicon2">
							<img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
							<span class="header-icons-noti">0</span>

							<!-- Header cart noti -->
							<div class="header-cart header-dropdown">
								<ul>
									<li class="header-cart-item">
										<div class="header-user-img">
											<img src="images/item-cart-01.jpg" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												{{\Auth::user()->name }}<br>
											</a>

											<span class="header-cart-item-info">
												{{\Auth::user()->email }}<br>
												<a href="#">Sittings</a>
											</span>
										</div>
									</li>
									<hr>
									<li class="header-cart-item">
		                                <div class="header-cart-item-txt" aria-labelledby="navbarDropdown">
		                                    <a class="dropdown-item" href="{{ route('logout') }}"
		                                       onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
		                                        {{ __('Logout') }}
		                                    </a>

		                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                        @csrf
		                                    </form>
		                                </div>
									</li>									
								</ul>
							</div>
						</div>
					@endauth
					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">123</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">								
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $123
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>
					@auth
						<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
							<div class="topbar-child2-mobile">
								<span class="topbar-email">
									{{\Auth::user()->email}}
								</span>

								<div class="topbar-language rs1-select2">
									<select class="selection-1" name="time">
										<option>USD</option>
										<option>EUR</option>
									</select>
								</div>
							</div>
						</li>
					@endauth
					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile" @if(Route::currentRouteName() == 'home') class="active" @endif>
						<a href="{{route('home')}}">Home</a>
					</li>

					<li class="item-menu-mobile" @if(Route::currentRouteName() == 'products') class="active" @endif>
						<a href="{{route('products')}}">Shop</a>
					</li>

					<li class="item-menu-mobile" @if(Route::currentRouteName() == 'blog') class="active" @endif>
						<a href="{{route('blog')}}">Blog</a>
					</li>

					<li class="item-menu-mobile" @if(Route::currentRouteName() == 'contact') class="active" @endif>
						<a href="{{route('contact')}}">Contact</a>
					</li>
					<li class="item-menu-mobile" @if(Route::currentRouteName() == 'about') class="active" @endif>
						<a href="{{route('about')}}">About</a>
					</li>
					<!-- Login / register for mobile -->
					@guest
	                    <ul class="main_menu ml-auto">

	                        <li class="nav-item">
	                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
	                        </li>
	                        <li class="nav-item">
	                            @if (Route::has('register'))
	                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	                            @endif
	                        </li>
	               		</ul>
	                @endguest					
				</ul>
			</nav>
		</div>
	</header>
