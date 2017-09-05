@extends('admin.layout')

@section('pagetitle','Users')

@section('section')   
    <div class="section-2"> 

        <div class="tab-content">
            <div class="tab-pane active" id="team">
                
                <!-- show the errors produce when filling out the form -->
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

                <section class="section-secondary section-team">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="fa fa-plus fa-fw"></span>
                            New HR
                        </div>

                        <div class="panel-body">

                            <a href="{{ url('admin/users') }}" type="button" class="btn btn-success">Back</a>

                            <form action="{{ route('admin.add.hr') }}" method="post">
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
                                            <option value="">Please select</option>
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
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>

                                <div class="row top20">

                                    <div class="col-md-4">
                                        <label>Location</label>
                                        <select name="location" class="form-control">
                                            <option value="">Please select</option>
                                            @foreach ($branch as $branch)
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
                                        <button type="submit" name="submit" class="btn">Submit</button>
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
