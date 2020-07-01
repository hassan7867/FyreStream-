@extends('layout.admin.dashboard')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('manage-users')}}">Cities</a></li>
            <li class="breadcrumb-item active">Edit User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <form role="form" action="{{route('save-user-admin')}}" method="post" id="editUserForm">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="country_name">First Name</label>
                    <input type="text" name="first_name" id="name" class="form-control" id="first_name" placeholder="First Name" value="{{$data->first_name}}">
                    <input type="hidden" name="id" value="{{$data->id}}">
                  </div>

                  <div class="form-group">
                    <label for="country_name">Last Name</label>
                    <input type="text" name="last_name" id="lastname" class="form-control" id="last_name" placeholder="First Name" value="{{$data->last_name}}">
                  </div>


                  <div class="form-group">
                    <label for="country_name">Email</label>
                    <input type="text" name="email" id="email" class="form-control" id="city_name" placeholder="Email" value="{{$data->email}}">
                  </div>

                  <div class="form-group">
                    <label for="country_name">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" id="phone" placeholder="Phone" value="{{$data->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="country_name">Password</label>
                    <input type="password" name="password" id="password" class="form-control" id="password" placeholder="Password">
                  </div>

                   <div class="form-group">
                         <label for="status">Status</label>
                        <select name="status" class="form-control">
                          <option @if(@$data->status=='1') {{'selected'}} @endif value="1">Active</option>
                          <option @if(@$data->status=='0') {{'selected'}} @endif value="0">In-Active</option>
                        </select>
                    </div>
                   <div class="form-group">
                         <label for="email_verified">Email Verified ?</label>
                        <select name="email_verified" class="form-control">
                          <option @if(@$data->email_verified=='1') {{'selected'}} @endif value="1">Yes</option>
                          <option @if(@$data->email_verified=='0') {{'selected'}} @endif value="0">No</option>
                        </select>
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
  
@endsection
