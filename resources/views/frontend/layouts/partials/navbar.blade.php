<!--navgation start here-->
<div class="navgation">
	<div class="fixed-header">
				<div class="top-nav">
						<span class="menu"> </span>
  					<ul>
                <div class="col-md-4">
                  <li><a href="{{ route('home') }}">{{ trans('lang_user.homepage') }}</a></li>
                  <li><a href="#">{{ trans('lang_user.place') }}</a></li>
                  <li><a href="#">{{ trans('lang_user.food_store') }}</a></li>
                  <li><a class="active" href="#">{{ trans('lang_user.food') }}</a></li>
                  <li><a href="#">{{ trans('lang_user.type') }}</a></li>
                  <li><a href="#">{{ trans('lang_user.contact') }}</a></li>
                </div>               
                <div class="col-md-4">
                    <form action="" class="search-form">
                        <div class="form-group has-feedback">
                        <label for="search" class="sr-only">{{ trans('lang_user.search') }}</label>
                        <input type="text" class="form-control" name="search" id="search" placeholder="search">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                      </div>
                    </form>
                </div>
                @if(Auth::check())
                  <li>
                    <img src="{{ url(config('path.avatar').Auth::user()->avatar)}}" title="{{Auth::user()->username}}" class="img-circle sizeimage">
                  </li>
                  <li><a href="#">{{Auth::user()->username}}</a></li> 
                  <li><a href="{{ route('logout') }}">{{ trans('lang_admin.sign_out') }}</a></li> 
                @else
                  <li><a href="{{ route('login') }}">{{ trans('lang_user.login') }}</a></li>
                @endif 
  					</ul> 
				</div>
				<div class="clearfix"> </div>
	</div>
</div>
<!--navgaton end here-->