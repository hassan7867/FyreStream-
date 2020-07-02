@extends('layout.web.profile')

@section('content')
  <section id="post" class="post-page-content inner-page-mid-content profile-page-outer">
    <div class="container" style="margin: 0 auto !important;">
      <div class="row">
         @include('web.common.leftsidebar')
        <div class="col-lg-10 col-sm-8 col-md-10 col-xs-12">

          <div class="inner-row">
            <div class="inner-flex">
                <div class="inner-left">
                    <div class="inner-head">
                        <h4>{{$user->first_name}} {{$user->last_name}}</h4>
                          <ul>
                            <li>Youtube: <a href="#">{{$user->youtube_link}}</a></li>
                              <li class="last">Instagram : <a href="#">{{$user->insta_link}}</a></li>
                          </ul>
                          <img src="/web/profile/images/hot.png" class="ht img-responsive">
                           @if(Auth::user()->id == $user_id)
                          

                           <div class="edit-pro-btn-outer">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editProfileModal" class="edit-profile-btn new-pro-btn-1">Edit Profile</a>
                          </div>
                           @endif
                          
                          
                      </div>
                      
                      <div class="profiles" style="margin:10px 0px 0px 0px;
  padding:0px 0px 0px 0px;
  position:relative;
  background:url(../image/profileImages/{{$user->profile_pic}}) center center no-repeat;
  background-size:cover;
    width: 100%;
    height: 356px;float:none;
  overflow:hidden;">
                        <div class="in-menu">
                            <ul>
                                <li><a class="active" href="#">About</a></li>
                                  <li><a href="#">Contact</a></li>
                                  <li><a href="#">Groups</a></li>
                                  <li class="last"><a href="#">Message</a></li>
                              </ul>
                          </div>
                      </div>
                      
                      <div class="about-in">
                        <h5>About:</h5>
                          <p>{{$user->about_us}}</p>
          <h6>General Rules:</h6>
                          <p>Respect other members and follow the Lucy Ford Model Channel rules and FyreFox policies.</p>
                          <a href="#" class="rule">Streaming Rules</a>
                      </div>
                  </div>
                  
                  <div class="inner-right">
                  
                    <div class="follow">
                        <h2><img src="/web/profile/images/dott.png" class="dott img-responsive"><span>The world is yours for the taking. Follow destiny.</span></h2>
                          <div class="rate">
                            <div class="rate-left">
                                <a class="star" href="#"><img src="/web/profile/images/star.png" class="str img-responsive"></a>
                                  <ul>
                                    <li><a href="#">4.6 stars</a></li>
                                      <li class="last"><a class="active" href="#">Rate Me!</a></li>
                                  </ul>
                              </div>
                              @if(Auth::user()->id != $user_id && $is_following == 0)
                              <a class="rate-right" href="{{route('follow',$user_id)}}"><img src="/web/profile/images/follow.png" class="follow img-responsive"><span>Follow</span></a>
                              @endif

                              @if(Auth::user()->id != $user_id && $is_following == 1 && $requestStatus == 0)
                                  <a class="rate-right" href="{{route('follow',$user_id)}}"><span style="padding-left: 12px;">Requested</span></a>
                              @endif

                              @if($is_following && $is_following == 1 && $requestStatus == 1)
                              <a class="rate-right" href="javascript:void(0)"><span style="padding-left: 12px;">Following</span></a>
                              @endif
                          </div>
                          
                          <div class="list-menu">
                              <ul>
                                  <li><a class="active" id="spotlight-li" onclick="changeTab()">Spotlight Wall</a></li>
                                  <li><a id="followers-li" onclick="changeTab('followers')">Followers {{$followerNo}}</a></li>
                                  <li><a href="#">Photos</a></li>
                                  <li><a href="#">Videos</a></li>
                                  <li class="last"><a href="#">More</a></li>
                              </ul>
                          </div>
                      </div>

                      <div class="torda">
                          <div class="suggestion-box" id="followers-tab" style="display: none">
                              <div class="row">

                                  @if(count($data2)>0)
                                      <?php $k = ($pageNo == 1) ? $pageNo : (($pageNo - 1) * $record_per_page) + 1;
                                      $date = ''; ?>
                                      @foreach($data2 as $row)
                                          <div class="col-md-4 col-xs-6">
                                              <div class="suggestion-card">
                                                  <a href="{{route('profile',$row->id)}}">
                                                      <img src="/image/profileImages/{{$row->profile_pic}}"
                                                           class="suggestion-pic">
                                                      <span class="suggestion-card__name"> {{$row->first_name}} {{$row->last_name}} </span>
                                                      <!-- <span class="suggestion-card__cities">New Delhi</span> -->
                                                  </a>
                                                  <a class="join-btn mt-3"
                                                     href="{{route('profile',$row->id)}}">Profile</a>
                                              </div>

                                          </div>

                                      @endforeach
                                  @else
                                      <div class="col-md-12 col-xs-12" style="padding-left: 36%">
                                          <div class="suggestion-card" style="width: 44%">
                                              No Suggestions
                                          </div>
                                      </div>
                                  @endif
                                  {{--                            <div class="box-footer clearfix">--}}
                                  {{--                                <ul class="pagination pagination-sm no-margin pull-right">--}}
                                  {{--                                    {!! $data2->links() !!}--}}
                                  {{--                                </ul>--}}
                                  {{--                            </div>--}}
                              </div>
                          </div>

                          <div style="display: block" id="spotlight-wall-tab">
                              @if($isProfile==1)
                                  <div class="box1">
                                      <div class="part1">
                                          <ul class="left">
                                              <li><a class="active" href="javascript:void(0)" data-toggle="modal"
                                                     data-target="#textPostModal" flag="text"><img
                                                              src="/web/profile/images/inverted.png"
                                                              class="left-img img-responsive"><span>Status</span></a>
                                              </li>
                                              <li><a data-toggle="modal" data-target="#textPostModal"><i
                                                              class="far fas fa-image"></i></a></li>
                                              <li><a data-toggle="modal" data-target="#textPostModal"><i
                                                              class="fas fa-video"></i></a></li>

                                          </ul>

                                          <ul class="right">
                                              <li><a href="#"><img src="/web/profile/images/moment.png"
                                                                   class="left-img img-responsive"><span>Moments</span></a>
                                              </li>
                                              <li><a href="#"><img src="/web/profile/images/market.png"
                                                                   class="left-img img-responsive"><span>Market Post</span></a>
                                              </li>
                                              <li class="last"><a href="#"><img src="/web/profile/images/more.png"
                                                                                class="left-img img-responsive"><span>More</span></a>
                                              </li>
                                          </ul>
                                      </div>

                                      <div class="part2">
                                          <div class="part2-left">
                                              <img src="/web/profile/images/tanya2.png" class="tnya img-responsive">
                                          </div>

                                          <div class="part2-right">
                                              <form name="add-text-post" id="addTextPost" method="post"
                                                    action="{{route('add_post_text')}}">
                                                  {{csrf_field()}}
                                                  <textarea class="area2" placeholder="What do you want to share now?"
                                                            name="post_text"></textarea>
                                                  <a class="publish" href="#"><img src="/web/profile/images/send.png"
                                                                                   class="send-img img-responsive"><span
                                                              id="add_text_post">Publish</span></a>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              @endif

                              <?php
                              if(count($data['records']) > 0){
                              $k = ($pageNo == 1) ? $pageNo : (($pageNo - 1) * $record_per_page) + 1;
                              $date = ''; ?>
                              <?php

                              foreach ($data['records'] as $key => $row) {
                              if(!empty($row->post_title)){
                              if($row->post_type == 0){?>

                              @include('web.user.text_post_view')
                              <?php  }elseif($row->post_type == 1){?>
                              @include('web.user.image_post_view')
                              <?php }else{?>
                              @include('web.user.video_post_view')
                              <?php }
                              }else{

                              if($row->post->post_type == 0){?>
                              @include('web.user.sharepost.share_text_post_view')
                              <?php  }elseif($row->post->post_type == 1){?>
                              @include('web.user.sharepost.share_image_post_view')
                              <?php }else{?>
                              @include('web.user.sharepost.share_video_post_view')
                              <?php }
                              }
                              }
                              }else{?>
                              <div class="box2">
                                  <div class="box2-left">
                                      <a href="#">
                                          No Record(s)
                                      </a>
                                  </div>
                              </div>

                              <?php }?>


                              <div class="box-footer clearfix">
                                  <ul class="pagination pagination-sm no-margin pull-right">
                                      {!! $data['records']->links() !!}
                                  </ul>
                              </div>


                          </div>
                      </div>

                    
                  </div>
              </div>
          </div>

        </div>
        


        <!-- right side bar start from there..  -->

        <div class="col-lg-1 col-sm-2 col-md-1 col-xs-1 vd-post-pos-right-outer" style="padding: 0px; margin: 0px;">
          <div class="post-left vd-post-right">
            <div id="mySidebar1" class="sidebar" style="left: -93px !important;">
              <div class="fixed-part">
                <div class="home">
                  <div class="container">
                    <div class="neew1">
                      <div onclick="topFunction()" id="myBtn1" class="neew">
                        <span style="float: right !important;margin-right: 35px !important;">Hide Community Affairs </span>
                        <a href="javascript:void(0)" class="closebtn" style="left: -30px !important;" onclick="closeNav1()">
                          <img src="/web/profile/images/list-arrow.png" class="bk img-responsive">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="about-list">
                  <div class="faq-coll">
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/one.png" class="ab img-responsive">
                              <p style="font-size:11.5px; font-weight: 600;" class="ev">Mike John reacted to your photo </p>
                              <p style="font-size:11.5px;" class="ev"> March 10 at 9:05PM </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/two.png" class="ab img-responsive">
                              <p style="font-size:11.5px; font-weight: 600;" class="ev">Mike John reacted to your photo </p>
                              <p style="font-size:11.5px;" class="ev"> March 10 at 9:05PM </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/three.png" class="ab img-responsive">
                              <p style="font-size:11.5px; font-weight: 600;" class="ev">Mike John reacted to your photo </p>
                              <p style="font-size:11.5px;" class="ev"> March 10 at 9:05PM </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/four.png" class="ab img-responsive">
                              <p style="font-size:11.5px; font-weight: 600;" class="ev">Mike John reacted to your photo </p>
                              <p style="font-size:11.5px;" class="ev"> March 10 at 9:05PM </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <h4 style="text-align: left; background-color: #cccccc;  margin-top: 10px;">&nbsp; &nbsp; &nbsp;Contacts</h4>

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/five.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/six.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/seven.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/eight.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/nine.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/ten.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/11.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/12.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div id="panel-title">
                            <a style="padding: 1px 0px 10px 0px;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                              <img style="margin: 0px 7px !important;" src="/web/profile/images/13.png" class="ab img-responsive">
                              <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;" class="ev">Katie Daviscourt </span>
                              <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="left-menu" onclick="openNav1()">
              <ul class="one">
                <li>
                  <a class="first" href="#">
                    <img src="/web/profile/images/back.png" class="menu-pic img-responsive">
                  </a>
                </li>
              </ul>
              <ul class="two">
                <li>
                  <a href="#">
                    <img src="/web/profile/images/one.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/two.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/three.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/four.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a style="color: #000;">&nbsp;&nbsp;&nbsp;
                    <b>Contacts</b>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/five.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/six.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/seven.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/eight.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/nine.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/ten.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/11.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/12.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/profile/images/13.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li class="setting_black">
                  <a href="#">Settings
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



   <div class="modal fade new-popup-modal" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
      <div class="modal-content">

    

        <div class="modal-body">
        <form id="profileForm" action="{{route('edit_profile_post')}}" method="post" >
      {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{Auth::user()->first_name}}">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{Auth::user()->last_name}}">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">About Us:</label>
            <textarea id="last_name" class="form-control"  placeholder="About Us" name="about_us"> {{Auth::user()->about_us}}</textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">You Tube:</label>
            <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="{{Auth::user()->youtube_link}}">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Instragram:</label>
            <input type="text" class="form-control" id="insta_link" name="insta_link" value="{{Auth::user()->insta_link}}">
          </div>


          <div class="form-group">
            <label for="message-text" class="col-form-label">Upload Profile Pic</label>
            <div id="pimageUpload" class="dropzone"></div>
            <div id="pverificationUploadFormError" class="custom-error" style="display:none">Some Error are in image uploading.</div>
          </div>
        </form>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" id="editProfile" class="btn btn-primary">Post</button>
        </div> -->

        <div class="modal-footer text-right">
          <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>
          <button type="submit"  id="editProfile" class="new-pro-btn-1">Post</button>
        </div>
      </div>
    </div>
  </div>


    <!-- Modal -->
  <div class="modal fade new-popup-modal" id="sharePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="#" method="post" >
      {{csrf_field()}}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div class="popup-custom-hdrs">
           <h2>Say Something</h2>
         </div>

         <textarea class="form-control" name="share_text" id="share_text" placeholder="Say Some Words About This Post"></textarea>
         
        </div>

        <div class="modal-footer text-right">
          <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>
          <button type="button" post_id="" class="new-pro-btn-1 sharePost">Share</button>
        </div>
      </div>
    </div>
    </form>
  </div>


  <!-- Modal -->
