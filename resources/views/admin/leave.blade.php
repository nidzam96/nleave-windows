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

                                            @if ($errors->all() )
                                                <div class="alert alert-danger" role="alert">
                                                    <p>Validation error.</p>
                                                    <ul>
                                                        @foreach ($errors->all() as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <br>
                                            @endif

                                            <div role="tabpanel" class="tab-pane active" id="leave">
                                                <form id="applyleave" method="post" action="{{ route('leaves.apply') }}" enctype="multipart/from-data">
                                                    {{ csrf_field() }}

                                                    <div class="form-group" style="margin-top: -28px;">
                                                        
                                                        <div class="form-row">
                                                            <label class="form-label">Select Branch</label>
                                                            <div class="form-controls">
                                                                <select name="branch" id="branch" class="form-control">
                                                                @foreach ($branchview as $branch)
                                                                    <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <label class="form-label">Leave Type</label>
                                                            <div class="form-controls {{ $errors->has('reason') ? 'has-error' : false }}">
                                                                <select name="leaveType" id="leaveType" class="form-control">
                                                                    <option value="">Please select</option>
                                                                    @foreach ($ltview as $ltype)
                                                                        <option value="{{ $ltype->id }}">{{ $ltype->leave_name }}</option>
                                                                    @endforeach
                                                                </select>

                                                                <p id="avails-day"></p>
                                                            </div>
                                                                
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-md-6" style="margin-left: -15px; margin-right: 10px">
                                                                <label class="form-label">Start Date</label>
                                                                <input type="date" name="sdate" id="sdate" class="form-control" style="width: 150px">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="for-label">End Date</label>
                                                                <input type="date" name="edate" id="edate" class="form-control" style="width: 150px">
                                                            </div>
                                                        </div>
                                                        
                                                        <input type="hidden" name="dateDiff" id="dateDiff">

                                                        <br>
                                                        <br>
                                                        <br>

                                                        <div class="form-row" id="ltime">
                                                            <label class="form-label">Time</label>
                                                            <div class="form-controls">
                                                                <select name="ltime" id="halfDay" class="form-control">
                                                                    @foreach ($ltiview as $ltime)
                                                                    <option value="{{ $ltime->id 
                                                                    }}" >{{ $ltime->times_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div> 
                                                        </div>

                                                        <div class="form-row">
                                                            <label>Attachment</label>
                                                            <input type="file" name="attachment" class="form-control">
                                                        </div>

                                                        <div class="form-row">
                                                            <label class="form-label">Reason</label>
                                                            <div class="form-controls {{ $errors->has('reason') ? 'has-error' : false }}">
                                                                <textarea name="reason" id="reason" class="form-control" style="height: 100px"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions" style="margin-left: -130px">
                                                            <button type="submit" id="submitApply" class="btn btn-primary form-btn">Apply for 1 day</button>
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

                        <div class="table-responsive">
                            <table class="table table-bordered" id="leaveTable" width="100%">
                                <thead>
                                    <tr>
                                        @if (Auth::user()->position == 'HR')
                                            <th width="140">Employee</th>
                                            <th width="100">Position</th>
                                        @endif
                                            <th width="120">Application Date</th>
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
                                            @if (Auth::user()->position == 'HR')
                                                <td>{{ $leave->user->name }}</td>
                                                <td>{{ $leave->user->position }}</td>
                                            @endif
                                                <td>{{ $leave->created_at->format('d M Y') }} </td>
                                                <td>{{ $leave->start->format('d M Y') }}</td>
                                                <td>{{ $leave->end->format('d M Y') }}</td>
                                                <td>{{ $leave->days }}</td>
                                                <td>{{ $leave->ltype->leave_name }}</td>
                                                <td>{{ $leave->reason }}</td>
                                                <td></td>

                                            @if (Auth::user()->position == 'HR')
                                                <div class="form-group">
                                                    
                                                    <td>
                                                        <h2 class="btn btn-info">{{ $leave->status }}</h2>

                                                        <br>
                                                        <br>
                                                        
                                                        @if ($leave->status == 'Pending')
                                                            <a href="{{ route('leave.approve', [$leave->id, $leave->user_id, $leave->days, $leave->ltype_id]) }}" type="button" id="btn-approve" class="btn btn-primary">Approve</a>
                                                            <button type="button" id="btn-reject" class="btn btn-danger">Reject</button>
                                                          
                                                            <div id="myModal" class="modal">

                                                              <!-- Modal content -->
                                                              <form method="post" action="{{ route('leave.reject') }}">
                                                                  {{ csrf_field() }}
                                                                  <div class="modal-content">
                                                                    <span class="close">&times;</span>

                                                                    <input type="text" name="remark" class="form-control" placeholder="Enter your reason here">
                                                                    <input type="hidden" name="leave_id" value="{{ $leave->id }}">
                                                                    <input type="hidden" name="user_id" value="{{ $leave->user_id }}">
                                                                    
                                                                    <br>

                                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                                  </div>
                                                              </form>

                                                            </div>
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
