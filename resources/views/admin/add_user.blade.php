@extends('admin.layout')

@section('pagetitle','Users')

@section('section')   
    <div class="section-2"> 

        <div class="tab-content">
            <div class="tab-pane active" id="team">
                <section class="section-secondary section-team">
                    
                    @if ($errors->all() )
                        <div class="alert alert-danger" role="alert">
                            <p>Validation error.</p>
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="fa fa-plus fa-fw"></span>
                            New Staff
                        </div>

                        <div class="panel-body">
                            
                            <a href="{{ url('admin/users') }}" type="button" class="btn btn-success">Back</a>

                            <form action="{{ route('admin.user.add') }}" method="post">
                                {{ csrf_field() }}
                                
                                <h2>Personal Details</h2>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Full Name</label>
                                        <input type="text" name="fullname" class="form-control" required="required">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label>Preferred Name</label>
                                        <input type="text" name="prefername" class="form-control" required="required">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required="required">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row top20">

                                    <div class="col-md-4">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required="required">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Phone Number</label>
                                        <input type="text" name="number" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label>Date Of Birth</label>
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                </div>

                                <h2 class="top30">Employment Info</h2>
                                
                                <div class="row top20">

                                    <div class="col-md-4">
                                        <label>Employee Number</label>
                                        <input type="text" name="empNum" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Start Date</label>
                                        <input type="date" name="sdate" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Reports to</label>
                                        <!-- <input type="text" name="report" class="form-control"> -->
                                        <select name="report" class="form-control">
                                            @foreach ($staff as $sta)
                                                <option value="{{ $sta->preffered_name }}">{{ $sta->preffered_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row top20">
                                    <div class="col-md-4">
                                        <label>Position</label>
                                        <!-- <input type="text" name="position" class="form-control"> -->
                                        <select name="position" class="form-control">
                                            @foreach ($position as $pos)
                                                <option value="{{ $pos->id }}">{{ $pos->position_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Location</label>
                                        <!-- <input type="text" name="location" class="form-control"> -->
                                        <select name="location" class="form-control">
                                            @foreach ($branchview as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label>Department</label>
                                        <input type="text" name="department" class="form-control">
                                    </div>
                                </div>

                                <div class="row top20">
                                    <div class="col-md-3 btn-group">
                                        <button type="submit" name="submit" class="btn">Send invitation</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
