@extends('backend.layouts.master')

@section('title', trans('lang_admin_manager_user.title_manage_user'))
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-5">
                        @if($user->avatar == null)
                        <img src="{!! asset(config('path.avatar').'profile_default.png') !!}" alt="" class="img-rounded img-responsive" />
                        @else
                        <img src="{!! asset(config('path.avatar').$user->avatar) !!}" alt="" class="img-rounded img-responsive" />
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-7">
                        <h3>{{ $user->fullname }}</h3>
                        <cite title="!! $user->address !!}">{{ $user->address }}<i class="glyphicon glyphicon-map-marker">
                        </i></cite>
                        <ul class="profile">
                            <li>
                                <strong>{!! trans('lang_admin_manager_user.username') !!}:</strong> {{ $user->username }}
                            </li>
                            <li>
                                <strong>{!! trans('lang_admin_manager_user.email_address') !!}:</strong> {{ $user->email }}
                            </li>
                            <li>
                                <strong>{!! trans('lang_admin_manager_user.birthday') !!}:</strong> {!! date(config('path.formatdate'), strtotime($user->bithday)) !!}
                            </li>
                            <li>
                                <strong>{!! trans('lang_admin_manager_user.phone') !!}:</strong> {{ $user->phone }}
                            </li>
                            <li>
                                <strong>{!! trans('lang_admin_manager_user.address') !!}:</strong> {!! $user->address !!}
                            </li>
                            <li>
                                <strong>{!! trans('lang_admin_manager_user.information') !!}:</strong> {{ $user->information }}
                            </li>
                        </ul>
                        <!-- Split button -->
                        <div class="btn-group">
                            <a href="{{ route('admin.user.edit',$user ->id)}}"><button class="btn btn-info">{!! trans('lang_admin_manager_user.edit_user') !!}</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

