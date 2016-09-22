@extends('frontend.home')
@section('content')
	<div class="container">
      <div class="row">
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ Auth::user()->username }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                  <form id="img-upload-form" method="post" accept-charset="utf-8" onsubmit="return submitImageForm(this)">
                     <img id="logo-img" onclick="document.getElementById('add-new-logo').click();" src="{{ url(config('path.avatar').Auth::user()->avatar)}}" class="img-circle img-responsive"/>
                     <input type="file" style="display: none" id="add-new-logo" name="file" accept="image/*" onchange="addNewLogo(this)"/>
                     <input type="hidden" name="_token" value="{{ Session::token() }}" />
                  </form>
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>{{ trans('lang_user.profile.username')}}</td>
                        <td>{{ Auth::user()->username }}</td>
                      </tr>
                      <tr>
                        <td>{{ trans('lang_user.profile.email')}}</td>
                        <td><a href="">{{ Auth::user()->email }}</a></td>
                      </tr>
                      <tr>
                        <td>{{ trans('lang_user.profile.fullname')}}</td>
                        <td>{{ Auth::user()->fullname }}</td>
                      </tr>
                   
                      <tr>
                      <tr>
                        <td>{{ trans('lang_user.profile.address')}}</td>
                        <td>{{ Auth::user()->address }}</td>
                      </tr>
                        <tr>
                        <td>{{ trans('lang_user.profile.birthday')}}</td>
                        <td>{{ Auth::user()->birthday }}</td>
                      </tr>
                      <tr>
                        <td>{{ trans('lang_user.profile.phone')}}</td>
                        <td>{{ Auth::user()->phone }}</td>
                      </tr>
                        <td>{{ trans('lang_user.profile.information')}}</td>
                        <td>{{ Auth::user()->information }}</td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary " >{{ trans('lang_user.profile.change_pass')}}</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="{{ route('profile.edit',Auth::user()->id)}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
@section('script')
  <script type="text/javascript">
    var pathprofile = {!! json_encode(config('path.pathprofile')) !!};
  </script>
	<script type="text/javascript" src="{{ url('frontend/js/profile.js') }}"></script>
@endsection
@endsection