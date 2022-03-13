@extends('layoutmodule::user.main')

@section('content')
<div class="login-page">
		<div class="title-info wow fadeInUp animated animated" dir="rtl" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;" lang="ar">
			<h3 class="title">تسجيل دخول</h3>
		</div>
		<div class="widget-shadow">
		
			<div class="login-body wow fadeInUp animated animated" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
				<form action="{{route('customer.loginpost')}}" method="get">
                    @csrf
					<input type="text" class="user" name="email" placeholder="Enter your email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<input type="submit" name="Sign In" value="Sign In">
					<div class="forgot-grid">
						<!-- <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label> -->
					
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>
		</div>

	</div>


@endsection