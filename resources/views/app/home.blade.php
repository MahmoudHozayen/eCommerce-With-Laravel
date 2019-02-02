@extends('layouts.appLayout.masterLayout')
@section('content')
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/master-slide-07.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/master-slide-06.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(images/master-slide-03.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(images/master-slide-01.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>				

			</div>
		</div>
	</section>

	<!-- Banner -->
	@if(!empty($Categories))
		<div class="banner bgwhite p-t-40 p-b-40">
			<div class="container">
				<div class="row">
					@foreach($featured_Categories as $Cat)
						<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
							<!-- block1 -->
							<div class="block1 hov-img-zoom pos-relative m-b-30">
								<img 
									@if(!empty($Cat->categoryImg))
										src="{{ asset('storage/Categories/' . $Cat->categoryImg) }}"
									@else
										src="{{ asset('storage/Avatars/default.jpg') }}"
									@endif
								>
								<div class="block1-wrapbtn w-size2">
									<!-- Button -->
									<a href="{{route('products', $Cat->id)}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
										{{$Cat->name}}
									</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
	<!-- Our product -->
	@if(!empty($Items))
		<section class="bgwhite p-t-45 p-b-58">
			<div class="container">
				<div class="sec-title p-b-22">
					<h3 class="m-text5 t-center">
						Our Products
					</h3>
				</div>

				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#featured" role="tab">Featured</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-35">
						<!-- - -->

						<div class="tab-pane fade show active" id="featured" role="tabpanel">
							<div class="row">
								@foreach($Items as $Item)
									<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
										<!-- Block2 -->
										<div class="block2">
											<div
												class="block2-img wrap-pic-w of-hidden pos-relative
												@if($Item->itemStatus == 1)
													{{ 'block2-labelnew'}}
												@elseif($Item->rating > 7)
													{{ 'block2-labelrate'}}
												@elseif($Item->bestSeller == 1)
													{{ 'block2-labelbest'}}
												@elseif($Item->featured == 1)
													{{ 'block2-labelnew'}}
												@else
													{{ ''}}
												@endif"

											>
												<img 
													@if(!empty($Item->itemImg))
														src="{{ asset('storage/Items/ID_'. $Item->member_id . '/' . $Item->itemImg) }}"
													@else
														src="{{ asset('storage/Avatars/default.jpg') }}"
													@endif
												>
												<div class="block2-overlay trans-0-4">
													<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
														<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
														<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
													</a>

													<div class="block2-btn-addcart w-size1 trans-0-4">
														<!-- Button -->
					                                    <form id="AddtoCart{{ $Item->id }}" action="{{ route('cart.add') }}" method="POST" style="display: none;">
					                                        @csrf
					                                    	<input name="id" value="{{ $Item->id }}">
					                                    	<input name="name" value="{{ $Item->name }}">
					                                    	<input name="price" value="{{ $Item->price }}">
					                                    	<input name="qty" value="1" >
					                                    </form>					                                    														
														<button  onclick="event.preventDefault();
			                                                     document.getElementById('AddtoCart{{ $Item->id }}').submit();" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
															Add to Cart
														</button>
													</div>
												</div>
											</div>

											<div class="block2-txt p-t-20">
												<a href="{{route('product-details', $Item->id)}}" class="block2-name dis-block s-text3 p-b-5">
														{{$Item->name}}
												</a>
												<span class="block2-price m-text6 p-r-5">
													${{$Item->price}}
												</span>

											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
						<!-- - -->
						<div class="tab-pane fade" id="sale" role="tabpanel">
							<div class="row">
									@foreach($sale_Items as $itme)
										<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
											<!-- Block2 -->
											<div class="block2">
												<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale ">
														<img 
															@if(!empty($itme->itemImg))
																src="{{ asset('storage/Items/ID_'. $itme->member_id . '/' . $itme->itemImg) }}"
															@else
																src="{{ asset('storage/Avatars/default.jpg') }}"
															@endif
														>

													<div class="block2-overlay trans-0-4">
														<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
															<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
															<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
														</a>

														<div class="block2-btn-addcart w-size1 trans-0-4">
															<!-- Button -->
						                                    <form id="AddtoCart" action="{{ route('cart.add') }}" method="POST" style="display: none;">
						                                        @csrf
						                                    	<input name="id" value="{{ $Item->id }}">
						                                    	<input name="name" value="{{ $Item->name }}">
						                                    	<input name="price" value="{{ $Item->price }}">
						                                    	<input name="qty" value="1" >
						                                    </form>					                                    														
															<button  onclick="event.preventDefault();
				                                                     document.getElementById('AddtoCart').submit();" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
																Add to Cart
															</button>
														</div>
													</div>
												</div>

												<div class="block2-txt p-t-20">
													<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
														{{$itme->name}}
													</a>
													<span class="block2-oldprice m-text7 p-r-5">
															${{$itme->price}}
													</span>

													<span class="block2-newprice m-text8 p-r-5">
															${{$itme->sale}}
													</span>

												</div>
											</div>
										</div>									
									@endforeach
							</div>
						</div>
						<!--  -->
						<div class="tab-pane fade" id="best-seller" role="tabpanel">
							<div class="row">
								@foreach($bestSeller_Items as $itme)
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelbest">
											<img 
												@if(!empty($itme->itemImg))
													src="{{ asset('storage/Items/ID_'. $itme->member_id . '/' . $itme->itemImg) }}"
												@else
													src="{{ asset('storage/Avatars/default.jpg') }}"
												@endif
											>
											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
														<!-- Button -->
					                                    <form id="AddtoCart" action="{{ route('cart.add') }}" method="POST" style="display: none;">
					                                        @csrf
					                                    	<input name="id" value="{{ $Item->id }}">
					                                    	<input name="name" value="{{ $Item->name }}">
					                                    	<input name="price" value="{{ $Item->price }}">
					                                    	<input name="qty" value="1" >
					                                    </form>					                                    														
														<button  onclick="event.preventDefault();
			                                                     document.getElementById('AddtoCart').submit();" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
															Add to Cart
														</button>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20">
											<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
												{{$itme->name}}
											</a>

											<span class="block2-price m-text6 p-r-5">
												{{$itme->price}}
											</span>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

						<!--  -->
						<div class="tab-pane fade" id="top-rate" role="tabpanel">
							<div class="row">
									@foreach($topRate_Items as $item)						
									<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelrate">
												<img 
													@if(!empty($item->itemImg))
														src="{{ asset('storage/Items/ID_'. $item->member_id . '/' . $item->itemImg) }}"
													@else
														src="{{ asset('storage/Avatars/default.jpg') }}"
													@endif
												>
												<div class="block2-overlay trans-0-4">
													<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
														<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
														<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
													</a>

													<div class="block2-btn-addcart w-size1 trans-0-4">
														<!-- Button -->
					                                    <form id="AddtoCart" action="{{ route('cart.add') }}" method="POST" style="display: none;">
					                                        @csrf
					                                    	<input name="id" value="{{ $Item->id }}">
					                                    	<input name="name" value="{{ $Item->name }}">
					                                    	<input name="price" value="{{ $Item->price }}">
					                                    	<input name="qty" value="1" >
					                                    </form>					                                    														
														<button  onclick="event.preventDefault();
			                                                     document.getElementById('AddtoCart').submit();" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
															Add to Cart
														</button>
													</div>
												</div>
											</div>

											<div class="block2-txt p-t-20">
												<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
													{{ $item->name }}
												</a>

												<span class="block2-price m-text6 p-r-5">
													{{ $item->price }}
												</span>
											</div>
										</div>
									</div>
									@endforeach
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	@endif

	<!-- Instagram -->
	<section class="instagram p-t-60">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				@ follow us on Instagram
			</h3>
		</div>

		<div class="flex-w">
			<!-- Block4 -->
			<?php $i=0; ?>
			@if(isset($result))
				@foreach($result['data'] as $post)
				<?php  if ($i++ == 5):   break;  endif; ?><!-- $i++ is The limit of the fetched values -->				
					<div class="block4 wrap-pic-w">
						<img src="{{ $post['images']['thumbnail']['url'] }}"></a>
						<a href="{{$post['images']['standard_resolution']['url'] }}" class="block4-overlay sizefull ab-t-l trans-0-4">
							<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
								<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
								<span class="p-t-2">{{ $post['likes']['count'] }}</span>
							</span>

							<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
								@if($post['caption']['text'])

									<p class="s-text10 m-b-15 h-size1 of-hidden">
										{{ $post['caption']['text'] }}.
									</p>
								@endif
								@if($post['caption']['from']['username'])
									<span class="s-text9">
										Photo by @ {{  $post['caption']['from']['username'] }}
									</span>
								@endif
							</div>
						</a>
					</div>
				@endforeach
			@endif
		</div>
	</section>

	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Our Blog
				</h3>
			</div>

			<div class="row">
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="images/blog-01.jpg" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									Black Friday Guide: Best Sales & Discount Codes
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>

							<p class="s-text8 p-t-16">
								Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="images/blog-02.jpg" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									The White Sneakers Nearly Every Fashion Girls Own
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>

							<p class="s-text8 p-t-16">
								Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="images/blog-03.jpg" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									New York SS 2018 Street Style: Annina Mislin
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>

							<p class="s-text8 p-t-16">
								Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed hendrerit ligula porttitor. Fusce sit amet maximus nunc
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection