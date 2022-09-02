@extends("layout.client")

@section("content")
<div class="row row--grid">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="{{route("home")}}">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Restore password</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- authorization form -->
				<div class="col-12">
					<div class="sign">
						<div class="sign__content">
							<form action="#" class="sign__form">
								<a href="index.html" class="sign__logo">
									<img src="img/logo.svg" alt="">
								</a>

								<div class="sign__group">
									<input type="text" class="sign__input" placeholder="Email">
								</div>

								<div class="sign__group sign__group--checkbox">
									<input id="remember" name="remember" type="checkbox" checked="checked">
									<label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
								</div>
								
								<button class="sign__btn" type="button">Send</button>

								<span class="sign__text">We will send a password to your Email</span>
							</form>
						</div>
					</div>
				</div>
				<!-- end authorization form -->
			</div>

@endsection