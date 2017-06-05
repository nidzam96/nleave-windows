@extends('admin.layout')

@section('pagetitle','Users')

@section('section')   
    <div class="section-2">
        <!-- <div class="tabs" role="tabpanel">
            <ul class="nav-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#team" role="tab" data-toggle="tab">Team</a>
                </li>
            </ul>
        </div> -->      

        <div class="tab-content">
            <div class="tab-pane active" id="team">
                <section class="section-secondary section-team">
                    
                    <div class="row section-team-title">
                        <div class="col-md-3">
                            <a href="{{ url('admin/users') }}"><u>Return to users page</u></a>
                        </div>
                    </div>

                    <div class="row">
                        <form action="{{ route('admin.user.add') }}" method="post">
                            {{ csrf_field() }}
                            
                            <h2>Staff Information</h2>
                            
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
                                    <label>Position</label>    
                                    <input type="text" name="position" class="form-control" required="required">
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Branch</label>
                                    <select name="branch" class="form-control">
                                        @foreach ($branchview as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row top20">
                                <div class="col-md-3 btn-group">
                                    <button type="submit" name="submit" class="btn">Add new employee</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
