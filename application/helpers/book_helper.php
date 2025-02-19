<?php
    function books_toolbar_1()
    {
        ?>
        	<div class="shop-toolbar mb--30">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-2 col-sm-6">
							<!-- Product View Mode -->
							<div class="product-view-mode">
								<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
								<a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
								</a>
								<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
							</div>
						</div>
						<div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
							<span class="toolbar-status">
								Showing 1 to 9 of 14 (2 Pages)
							</span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
							<div class="sorting-selection">
								<span>Show:</span>
								<select class="form-control nice-select sort-select">
									<option value="" selected="selected">3</option>
									<option value="">9</option>
									<option value="">5</option>
									<option value="">10</option>
									<option value="">12</option>
								</select>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
							<div class="sorting-selection">
								<span>Sort By:</span>
								<select class="form-control nice-select sort-select mr-0">
									<option value="" selected="selected">Default Sorting</option>
									<option value="">Sort
										By:Name (A - Z)</option>
									<option value="">Sort
										By:Name (Z - A)</option>
									<option value="">Sort
										By:Price (Low &gt; High)</option>
									<option value="">Sort
										By:Price (High &gt; Low)</option>
									<option value="">Sort
										By:Rating (Highest)</option>
									<option value="">Sort
										By:Rating (Lowest)</option>
									<option value="">Sort
										By:Model (A - Z)</option>
									<option value="">Sort
										By:Model (Z - A)</option>
								</select>
							</div>
						</div>
					</div>
				</div>
        <?php
    }

    function books_toolbar_2()
    {
        ?>
        	<div class="shop-toolbar d-none">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-2 col-sm-6">
							<!-- Product View Mode -->
							<div class="product-view-mode">
								<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
								<a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
								</a>
								<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
							</div>
						</div>
						<div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
							<span class="toolbar-status">
								Showing 1 to 9 of 14 (2 Pages)
							</span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
							<div class="sorting-selection">
								<span>Show:</span>
								<select class="form-control nice-select sort-select">
									<option value="" selected="selected">3</option>
									<option value="">9</option>
									<option value="">5</option>
									<option value="">10</option>
									<option value="">12</option>
								</select>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
							<div class="sorting-selection">
								<span>Sort By:</span>
								<select class="form-control nice-select sort-select mr-0">
									<option value="" selected="selected">Default Sorting</option>
									<option value="">Sort
										By:Name (A - Z)</option>
									<option value="">Sort
										By:Name (Z - A)</option>
									<option value="">Sort
										By:Price (Low &gt; High)</option>
									<option value="">Sort
										By:Price (High &gt; Low)</option>
									<option value="">Sort
										By:Rating (Highest)</option>
									<option value="">Sort
										By:Rating (Lowest)</option>
									<option value="">Sort
										By:Model (A - Z)</option>
									<option value="">Sort
										By:Model (Z - A)</option>
								</select>
							</div>
						</div>
					</div>
                </div>
        <?php
    }

function book_slider_quick_view()
{
    ?>
    	<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
					aria-labelledby="quickModal" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="product-details-modal">
								<div class="row">
									<div class="col-lg-5">
										<!-- Product Details Slider Big Image-->
										<div class="product-details-slider sb-slick-slider arrow-type-two"
											data-slick-setting='{
                    "slidesToShow": 1,
                    "arrows": false,
                    "fade": true,
                    "draggable": false,
                    "swipe": false,
                    "asNavFor": ".product-slider-nav"
                    }'>
                                                    <div class="single-slide">
												<img src="image/products/product-details-1.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-2.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-3.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-4.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-5.jpg" alt="">
											</div>
										</div>
										<!-- Product Details Slider Nav -->
										<div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
											data-slick-setting='{
                            "infinite":true,
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 4,
                            "arrows": true,
                            "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                            "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
                            "asNavFor": ".product-details-slider",
                            "focusOnSelect": true
                            }'>
                                                            <div class="single-slide">
												<img src="image/products/product-details-1.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-2.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-3.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-4.jpg" alt="">
											</div>
											<div class="single-slide">
												<img src="image/products/product-details-5.jpg" alt="">
											</div>
										</div>
									</div>
									<div class="col-lg-7 mt--30 mt-lg--30">
										<div class="product-details-info pl-lg--30 ">
											<p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
											<h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
											<ul class="list-unstyled">
												<li>Ex Tax: <span class="list-value"> £60.24</span></li>
												<li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a>
												</li>
												<li>Product Code: <span class="list-value"> model1</span></li>
												<li>Reward Points: <span class="list-value"> 200</span></li>
												<li>Availability: <span class="list-value"> In Stock</span></li>
											</ul>
											<div class="price-block">
												<span class="price-new">£73.79</span>
												<del class="price-old">£91.86</del>
											</div>
											<div class="rating-widget">
												<div class="rating-block">
													<span class="fas fa-star star_on"></span>
													<span class="fas fa-star star_on"></span>
													<span class="fas fa-star star_on"></span>
													<span class="fas fa-star star_on"></span>
													<span class="fas fa-star "></span>
												</div>
												<div class="review-widget">
													<a href="#">(1 Reviews)</a> <span>|</span>
													<a href="#">Write a review</a>
												</div>
											</div>
											<article class="product-details-article">
												<h4 class="sr-only">Product Summery</h4>
												<p>Long printed dress with thin adjustable straps. V-neckline and wiring
													under the Dust with ruffles at the bottom
													of the
													dress.</p>
											</article>
											<div class="add-to-cart-row">
												<div class="count-input-block">
													<span class="widget-label">Qty</span>
													<input type="number" class="form-control text-center" value="1">
												</div>
												<div class="add-cart-btn">
													<a href="#" class="btn btn-outlined--primary"><span
															class="plus-icon">+</span>Add to Cart</a>
												</div>
											</div>
											<div class="compare-wishlist-row">
												<a href="#" class="add-link"><i class="fas fa-heart"></i>Add to Wish
													List</a>
												<a href="#" class="add-link"><i class="fas fa-random"></i>Add to
													Compare</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<div class="widget-social-share">
									<span class="widget-label">Share:</span>
									<div class="modal-social-share">
										<a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
										<a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
										<a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
										<a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
    <?php

}


function book_pagination()
{
?>
<div class="row pt--30">
<div class="col-md-12">
    <div class="pagination-block">
        <ul class="pagination-btns flex-center">
            <li><a href="#" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a>
            </li>
            <li><a href="#" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a>
            </li>
            <li class="active"><a href="#" class="single-btn">1</a></li>
            <li><a href="#" class="single-btn">2</a></li>
            <li><a href="#" class="single-btn">3</a></li>
            <li><a href="#" class="single-btn">4</a></li>
            <li><a href="#" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a>
            </li>
            <li><a href="#" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a>
            </li>
        </ul>
    </div>
</div>
</div>
<?php
}


?>