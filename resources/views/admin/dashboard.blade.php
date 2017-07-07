@extends('admin.layout')

@section('pagetitle','Dashboard')

@section('section')
    <div class="cont">
        <div class="col-md-12">
            <div class="row">
                <ul class="list-clearfix">
                @if (Auth::user()->position == 'HR')
                    <li class="icon-container">
                        <a href="{{ url('#') }}">
                            <i class="icon fa fa-building" aria-hidden="true"></i>
                        </a>
                        <div>Company Settings</div>
                    </li>
                @endif
                @if (Auth::user()->position == 'HR')
                    <li class="icon-container">
                        <a href="{{ url('/admin/users') }}">
                            <i class="icon fa fa-group" aria-hidden="true"></i>
                        </a>
                        <div>Your Team</div>
                    </li>
                @else
                    <li class="icon-container">
                        <a href="{{ url('#') }}">
                            <i class="icon fa fa-group" aria-hidden="true"></i>
                        </a>
                        <div>Your Profile</div>
                    </li>
                @endif                   
                @if (Auth::user()->position == 'HR')
                    <li class="icon-container">
                        <a href="{{ url('#') }}">
                            <i class="icon fa fa-calendar" aria-hidden="true"></i>
                        </a>
                        <div>Leave Settings</div>
                    </li>
                @endif
                    <li class="icon-container">
                        <a href="{{ url('/admin/leave') }}">
                            <i class="icon fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <div>Apply Leave</div>
                    </li>
                    <li class="icon-container">
                        <a href="{{ url('/admin/leave') }}">
                            <i class="icon fa fa-book" aria-hidden="true"></i>
                        </a>
                        <div>Leave History</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection