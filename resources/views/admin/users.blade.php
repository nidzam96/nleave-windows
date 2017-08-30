@extends('admin.layout')

@section('pagetitle','Users')

@section('section')
    <div class="section-2">    

        <div class="tab-content">
            <div class="tab-pane active" id="team">
                <section class="section-secondary section-team">
                    
                    <div class="row section-team-title">
                        <div class="col-md-3 sidebar">
                            <h2 class="title">Manage Team</h2>
                        </div>

                        <div class="col-md-5">
                            <div class="section-actions pull-right" style="margin-right: -400px">
                                <div class="btn-group">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
                                        <i class="fa fa-user-add"></i>
                                        Add employee(s) to team
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('admin.add_user') }}">Add a single employee</a>
                                            @if (Auth::user()->role == 1)
                                                <a href="{{ route('admin.add') }}">Add new HR</a>
                                            @endif
                                            <!-- <a href="#">Batch add employee</a> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-md-12">                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="employeeTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th >Full Name</th>
                                                <th>Gender</th>
                                                <th>Email</th>
                                                <th>Branch</th>
                                                <th>Position</th>
                                            </tr>
                                        </thead>
                                        
                                        @foreach($staff as $sta)
                                            <tbody>
                                                <tr>    
                                                    <td><a href="{{ route('admin.user.profile', $sta->user_id) }}">{{ $sta->full_name }}</a></td>
                                                    <td>{{ $sta->gender }} </td>
                                                    <td>{{ $sta->email }}</td>
                                                    <td>{{ $sta->branch->branch_name }}</td>
                                                    <td>{{ $sta->position->position_name }}</td>
                                                </tr>
                                            </tbody>
                                        @endforeach

                                        {{ $staff->appends(Request::except('page'))->links() }}

                                    </table>
                                    
                                    {{ $staff->appends(Request::except('page'))->links() }}

                                </div><!-- /.table -->

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
