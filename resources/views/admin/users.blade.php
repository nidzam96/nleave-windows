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

                        <!-- add new group -->
                        <!-- <div class="col-md-4 section-group-edit">
                            <p class="field-group-name"  id="group-name">Everyone</p>
                            
                            <div class="field-edit-group-button hidden">
                                <i class="glyphicon glyphicon-pencil btnEditGroup"></i>
                            </div>

                            <div class="field-edit-group-form hide">
                                <form id="form-edit-group" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control form-field-group-name" name="new_group_name"/>
                                        </div>
                                        <div class="col-md-8">
                                            <button type="submit" class="field btn btn-primary">Save</button>
                                            <a id="btnCancelEditGroup">Cancel</a>
                                            <a id="btnDeleteGroup">Remove Group</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->

                        <div class="col-md-5">
                            <div class="section-actions pull-right" style="margin-right: -400px">
                                <!-- <a href="#" class="btn btn-default bnt-export-team-data">
                                    <i class="glyphicon glyphicon-export"></i>
                                    Export team data
                                </a> -->

                                <div class="btn-group">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
                                        <i class="fa fa-user-add"></i>
                                        Add employee(s) to team
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('admin.add_user') }}">Add a single employee</a>
                                            <a href="#">Batch add employee</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-3 col-sm-2 left">
                            <button class="btn btn-default btn-block" id="btnCreateGroup">Click here to create group</button>
                        </div>
                        
                            <!-- the popup to create new group -->
                            <div id="myModal" class="modal">

                              <div class="modal-content">
                                <span class="close">&times;</span>

                                <input type="text" name="group_name" class="form-control" placeholder="Group Name">
                                
                                <br>

                                <p>Assign your employees</p>

                                <!-- <a href="" type="button" class="btn btn-danger">Submit</a> -->
                              </div>

                            </div>

                        <div class="col-md-2 col-sm-2 top30">
                            <select name="field-job-position" id="field-job-position" class="form-control">
                                <option value="">Job Position</option>
                                
                                @foreach ($position as $pos)
                                    <option value="{{ $pos->id }}">{{ $pos->position_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 top30">
                            <select  name="field-location" id="field-location" class="form-control">
                                @foreach ($branchview as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 col-sm-2 top30">
                            <select name="field-others" id="field-others" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-2 col-sm-2">
                            <form class="navbar-form search" role="search">
                                <input type="text" class="form-control" placeholder="Search">
                                <button type="submit" class="navbar-form-btn">
                                    <span class="glyphicon glyphicon-search"></span>    
                                </button>
                            </form>
                        </div>          
                    </div>

                    <div class="section-body" style="margin-top: 10px">
                        <div class="row">
                            <!-- <div class="col-md-3 col-sm-3">
                                <div class="section-group-list">
                                    <p class="top20">Groups</p>
                                    <div class="panel-group" id="sidebar">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <i class="glyphicon glyphicon-folder-close"></i>
                                                    <a data-toggle="collapse" data-parent="#sidebar" href="#sidebar_everyone">
                                                        Everyone
                                                    </a>
                                                    <span class="badge pright">0</span>
                                                </div>
                                            </div>
                                            <div id="sidebar_everyone" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>Assigned policies:</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading group-droppable">
                                                <div class="panel-title">
                                                    <i class="glyphicon glyphicon-folder-close"></i>
                                                    <a data-toggle="collapse" data-parent="#sidebar" href="#sidebar_male">
                                                        Male
                                                    </a>
                                                    <span class="badge pright">0</span>
                                                </div>
                                            </div>
                                            <div id="sidebar_male" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>Assigned policies:</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading group-droppable">
                                                <div class="panel-title">
                                                    <i class="glyphicon glyphicon-folder-close"></i>
                                                    <a data-toggle="collapse" data-parent="#sidebar" href="#sidebar_female">
                                                        Female
                                                    </a>
                                                    <span class="badge pright">0</span>
                                                </div>
                                            </div>
                                            <div id="sidebar_female" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>Assigned policies:</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <br>

                            <div class="col-md-12">
                                <!-- <p class="top20 tcenter">Assign employees to a group by selecting everyone, then dragging the person into the group at left hand side.</p> -->
                                

                                <!-- <div class="row">
                                    <p>
                                        <a href="#" class="btn disabled" id="grid_view">
                                            <i class="glyphicon glyphicon-th"></i>
                                            Grid
                                        </a>
                                        <a href="#" class="btn" id="list_view">
                                            <i class="glyphicon glyphicon-th-list"></i>
                                            List
                                        </a>
                                    </p>
                                </div> -->

                                <!-- <ul class="users grid" style="position: relative; height: 126px">
                                    <li class="user visible" style="position: absolute; left: 0; top: 0">
                                        <button class="close btnDeleteUserFromGroup">
                                            <span>X</span>
                                        </button>

                                        <figure class="user-image">
                                            <a href="#">
                                                <img src="../images/nazrol.png" alt="testing" width="60" height="60">
                                            </a>
                                        </figure>

                                        <div class="user-content">
                                            
                                        </div>
                                    </li>
                                </ul> -->
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="employeeTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th >Full Name</th>
                                                <!-- <th >Preferred Name</th> -->
                                                <th >Gender</th>
                                                <th >Email</th>
                                                <th >Branch</th>
                                                <th >Position</th>
                                                <!-- <th >Leave Taken</th> -->
                                            </tr>
                                        </thead>
                                        
                                        @foreach($staff as $sta)
                                            <tbody>
                                                <tr>    
                                                    <td><a href="{{ route('admin.user.profile', $sta->user_id) }}">{{ $sta->full_name }}</a></td>
                                                    <!-- <td>{{ $sta->preffered_name }}</td> -->
                                                    <td>{{ $sta->gender }} </td>
                                                    <td>{{ $sta->email }}</td>
                                                    <td>{{ $sta->branch->branch_name }}</td>
                                                    <td>{{ $sta->position->position_name }}</td>
                                                    <!-- <td>{{ $sta->leave_taken }}</td> -->
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div><!-- /.table -->

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
