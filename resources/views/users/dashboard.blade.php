<title>Dashboard | Nazrol HR</title>

<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap/dist/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../asset/css/fa/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../../asset/css/dashboard.css">

@extends('layouts.app')

@section('content')
<div class="col12">
    <div class="cont">
        <div class="col-md-12">
            <div class="row">
                <ul class="list-clearfix">
                    <li class="icon-container">
                        <a href="#">
                            <i class="icon fa fa-building" aria-hidden="true"></i>
                        </a>
                        <div>Company Settings</div>
                    </li>
                    <li class="icon-container">
                        <a href="users.php">
                            <i class="icon fa fa-group" aria-hidden="true"></i>
                        </a>
                        <div>Your Team</div>
                    </li>
                    <li class="icon-container">
                        <a href="#">
                            <i class="icon fa fa-calendar" aria-hidden="true"></i>
                        </a>
                        <div>Leave Settings</div>
                    </li>
                    <li class="icon-container">
                        <a href="leave.php">
                            <i class="icon fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <div>Apply Leave</div>
                    </li>
                    <li class="icon-container">
                        <a href="#">
                            <i class="icon fa fa-book" aria-hidden="true"></i>
                        </a>
                        <div>Leave History</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
