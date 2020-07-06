@extends('layout.web.login')

@section('content')

  <div class="let's-make-code">
	<div class="preempdia">
    	<div class="header">
			<div class="container-fluid">
				<div class="header-flex">
					<div class="header-row">
						<div class="logo">
							<a href="index.html" class="logo1"><img src="/web/images/logo1.png" class="img-responsive"></a>
							<a href="index.html" class="logo2"><img src="/web/images/logo2.png" class="img-responsive"></a>
						</div>
                            
						<div class="header-right">
                            <button class="lgn-mobile-hamb"><i class="fa fa-bars"></i></button>
							<ul class="login-nav">
								<li><a href="#"><img src="/web/images/menu1.png" class="mnu1 img-responsive"><span>Global</span></a></li>
								<li><a href="#"><img src="/web/images/menu2.png" class="mnu1 img-responsive"><span>Videos</span></a></li>
                          		<li><a href="#"><img src="/web/images/menu3.png" class="mnu1 img-responsive"><span>Classifieds</span></a></li>
                          		<li><a href="#"><img src="/web/images/menu4.png" class="mnu1 img-responsive"><span>News</span></a></li>
                           		<li class="last"><a class="join" href="#">Join</a></li>
                           	</ul>
						</div>
                        
                        <a class="join join-mob" href="#">Join</a>
					</div>
                    
{{--					<div class="mid-logo">--}}
{{--						<a class="logo3" href="index.html"><img src="/web/images/logo3.png" class="logo-pic img-responsive"></a>--}}
{{--					</div>--}}
				</div>        
			</div>
		</div><!-- end of header -->
        
        <div class="admin">
        	<div class="admin-left">
            	<div id="blog-demo" class="owl-carousel">
                	<div class="item item1">
                    	<figure class="img-block">
                        	<div class="slide-text">
                            	<p>Lorem Ipsum is simply dummy text of the print
ing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
								<h4><a href="#">BRITNEY SPEARS</a>  LOS ANGELES</h4>
                            </div>        
                  		</figure>
                	</div>  
                    
                    <div class="item item2">
                    	<figure class="img-block">
                        	<div class="slide-text">
                            	<p>Lorem Ipsum is simply dummy text of the print
ing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
								<h4><a href="#">BRITNEY SPEARS</a>  LOS ANGELES</h4>
                            </div>        
                  		</figure>
                	</div>  
                    
                    <div class="item item3">
                    	<figure class="img-block">
                        	<div class="slide-text">
                            	<p>Lorem Ipsum is simply dummy text of the print
ing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
								<h4><a href="#">BRITNEY SPEARS</a>  LOS ANGELES</h4>
                            </div>        
                  		</figure>
                	</div>   
                    
                    <div class="item item4">
                    	<figure class="img-block">
                        	<div class="slide-text">
                            	<p>Lorem Ipsum is simply dummy text of the print
ing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
								<h4><a href="#">BRITNEY SPEARS</a>  LOS ANGELES</h4>
                            </div>        
                  		</figure>
                	</div>     
        		</div>
            </div>
        	<div class="admin-right">
                <div class="admin-row">
                        <h3>Free to Join Fyrestream</h3>
                        <div class="admins">
                            <a href="#" class="admn"><img src="/web/images/admin1.png" class="admn-pic img-responsive"></a>
                            <a href="#" class="admn"><img src="/web/images/admin2.png" class="admn-pic img-responsive"></a>
                            <a href="#" class="admn"><img src="/web/images/admin3.png" class="admn-pic img-responsive"></a>
                            <a href="#" class="admn admn4"><img src="/web/images/admin4.png" class="admn-pic img-responsive"></a>
                        </div>
                        
                        <div class="form-part">
                            <form name="registerForm" id="registerForm" action="{{route('save-user')}}" method="post">
                              {{ csrf_field() }}
                                <div class="form1">
                                    <input class="name" type="text" name="first_name" placeholder="First Name">
                                </div>
                                <div class="form1">
                                    <input class="name" type="text" name="last_name" placeholder="Last Name">
                                </div>
                                <div class="form1">
                                    <input class="name" type="text" name="email" placeholder="Enter Email">
                                </div>
                               
                                <div class="form1">
                                    <input class="name" type="password" name="password" placeholder="Enter Password">
                                </div>
                                <div class="form1">
                                    <input class="name" type="password" name="cpassword" placeholder="Enter Confirm Password">
                                </div>
								<div class="form1">
									<select class="form-control name" style="background: #999999!important;" id="sel1" name="gender">
										<option selected>Select Gender</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
										<option value="other">Others</option>
									</select>
								</div>
                                
                                <div class="form1">
                                    <input class="btnn" type="submit" name="Sign Up" value="Sign Up">
                                   
                                    
                                    <p>Fyrestream is an entertainment social network and we respect your privacy. We do not re-distribute or sell your personal information to third-party organizations. Fyrestream will not disclose, without your consent, personal information collected about you, except for certain explicit circumstances in which disclosure is required by law. Read our <a href="#">Privacy Policy</a> for more. 
    By entering this site, you agree to our <a href="#">Terms of Use</a>.</p>
                                    
                                    <a class="creat" href="{{route('user-login')}}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>    
        </div><!-- end of admin -->
        
       @include('web.common.footer')<!-- end of footer -->
   </div>
</div>


@endsection
