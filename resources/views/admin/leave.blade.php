@extends('admin.calendar-layout')

@section('pagetitle','Leave')

@section('section')
    <div class="section-2">
        <div class="tabs" role="tabpanel">
            <ul class="nav-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#apply" role="tab" data-toggle="tab" aria-controls="apply" id="tabApply">
                        Apply for leave
                    </a>
                </li>
                <li role="presentation" style="margin-left: -2px;">
                    <a href="#applications" role="tab" data-toggle="tab" aria-controls="applications" id="tabApplications">
                        View Applications
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="apply" role="tabpanel">
                <section class="section-secondary section-calendar">
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="section-head">
                                <h2 class="title" style="margin-left: 280px">Calendar</h2>
                            </div>

                            <div class="section-head-entry">
                                Plan ahead and make sure your leave doesn't clash with
                                any company or department's events by checking your calendar(s).
                            </div>

                            <div class="top30">
                                <div id='calendar'></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form form-event">
                                <div role="panel" class="tabs">
                                    <div class="form-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="leave">
                                                <form id="applyleave" method="post" action="{{ route('leaves.apply') }}">
                                                    {{ csrf_field() }}
                                                    <!-- <input type="hidden" name="action" value="apply_leave"> -->

                                                    <div class="form-group" style="margin-top: -28px;">
                                                        
                                                        <div class="form-row">
                                                            <label class="form-label">Select Branch</label>
                                                            <div class="form-controls">
                                                                <select name="branch" id="branch" class="form-control">
                                                                @foreach ($branchview as $branch)
                                                                    <option value="{{$branch->id}}" >{{$branch->branch_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="form-row">
                                                            <label class="form-label">Select Employees</label>
                                                            <div class="form-controls">
                                                                <select name="selectEmployee" id="selectEmployee" class="form-control">
                                                                    <option value="{{Auth::user()->id}}" >{{Auth::user()->name}}</option>
                                                                </select>
                                                            </div>
                                                        </div> -->

                                                        <div class="form-row">
                                                            <label class="form-label">Leave Type</label>
                                                            <div class="form-controls">
                                                                <select name="leaveType" id="leaveType" class="form-control">
                                                                @foreach ($ltview as $ltype)
                                                                    <option value="{{ $ltype->id }}"  data-day="{{ $ltype->leave_days}}">{{ $ltype->leave_name }}</option>
                                                                    
                                                                @endforeach
                                                                </select>

                                                                <!-- <p><strong id="avails-day"></strong> Available days</p> -->
                                                            </div>
                                                                
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-md-6" style="margin-left: -15px; margin-right: 10px">
                                                                <label class="form-label">Start Date</label>
                                                                <input type="date" name="sdate" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="for-label">End Date</label>
                                                                <input type="date" name="edate" class="form-control">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="form-row">
                                                            <label class="form-label">Time</label>
                                                            <div class="form-controls">
                                                                <select name="ltime" class="form-control">
                                                                    @foreach ($ltiview as $ltime)
                                                                    <option value="{{ $ltime->id 
                                                                    }}" >{{ $ltime->times_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div> 
                                                        </div>

                                                        <div class="form-row">
                                                            <label class="form-label">Reason</label>
                                                            <div class="form-controls">
                                                                <textarea name="reason" id="reason" class="form-control" style="height: 100px"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions" style="margin-left: -130px">
                                                            <button type="submit" id="submitApply" class="btn btn-primary form-btn">Apply for days</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div role="tabpanel" class="tab-pane" id="applications">
                <section class="section-secondary section-summary">

                    <div class="section-head" >
                        <div class="row">
                         <div class="col-md-10" style="margin-left: 280px">
                           <h2 class="title">Leave Summary</h2><!-- /.section-title -->

                           <p>View and manage your leave applications.</p>
                         </div><!-- /.col-md-10 -->

                       </div><!-- /.row -->
                     </div><!-- /.section-head -->

                     <div class="section-body">
                        
                        <div class="form form-rules leave-table-fitlering">
                            <div class="form-row">
                                <div class="form-controls">
                                    <select id="select_department" name="select_department" class="form-control" required>
                                        <option value="">Select department</option>
                                    </select>
                                </div>
                             
                                <div class="form-controls">
                                    <select id="select_location" name="select_location" class="form-control" required>
                                        <option value="">Select location</option>
                                    </select>
                                </div>
                                
                                <div class="form-controls">
                                    <input id="daterange-summarytable" class = "field date-range-picker  form-control" placeholder="Select date range to filter" value="" >
                                </div>
                             
                                <div class="pull-right" style="padding-top: 0">
                                    <div class="form-controls">
                                        <input class="form-control field" type="text" id="leave_summary_table_search" placeholder="search"/>
                                    </div>
                                    
                                    <div class="form-controls">
                                        <div class="section-actions form-control">
                                            <a href="/leave/view_application?format=csv&q=leave_history" data-href="/leave/view_application?format=csv&q=leave_history" class="link-export">
                                                
                                                <i class="glyphicon glyphicon-export"></i>
                                                Export
                                            </a>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                        
                        <br>
                        <br>
                        <br>

                        <div class="table-resonsive">
                            <table class="table table-bordered" id="leaveTable" width="100%">
                                <thead>
                                    <tr>
                                        @if (Auth::user()->id == '6')
                                            <th width="140">Employee</th>
                                            <th width="100">Position</th>
                                        @endif
                                            <th width="120">Date</th>
                                            <th width="120">From</th>
                                            <th width="120">To</th>
                                            <th width="63">Days</th>
                                            <th width="110">Type</th>
                                            <th width="">Reason</th>
                                            <th width="60">Attachment</th>
                                            <th width="170">Status</th>
                                    </tr>
                                </thead>

                                @foreach($leaves as $leave)
                                    <tbody>
                                        <tr>    
                                            @if (Auth::user()->id == '6')
                                                <td>{{ $leave->user_id }}</td>
                                                <td></td>
                                            @endif
                                                <td>{{ $leave->created_at->format('d M Y') }} </td>
                                                <td>{{ $leave->start->format('d M Y') }}</td>
                                                <td>{{ $leave->end->format('d M Y') }}</td>

                                                @if ($leave->ltime_id == 1)
                                                    <td>{{ $leave->end->format('d') - $leave->start->format('d') + 1 }}</td>
                                                @else
                                                    <td>{{ $leave->end->format('d') - $leave->start->format('d') - 0.5 }}</td>
                                                @endif

                                                <td>{{ $leave->ltype_id }}</td>
                                                <td>{{ $leave->title }}</td>
                                                <td></td>
                                            @if (Auth::user()->id == '6')
                                                <div class="form-group">
                                                    
                                                    <td>
                                                        <h2 class="btn btn-info">{{ $leave->status }}</h2>

                                                        <br>
                                                        <br>
                                                        
                                                        @if ($leave->status != 'Approve' && $leave->status != 'Reject')
                                                            <a href="{{ route('leave.approve', $leave->id) }}" type="button" id="btn-approve" class="btn btn-primary">Approve</a>
                                                            <a href="{{ route('leave.reject', $leave->id) }}" type="button" id="btn-reject" class="btn btn-danger">Reject</a>
                                                        @endif
    
                                                    </td>

                                                </div>
                                            @else
                                                <td><h2 class="btn btn-info" style="margin-top: 0">{{ $leave->status }}</h2></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div><!-- /.table -->
                    
                    </div><!-- /.section-body -->
                </section><!-- /.section-secondary -->
            </div>
        </div>

    </div>


@endsection
