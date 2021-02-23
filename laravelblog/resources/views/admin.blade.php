@extends('layouts.app')

@section('content')
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
				        @if(isset($email) && $email=="sudhirsuri43@gmail.com")
								<li class="colorlib-active"><a href="/admin">Admin</a></li>
						@endif
					<li><a href="/home">Hot</a></li>
					<li><a href="/food">Food</a></li>
					<li ><a href="/outdoor">Outdoor</a></li>
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
	    				<div class="row pt-md-4">
				      			<div class="col-md-12">
								  <center>	Admin Panel </center><br><hr>
                                    <form action="/upload" enctype="multipart/form-data" method="post">
										@csrf
										Choose image:<input type="file" name="file" class="form-control">
										Title:<input type="text" name="title" id="" class="form-control">
										Short description:<input type="text" name="sdesc" id="" class="form-control">
										Category:
										<select class="form-control" name="category">
										<option value="hot">Hot</option>
										<option value="food">Food</option>
										<option value="outdoor">Outdoor</option>
										</select>
										
										Full Description:<textarea type="text" name="fdesc" id=""  class="form-control"></textarea>
										<br><br>
										@if (count($errors) > 0)
												@foreach ($errors->all() as $error)
												<div class="alert alert-danger alert-dismissible fade show" id="formMessage" role="alert">
													{{ $error }}
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												@endforeach
										@endif
										<center><input type="submit" name="submit" class="btn btn-primary btn-lg" value="POST"></center>
                                    </form>
									<br>
	            			</div>
								</div>
			    		</div><!-- END-->
			    	</div>	
	    		</div>
	    	</div>
	    </section>
	</div><!-- END COLORLIB-MAIN -->
@endsection
  <!-- loader -->
	