<!--   <div class="modal fade new-popup-modal" id="textPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('add_post_text')}}" method="post" >
      {{csrf_field()}}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div class="popup-custom-hdrs">
           <h2>Status Update</h2>
         </div> 
         
         
           <textarea class="form-control" name="post_text" placeholder="Status"></textarea>
         
        </div>

        <div class="modal-footer text-right">
          <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>
          <button type="submit" class="new-pro-btn-1">Post</button>
        </div>
      </div>
    </div>
    </form>
  </div> -->


   <!-- <div class="modal fade new-popup-modal" id="imagePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="imageForm" action="{{route('add_post_image')}}" method="post" >
      {{csrf_field()}}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
        <div class="popup-custom-hdrs">
          <h2>Status Update</h2>
         </div>
           <textarea class="form-control" name="post_text" placeholder="Status"></textarea>

           <div class="form-group">
            <label for="message-text" class="col-form-label">Upload or Drag  Image</label>
            <div id="imageUpload" class="dropzone"></div>
            <div id="verificationUploadFormError" class="custom-error" style="display:none">Some Error are in image uploading.</div>
          </div>
        </div>


        
        <div class="modal-footer text-right">
          <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>
          <button type="submit" id="finishImages"  class="new-pro-btn-1">Post</button>
        </div>
      </div>
    </div>
  </form>
  </div> -->

 <!--   <div class="modal fade new-popup-modal" id="videoPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form action="{{route('add_post_video')}}" method="post" >
      {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-body">
         <div class="popup-custom-hdrs">
           <h2>Status Update</h2>
         </div> 
          <textarea class="form-control" name="post_text"  placeholder="Status"></textarea>
          <hr>
          <textarea class="form-control" name="video_code"  placeholder="Embedded Video Code"></textarea>

        </div>

        <div class="modal-footer text-right">
          <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>
          <button type="submit" class="new-pro-btn-1">Post</button>
        </div>
      </div>
    </form>
    </div>
  </div> -->
  


    <!-- Modal -->
    
        <!-- Modal -->
 <div class="modal fade new-popup-modal" id="textPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="padding: 15px!important;border-bottom: 1px solid #e5e5e5!important;">
                <a type="button" class="close" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Create Post</h4>
            </div>
            <form action="{{route('add_post_text')}}" method="post" >
                <div class="modal-body">
                    <div class="status-profile">
                        <img src="/image/profileImages/15924237810_7.jpg" class="img-circle mr-3" style="width: 46px;height: 46px;">
                        <span class="status-profile__name">Atif Anwar</span>
                    </div>
                    <div>
                        {{csrf_field()}}
                        <textarea class="form-control" name="post_text" placeholder="Write something here..."></textarea>
                    </div>
                    <div class="status-badge">
                        <a href="">
                            <span class="badge"> <i class="far fas fa-image"></i> Photo/Video</span>
                        </a>
                        <a href="">
                            <span class="badge"><i class="fas fa-user-plus"></i> Tag Friends</span>
                        </a>
                        <a href="">
                        <span class="badge"><i class="far fa-surprise"></i> Feeling/Activities</span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="new-pro-btn-1 btn-block">Post</button> 
                </div>
            </form>
        </div>
    </div>
        
 </div>

    
  <!--<div class="modal fade new-popup-modal" id="textPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    
  <!--  <div class="modal-dialog" role="document">-->
  <!--    <div class="modal-content">-->
  <!--      <div class="modal-body">-->
  <!--          <ul class="nav nav-pills nav-custom mb-3" id="pills-tab" role="tablist">-->
  <!--            <li class="nav-item">-->
  <!--              <a class="nav-link active" id="pills-text-tab" data-toggle="pill" href="#pills-text" role="tab" aria-controls="pills-text" aria-selected="true">-->
                    
  <!--                  <h2 class="popup-custom-hdrs">Status</h2>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="nav-item">-->
  <!--              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">-->
  <!--                  <h2 class="popup-custom-hdrs">Image </h2>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--            <li class="nav-item">-->
  <!--              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">-->
  <!--                  <h2 class="popup-custom-hdrs">Video </h2>-->
  <!--              </a>-->
  <!--            </li>-->
  <!--          </ul>-->
  <!--          <div class="tab-content" id="pills-tabContent">-->
             
  <!--            <div class="tab-pane show active" id="pills-text" role="tabpanel" aria-labelledby="pills-text-tab">-->
  <!--               <form action="{{route('add_post_text')}}" method="post" >-->
  <!--               {{csrf_field()}}-->
  <!--              <textarea class="form-control" name="post_text" placeholder="Status"></textarea>-->
  <!--              <div class="modal-footer text-right">-->
  <!--            <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>-->
  <!--            <button type="submit" class="new-pro-btn-1">Post</button>-->
  <!--          </div>-->
  <!--            </form>-->
  <!--            </div>-->
              

            
             
  <!--            <div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">-->
  <!--              <form id="imageForm" action="{{route('add_post_image')}}" method="post" >-->
  <!--            {{csrf_field()}}-->
  <!--                <textarea class="form-control" name="post_text" placeholder="Status"></textarea>-->

  <!--                 <div class="form-group mb-0">-->
  <!--                  <label for="message-text" class="col-form-label mt-3">Upload or Drag  Image</label>-->
  <!--                  <div id="imageUpload" class="dropzone"></div>-->
  <!--                  <div id="verificationUploadFormError" class="custom-error" style="display:none">Some Error are in image uploading.</div>-->
  <!--                </div>-->
  <!--                <div class="modal-footer text-right">-->
  <!--                <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>-->
  <!--                <button type="submit" id="finishImages"  class="new-pro-btn-1">Post</button>-->
  <!--              </div>-->
  <!--                </form>-->
  <!--            </div>-->
              
            
            
  <!--            <div class="tab-pane" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">-->
  <!--               <form action="{{route('add_post_video')}}" method="post" >-->
  <!--            {{csrf_field()}}-->
  <!--              <textarea class="form-control" name="post_text"  placeholder="Status"></textarea>-->
  <!--                <hr>-->
  <!--              <textarea class="form-control" name="video_code"  placeholder="Embedded Video Code"></textarea>-->

  <!--               <div class="modal-footer text-right">-->
  <!--              <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel</button>-->
  <!--              <button type="submit" class="new-pro-btn-1">Post</button>-->
  <!--            </div>-->
  <!--               </form>-->

  <!--            </div>-->
             
           
  <!--          </div>-->
  <!--      </div>-->
        
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->



  

 <link href="{{asset('web/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('web/plugins/dropzone/dist/dropzone.js')}}"></script>
  <script src="{{asset('web/js/timeline.js')}}"></script>
  <script type="text/javascript">

      function changeTab(tabName) {
          if (tabName === 'followers') {
              $('#spotlight-li').removeClass('active')
              $('#followers-li').addClass('active');
              document.getElementById('followers-tab').style.display = 'block';
              document.getElementById('spotlight-wall-tab').style.display = 'none';
          } else {
              $('#followers-li').removeClass('active')
              $('#spotlight-li').addClass('active');
              document.getElementById('followers-tab').style.display = 'none';
              document.getElementById('spotlight-wall-tab').style.display = 'block';
          }
      }

     myDropzone = new Dropzone('div#pimageUpload', {
    addRemoveLinks: true,
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    timeout: 40000,
    maxFiles: 1,
    paramName: 'file',
    clickable: true,
    url: "{{route('edit_profile')}}",
    init: function () {
      debugger;

        var myDropzone = this;
        // Update selector to match your button
        $("#editProfile").click(function (e) {
            e.preventDefault();
            debugger;

            //var form = $(this).closest('#dropzone-form');
            
                if (myDropzone.getQueuedFiles().length > 0) {                        
                    myDropzone.processQueue();  
                } else {                       
                    myDropzone.uploadFiles([]);
                     //send empty
                     $("#profileForm").submit(); 
                }                                    
          
            //myDropzone.processQueue();
            
            return false;
        });

        this.on('sending', function (file, xhr, formData) {
          debugger;
            // Append all form inputs to the formData Dropzone will POST
            var data = $("#profileForm").serializeArray();
            $.each(data, function (key, el) {

                formData.append(el.name, el.value);

            });
            console.log(formData);

        });
    },
    error: function (file, response){
      debugger;
      var error_msg = '';
      $.each(response.errors, function (key, el) {
        debugger;
        error_msg += el[0];

      });

       myDropzone.removeAllFiles(true);
      $("#pverificationUploadFormError").html(error_msg);
      $("#pverificationUploadFormError").show();
      return false
        // if ($.type(response) === "string")
        //     var message = response; //dropzone sends it's own error messages in string
        // else
        //     var message = response.message;
        // file.previewElement.classList.add("dz-error");
        // _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        // _results = [];
        // for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        //     node = _ref[_i];
        //     _results.push(node.textContent = message);
        // }
        // return _results;
    },
    successmultiple: function (file, response) {
      debugger;
        console.log(file, response);
        if(response.success == true){
          window.location.reload();
        }
        //debugger;
        // /
    },
    completemultiple: function (file, response) {
        console.log(file, response, "completemultiple");
        //$modal.modal("show");
    },
    reset: function () {
        console.log("resetFiles");
        this.removeAllFiles(true);
    }
});



     myDropzonei = new Dropzone('div#imageUpload', {
    addRemoveLinks: true,
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    timeout: 40000,
    maxFiles: 1,
    paramName: 'file',
    clickable: true,
    url: "{{route('add_post_image')}}",
    init: function () {
      debugger;

        var myDropzonei = this;
        // Update selector to match your button
        $("#finishImages").click(function (e) {
            e.preventDefault();
            myDropzonei.processQueue();
            
            return false;
        });

        this.on('sending', function (file, xhr, formData) {
          debugger;
            // Append all form inputs to the formData Dropzone will POST
            var data = $("#imageForm").serializeArray();
            $.each(data, function (key, el) {

                formData.append(el.name, el.value);

            });
            console.log(formData);

        });
    },
    error: function (file, response){
      debugger;
      var error_msg = '';
      $.each(response.errors, function (key, el) {
        debugger;
        error_msg += el[0];

      });

       myDropzonei.removeAllFiles(true);
      $("#verificationUploadFormError").html(error_msg);
      $("#verificationUploadFormError").show();
      return false
        // if ($.type(response) === "string")
        //     var message = response; //dropzone sends it's own error messages in string
        // else
        //     var message = response.message;
        // file.previewElement.classList.add("dz-error");
        // _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        // _results = [];
        // for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        //     node = _ref[_i];
        //     _results.push(node.textContent = message);
        // }
        // return _results;
    },
    successmultiple: function (file, response) {
      debugger;
        console.log(file, response);
        if(response.success == true){
          window.location = "{{route('timeline')}}";
        }
        //debugger;
        // /
    },
    completemultiple: function (file, response) {
        console.log(file, response, "completemultiple");
        //$modal.modal("show");
    },
    reset: function () {
        console.log("resetFiles");
        this.removeAllFiles(true);
    }
});
</script>
  @endsection
