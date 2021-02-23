@extends('layouts.app')

@section('content')
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
				        @if(isset($email) && $email=="sudhirsuri43@gmail.com")
								<li><a href="/admin">Admin</a></li>
						@endif
					<li><a href="/home">Hot</a></li>
					<li><a href="/food">Food</a></li>
					<li class="colorlib-active"><a href="/outdoor">Outdoor</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
					<?php
					if(!isset($_SESSION["username"]))
						echo '<li><a href="loginmodule/html/login.html">Login</a></li>';
					else
						echo '<li><a href="loginmodule/php/logout.php">Logout</a></li>';
					?>
				</ul>
			</nav>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
		  <section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4 blogs">
                            <div class="col-lg-8 px-md-5 py-5">
                                <h1 class="mb-3">{{$blog->title}}</h1>
                                <p><img src="{{$blog->imglocation}}" alt="" class="img-fluid"></p>
                                    <p>{{$blog->fdesc}}</p>
                            </div><!-- END-->
				        </div>
                    </div>
				    <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
						<div class="sidebar-box pt-md-4">
						<form action="/search" class="search-form">
						@csrf
							<div class="form-group">
							<span class="icon icon-search"></span>
							<input type="text" name="searchterm" class="form-control" placeholder="Type a keyword and hit enter">
							</div>
						</form>
						</div>
						<div class="sidebar-box ftco-animate">
							<h3 class="sidebar-heading">Categories</h3>
							<ul class="categories">
								@foreach($blogscatcount as $eachblogcat)
								<li><a href="#">{{$eachblogcat->category}}<span>({{$eachblogcat->catcount}})</span></a></li>
								@endforeach
							</ul>
						</div>
						<div class="sidebar-box ftco-animate">
							
							<div class="block-21 mb-4 d-flex">
								<a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
								<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
									<div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
								</div>
							</div>
						</div>
						<div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">

							<div class="sidebar-box ftco-animate">
								<h3 class="sidebar-heading">Archives</h3>
								<ul class="categories">
									<li><a href="#">Decob14 2018 <span>(10)</span></a></li>
									<li><a href="#">September 2018 <span>(6)</span></a></li>
									<li><a href="#">August 2018 <span>(8)</span></a></li>
									<li><a href="#">July 2018 <span>(2)</span></a></li>
									<li><a href="#">June 2018 <span>(7)</span></a></li>
									<li><a href="#">May 2018 <span>(5)</span></a></li>
								</ul>
							</div>
						</div><!-- END COL -->
				</div>
		    </div>
	      </section>
        </div><!-- END COLORLIB-MAIN -->
	</div>
	    </div><!-- END COLORLIB-PAGE -->
@endsection
  <!-- loader -->
  