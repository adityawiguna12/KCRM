@extends('layout.main')

@section('title', 'Dashboard | KCRM')

@section('content')

<div class="widget_3">

	<div class="col-sm-3 widget_1_box">
        <div class="wid-social linkedin">
            <div class="social-icon">
                <i class="fa fa-user text-light icon-xlg pull-right"></i>
            </div>
            <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">{{$user}}</h3>
                <h4 class="counttype text-light">Users</h4>
            </div>
        </div>
	</div>
	<div class="col-sm-3 widget_1_box">
        <div class="wid-social youtube">
            <div class="social-icon">
                <i class="fa fa-laptop text-light icon-xlg pull-right"></i>
            </div>
            <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">{{$project}}</h3>
                <h4 class="counttype text-light">Project</h4>
            </div>
        </div>
	</div>
    <div class="col-sm-3 widget_1_box">
        <div class="wid-social skype">
            <div class="social-icon">
                <i class="fa fa-building-o text-light icon-xlg pull-right"></i>
            </div>
            <div class="social-info">
                <h3 class="number_counter bold count text-light start_timer counted">{{$company}}</h3>
                <h4 class="counttype text-light">Company</h4>
            </div>
        </div>
	</div>
    <div class="col-sm-3 widget_1_box">
        <div class="wid-social flickr">
           <div class="social-icon">
               <i class="fa fa-ticket text-light icon-xlg pull-right"></i>
           </div>
           <div class="social-info">
               <h3 class="number_counter bold count text-light start_timer counted">{{$ticket}}</h3>
               <h4 class="counttype text-light">Ticketing</h4>
           </div>
    	</div>
    </div>
    <div class="clearfix"> </div>

</div>


@endsection