@extends('layout.admin.dashboard')

@section('content')
<div class="content-wrapper">

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Management</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">User Management</li>
          </ol>
        </div>
        <div class="col-sm-2">
          <!-- <a href="#"><button type="button" class="btn btn-block btn-primary">Add User</button></a> -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive custom-db-table p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>IP</th>
                      <th>Status</th>
                       <th>&nbsp;</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  @if(count($data['records'])>0)
                    <?php $k = ($pageNo == 1) ? $pageNo : (($pageNo - 1) * $record_per_page) + 1; ?>
                    @foreach($data['records'] as $row)
                    <tr>
                      <td>{{$k}}</td>
                      <td>{{$row->first_name}}</td>
                      <td>{{$row->last_name}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->phone}}</td>
                      <td>{{$row->ip_address}}</td>
                      <td> 
                        @if($row->status == 1){{ 'Active' }}@else{{ 'In-Active' }}
                         @endif
                       </td>
                      <td>
                        

                        <td>

                      <a class="btn btn-app" href="{{route('delete-user',[$row->id])}}" onclick="return confirm('Are you sure you want to delete ?');" title ="Delete">
                        <i class="fas fa-trash"></i> Delete
                      </a>
                      <a class="btn btn-app" href="{{route('edit-user',[$row->id])}}"  title ="Edit">
                        <i class="fas fa-edit"></i> Edit
                      </a>

                       <a class="btn btn-app" href="{{route('change_user_status',[$row->id])}}"  title ="{{ $row->status==1 ? 'Deactivate' : 'Activate'}}">
                        <i class="  {{ $row->status==1 ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"></i> Change Status
                      </a>


                      </td>
                    </tr>

                    <?php $k++; ?>     
                      @endforeach
                      @else
                      <tr>
                          <td colspan="8">Record(s) not found.</td>
                      </tr>
                      @endif
                  </tbody>
                </table>
              </div>

               <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                      {!! $data['records']->links() !!}
                  </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
</section>
</div>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
@endsection
