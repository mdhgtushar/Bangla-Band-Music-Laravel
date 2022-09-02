@extends("layout.admin")

@section("content")

<div class="row row--grid">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="{{route("home")}}">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Sign in</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- sign in -->
				<div class="col-12">
					<div class="sign">
						<div class="sign__content">
							<!-- authorization form -->
							<form  action="{{ route('login') }}" method="post" class="sign__form">
							    @csrf
								<a href="{{route("home")}}" class="sign__logo">
									<img src="{{asset("site_images/logoadmin.png")}}" alt="">
								</a>
                                
								<div class="sign__group">
									<input type="text" name="email" class="sign__input" placeholder="Email">
								</div>
   @error('email')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<div class="sign__group">
									<input type="password" name="password" class="sign__input" placeholder="Password">
								</div>
@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
								
								<button class="sign__btn" type="submit" name="submit">Sign in</button>

							</form>
							<!-- end authorization form -->
						</div>
					</div>
				</div>
				<!-- end sign in -->
			</div>
@endsection