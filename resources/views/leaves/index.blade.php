@extends('layouts.app')
@section('page-title')
Manage Leaves
@endsection
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Manage Leaves</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="box">
           
            <!-- /.box-header -->
            <!-- <div class="box-body table-responsive"> -->
                @if($leaves)
                <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                    <thead>
                        <tr>
                            <th width="10%">User ID</th>
                            <th width="16%">Employee Name</th>
                            <th width="20%">Department Name</th>
                            <th width="10%">Leave Type</th>
                            <th width="10%">Duration</th>
                            <th width="15%">Document Image</th>
                            <th width="05%">Status</th>
                            <th width="05%">Details</th>
                            <th width="13%">Manage</th>{{-- baad me manage ka section hatana hai  --}}
                            {{-- <th width="05%">View Leave</th> --}}
                        </tr>
                    </thead>
                    @foreach($leaves as $leave)
                    <tr>
                        <td>{{ $leave->user_id }}</td>
                        <td>{{ $leave->user->name }}</td>
                        <td>{{ $leave->user->department->departments }}</td>
                        <td>{{ $leave->leave_type }}</td>
                        <td>{{ $leave->duration }}</td>
                        <td>
                            <div class="lightgallery-without-thumb img_section5">
                            @if($leave->document_img == '')
                            <a href="{{asset('/admin/images/no-image.png')}}" class="image-tile"><img src="{{asset('/admin/images/no-image.png')}}" style="width:100% !important;height:100%;border-radius:0px!important;"></a>
                            @else
                            <a href="{{asset('/uploads/leaves/'.$leave->document_img)}}" class="image-tile"><img src="{{asset('/uploads/leaves/'.$leave->document_img)}}" style="width:100% !important;height:100%;border-radius:0px!important;"></a>
                            @endif
                        </div>
                        </td>
                        <td>
                            <form method="post" action="/admin/leaves/{{$leave->id}}/status">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                @if($leave->status == 'APPROVE')
                                <button class="btn btn-info btn-sm"><h5>APPROVE</h5></button>
                                @elseif($leave->status == 'PENDING')
                                <button class="btn btn-warning btn-sm"><h5>PENDING</h5></button>
                                @elseif($leave->status == 'REJECTED')
                                <button class="btn btn-danger btn-sm"><h5>REJECTED</h5></button>
                                @endif
                            </form>
                        </td>
                        <td><a href="/admin/leaves/{{ $leave->id }}/detail" class="btn btn-success btn-a btn-flat btn-sm"> <i class="fa fa-eye"></i></a></td>
                        <td>
                            <form method="post" action="{{route('leaves.destroy',$leave->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger btn-b btn-flat btn-sm"> <i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                            </tr> 
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="row">
                            {{-- <div class="col-sm-6">
                                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                    Showing {{($attendances->currentpage()-1)*$attendances->perpage()+1}} to {{$attendances->currentpage()*$attendances->perpage()}} of {{$attendances->total()}} entries
                                </span>
                            </div> --}}
                            <div class="col-sm-6 text-right">
                                {{-- {{ $attendances->links() }} --}}
                        </div>
                    </div>
                </div>
                @else
                <div class="alert alert-danger">
                    No record found!
                </div>
                @endif
                <!-- /.box-body -->
            </div>
        </section>
    </div>
    </div>
@endsection