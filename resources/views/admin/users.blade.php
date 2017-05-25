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
                        <div class="col-md-3 sidebar">
                            <h2 class="title">Manage Team</h2>
                        </div>

                        <div class="col-md-4 section-group-edit">
                            <p class="field-group-name"  id="group-name">Everyone</p>
                            
                            <div class="field-edit-group-button hidden">
                                <i class="glyphicon glyphicon-pencil btnEditGroup"></i>
                            </div>

                            <div class="field-edit-group-form hide">
                                <form id="form-edit-group" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control form-field-group-name" name="new_group_name" value="Everyone"/>
                                        </div>
                                        <div class="col-md-8">
                                            <button type="submit" class="field btn btn-primary">Save</button>
                                            <a id="btnCancelEditGroup">Cancel</a>
                                            <a id="btnDeleteGroup">Remove Group</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="section-actions pull-right">
                                <a href="#" class="btn btn-default bnt-export-team-data">
                                    <i class="glyphicon glyphicon-export"></i>
                                    Export team data
                                </a>

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
                            <button class="btn btn-default btn-block" id="btnCreateGroup">Drop or click here to create group</button>
                        </div>

                        <div class="col-md-2 col-sm-2 top30">
                            <select name="field-job-position" id="field-job-position" class="form-control">
                                <option value="">Job Position</option>
                                <option value="Developer">Developer</option>
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
                                <option value="">Others</option>
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
                            <div class="col-md-3 col-sm-3">
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
                            </div>

                            <div class="col-md-9">
                                <p class="top20 tcenter">Assign employees to a group by selecting everyone, then dragging the person into the group at left hand side.</p>

                                <div class="row">
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
                                </div>

                                <ul class="users grid" style="position: relative; height: 126px">
                                    <li class="user visible ui-draggable ui-draggable-handle" style="position: absolute; left: 0; top: 0">
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
