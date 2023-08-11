@extends('admin.layout.master')
@section('page-title')
Manage Attendance
@endsection
@section('main-content')
    <style type="text/css">
      @media print{
        .pri{
        display: none;
        }
        body{
          background-color: blue;
        }
        .timeline-body img{
          width: 50px;
          height: 100px;
        }
      }
      .timeline-body img{
          width: 220px;
        }
    </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Leave Details
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">              
              <img id="myImg1" class="profile-user-img img-responsive img-circle" style="width: 200px;height: 200px" src="/uploads/{{Auth::user()->employee_img}}" alt="User profile picture">
              <div id="myModal1" class="modal">
                <span class="close" style="margin-top:50px; ">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img011" style="width: 100%;" >

                <!-- Modal Caption (Image Text) -->
                <div id="caption1"></div>
              </div>

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->departments}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

              <button class="btn btn-primary pri" onClick="window.print()">Print this page</button>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#timeline" data-toggle="tab">Leave Details</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-dot-circle-o bg-blue"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header bg-blue"><strong>EMPLOYEE ID</strong></h3>
                      <div class="timeline-body">
                        {{$leave->employee_id}}
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-dot-circle-o bg-blue"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header bg-blue"><strong>LEAVE TYPE</strong></h3>
                      <div class="timeline-body">
                        {{$leave->leave_type}}
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-dot-circle-o bg-blue"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header bg-blue"><strong>DURATION</strong></h3>
                      <div class="timeline-body">
                        {{$leave->duration}}
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-dot-circle-o bg-blue"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header bg-blue"><strong>REASON</strong></h3>
                      <div class="timeline-body">
                        {{$leave->reason}}
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-dot-circle-o bg-blue"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header bg-blue"><strong>DOCUMENTS</strong></h3>
                      <div class="timeline-body">
                          <!-- Trigger the Modal -->
                        <img id="myImg" src="/uploads/{{$leave->document_img}}">

                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                          <!-- The Close Button -->
                          <span class="close">&times;</span>

                          <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01" style="width: 100%">

                          <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  
                </ul>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
    @endsection