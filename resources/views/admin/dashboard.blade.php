@extends('admin.layout')

@section('pagetitle','Dashboard')

@section('section')
    <div class="cont">
        <div class="col-md-12">
            <div class="row">
                <ul class="list-clearfix">
                <!-- @if (Auth::user()->position == 'HR')
                    <li class="icon-container">
                        <a href="{{ url('#') }}">
                            <i class="icon fa fa-building" aria-hidden="true"></i>
                        </a>
                        <div>Company Settings</div>
                    </li>
                @endif -->
                @if (Auth::user()->role == 1)
                    <li class="icon-container">
                        <a href="{{ url('/admin/users') }}">
                            <i class="icon fa fa-group" aria-hidden="true"></i>
                        </a>
                        <div>Your Team</div>
                    </li>
                @else
                    <li class="icon-container">
                        <a href="{{ url('/admin/profile') }}">
                            <i class="icon fa fa-group" aria-hidden="true"></i>
                        </a>
                        <div>Your Profile</div>
                    </li>
                @endif                   
                @if (Auth::user()->role == 1)
                    <li class="icon-container">
                        <a href="{{ url('admin/setting') }}">
                            <i class="icon fa fa-cogs" aria-hidden="true"></i>
                        </a>
                        <div>Settings</div>
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
                    <li class="icon-container">
                        <a href="">
                            <i class="icon fa fa-files-o" aria-hidden="true"></i>
                        </a>
                        <div>Claim</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Current Info
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5 table-responsive">
                        <h2 class="title">On Leave</h2>
                        <table class="table table-bordered" id="infoLeaveTable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Branch</th>
                                    <th>Start</th>
                                    <th>Until</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            @foreach ($leave as $leaves)
                                <tbody>
                                    <tr>
                                        <td> {{ $leaves->user->name }} </td>
                                        <td> {{ $leaves->branch->branch_name }} </td>
                                        <td> {{ $leaves->start->format('d-m-Y') }} </td>
                                        <td> {{ $leaves->end->format('d-m-Y') }} </td>
                                        <td> {{ $leaves->status }} </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>

                        {{ $leave->appends(Request::except('page'))->links() }}
                    </div>

                    <div class="col-md-5 col-md-offset-1 table-responsive">
                        <h2 class="title">Claim Application</h2>
                        <table class="table table-bordered" id="infoClaimTable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Application Date</th>
                                    <th>Claim type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            @foreach ($claim as $claims)
                                <tbody>
                                    <tr>
                                        <td> {{ $claims->user->name }} </td>
                                        <td> {{ $claims->date }} </td>
                                        <td> {{ $claims->claim->claim_name }} </td>
                                        <td> {{ $claims->status }} </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>

                        {{ $claim->appends(Request::except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection