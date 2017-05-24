@extends('admin.layout')

@section('pagetitle','Users')

@section('section')
    
    <div class="section-2">
        <div class="tab-content">
            
            <div class="row">
                <div class="col-md-offset-1">
                    <a href="{{ url('admin/users') }}"><u>Back</u> </a>
                </div>
            </div>
        </div>
    </div>
@endsection
