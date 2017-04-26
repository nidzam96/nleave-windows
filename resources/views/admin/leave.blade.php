@extends('layouts.app')

@section('content')
    <div class="section-2">
        <div class="tabs" role="tabpanel">
            <ul class="nav-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#apply" role="tab" data-toggle="tab" aria-controls="apply" id="tabApply">
                        Apply for leave
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="apply">
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
                                <div id="calendar"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form form-event">
                                <div role="panel" class="tabs">
                                    <div class="form-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="leave">
                                                <form id="applyleave" method="post">
                                                    <input type="hidden" name="crsfmiddlewaretoken">
                                                    <input type="hidden" name="action" value="apply_leave">

                                                    <div class="form-group" style="margin-top: -28px;">
                                                        
                                                        <div class="form-row">
                                                            <label class="form-label">Select Location</label>
                                                            <div class="form-controls">
                                                                <select name="location" id="location" class="form-control">
                                                                    <option value="Kelantan" selected="selected">Kelantan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <label class="form-label">Select Employees</label>
                                                            <div class="form-controls">
                                                                <select name="selectEmployee" id="selectEmployee" class="form-control">
                                                                    <option value="Nidzam">Nidzam</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <label class="form-label">Leave Type</label>
                                                            <div class="form-controls">
                                                                <select name="leaveType" id="leaveType" class="form-control">
                                                                    <option value="Annual" data-availdays="5.5">Annual</option>
                                                                    <option value="Hospitaliztion" data-availdays="60.0">Hospitalization</option>
                                                                    <option value="Replacement" data-availdays="0.0">Replacement</option>
                                                                    <option value="Sick" data-availdays="14.0">Sick</option>
                                                                </select>
                                                                
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

                                                        <div class="form-row">
                                                            
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
        </div>
    </div>
@endsection
