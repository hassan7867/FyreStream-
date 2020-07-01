@extends('layout.admin.dashboard')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$user_data->name}}'s Verification Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">User  Verification Management</li>
          </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
            	Verification Images :
              <h3 class="d-inline-block d-sm-none">{{$user_data->name}}'s Verification Data</h3>
               @if(count($verification_data_image)>0)

               <div class="col-12">
                <img src="/image/verificationImages/{{$verification_data_image[0]->file_name}}" class="product-image" alt="Product Image">
              </div>
               <div class="col-12 product-image-thumbs">
               @foreach($verification_data_image as $row)
              
              
                <div class="product-image-thumb active"><img src="/image/verificationImages/{{$row->file_name}}" alt="Product Image"></div>
              
              @endforeach
              </div>
              @else
              <div class="col-12">
               No record
              </div>
              @endif
            </div>
            <div class="col-12 col-sm-6">
              Verification Video :
               @if(count($verification_data_video)>0)
               @foreach($verification_data_video as $video)
               <div>
               	<video width="505" height="295" controls>
				  <source src="/image/verificationImages/{{$video->file_name}}" type="video/mp4">
				Your browser does not support the video tag.
				</video>
               </div>
               @endforeach
               @else
              <div class="col-12">
               No record
              </div>
              @endif	


              
             


            </div>
          </div>
          <div class="row">
        <div class="col-12">
          <a  href="{{route('user_verification_requests')}}" class="btn btn-secondary">Cancel</a>

          <a  href="{{route('user_verification_verify',$user_data->id)}}" class="btn btn-success float-right">Mark as Verified</a>

        </div>
      </div>
        
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

  
@endsection
