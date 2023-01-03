@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Admin
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css') }}">
    

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1></h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    Dashboard
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-12 pull-left">
                                    <span>Total Projects</span>

                                    <div class="number" id="myTargetElement2"> 
                                        {!! 40 !!}
                                    </div>

                                    <i class="livicon pull-right" data-name="thumbnails-big" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                   

                                </div>
                                

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-12 pull-left">
                                    <span>Inprogress Projects</span>

                                    <div class="number" id="myTargetElement2">
                                        {!! 20 !!}
                                    </div>
                                
                                    <a href="/admin/clients">
                                    <i class="livicon pull-right" data-name="spinner-two" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="darkbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-12 pull-left">
                                    <span>Late Projects </span>

                                    <div class="number" id="myTargetElement3">
                                        {!! 4 !!}
                                    </div>

                                    <a href="/admin/appointments">
                                    <i class="livicon pull-right" data-name="alarm" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                    </a>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="goldbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                
                                <div class="square_box col-xs-12 pull-left">
                                    <span>Completed Projects</span>

                                    <div class="number" id="myTargetElement4">
                                        {!! 6 !!}
                                    </div>
                                
                                    <a href="admin/smscredits">
                                    <i class="livicon pull-right" data-name="trophy" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <div class="clearfix"></div>
        <br />
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-12 text-left">
                                    <span>Total Activities </span>

                                    <div class="number" id="myTargetElement1">{!! 9 !!}</div>
                                
                                    <a href="/admin/projects">
                                    <i class="livicon  pull-right" data-name="thumbnails-small" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="darkbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-12 pull-left">
                                    <span>Doing Activities</span>

                                    <div class="number" id="myTargetElement2">
                                        {!! 5 !!}
                                    </div>

                                    <a href="/admin/clients">
                                    <i class="livicon pull-right" data-name="spinner-three" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                   </a>

                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="redbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-12 pull-left">
                                    <span>Late Activities </span>

                                    <div class="number" id="myTargetElement3">
                                        {!! 4 !!}
                                    </div>
                                
                                    <a href="/admin/appointments">
                                    <i class="livicon pull-right" data-name="warning" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                    </a>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palegreenolorbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                
                                <div class="square_box col-xs-12 pull-left">
                                    <span>Complete Activities</span>

                                    <div class="number" id="myTargetElement4">
                                        {!! 0 !!}
                                    </div>
                                
                                    <a href="admin/smscredits">
                                    <i class="livicon pull-right" data-name="glass" data-l="true" data-c="#fff"
                                       data-hc="#fff" data-s="70"></i>
                                    </a>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="clearfix"></div>
        <br />
        
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-danger todolist">
                    <div class="panel-heading border-light">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white"
                               data-l="true"></i>
                            Recent Activity
                        </h4>
                    </div>
                    <div class="panel-body nopadmar">
                        <div class="panel-body" id="slim1">
                            <div class="row">
                                <table class="table table-bordered" id="table" style="height: 10px" >
                                    <thead>
                                        <tr class="filters">
                                            <th>No</th>
                                            <th>Project</th>
                                            <th>Activity</th>
                                            <th>Member</th>
                                            <th>Details</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>School Building</td>
                                            <td>Buy 200 bricks</td>
                                            <td>Laurene Kahema</td>
                                            <td>Paid for 200 bricks </td>
                                            <td>Wed 12 Jan 10:23 AM</td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>School Building</td>
                                            <td>Buy 200 bricks</td>
                                            <td>John Davis</td>
                                            <td>Paid installment for bricks </td>
                                            <td>Mon 16 Jan 08:32AM</td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Maize Farm</td>
                                            <td>Plough field with tractor</td>
                                            <td>Hamisi Kibonde</td>
                                            <td>Evaluated tractor and picked quotations </td>
                                            <td>Thur 23 Feb 12:43PM </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>School Building</td>
                                            <td>Buy 200 bricks</td>
                                            <td>John Davis</td>
                                            <td>Received 200 bricks at sire </td>
                                            <td>Frid 19 Jan 3:56PM </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="row ">
            <div class="col-md-4 col-sm-12">
                <div class="panel panel-danger">
                    <div class="panel-heading border-light">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="mail" data-size="18" data-color="white" data-hc="white"
                               data-l="true"></i>
                            Quick Mail
                        </h4>
                    </div>
                    <div class="panel-body no-padding">
                        <div class="compose row">
                            <label class="col-md-3 hidden-xs">To:</label>
                            <input type="text" class="col-md-9 col-xs-9" placeholder="name@email.com " tabindex="1"/>

                            <div class="clear"></div>
                            <label class="col-md-3 hidden-xs">Subject:</label>
                            <input type="text" class="col-md-9 col-xs-9" tabindex="1" placeholder="Subject"/>

                            <div class="clear"></div>
                            <div class='box-body'>
                                <form>
                                    <textarea class="textarea textarea_home"
                                              placeholder="Write mail content here"></textarea>
                                </form>
                            </div>
                            <br/>

                            <div class="pull-right">
                                <a href="#" class="btn btn-danger">Send</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="panel panel-border">

                    <div class="panel-heading">
                        <h4 class="panel-title pull-left">
                            <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#515763"
                               data-hc="#515763"></i>
                            Visitors Map
                        </h4>

                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="livicon" data-name="settings" data-size="16" data-loop="true" data-c="#515763"
                                   data-hc="#515763"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="panel-collapse collapses" href="#">
                                        <i class="fa fa-angle-up"></i>
                                        <span>Collapse</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="panel-refresh" href="#">
                                        <i class="fa fa-refresh"></i>
                                        <span>Refresh</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="panel-config" href="#panel-config" data-toggle="modal">
                                        <i class="fa fa-wrench"></i>
                                        <span>Configurations</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="panel-expand" href="#">
                                        <i class="fa fa-expand"></i>
                                        <span>Fullscreen</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="panel-body nopadmar">
                        <div id="world-map-markers" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!--for calendar-->
    
    <script src="{{ asset('assets/vendors/fullcalendar/js/fullcalendar.min.js') }}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('assets/vendors/sparklinecharts/jquery.sparkline.js') }}"></script>
    <!-- Back to Top-->
    
    <!--   maps -->
    <script src="{{ asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    
    <!--  todolist-->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>


@stop
