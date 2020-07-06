@extends('layout.web.app')

@section('content')
<section id="post" class="post-page-content inner-page-mid-content">
    <div class="container-fluid" style="margin: 0 auto !important;">
      <div class="row">
        @include('web.common.leftsidebar')
        <div class="col-lg-7 col-sm-8 col-md-7 col-xs-12">
          <div class="suggestion-box">
            <div class="row col-lg-12 text-center" style="padding-left: 7%;margin-top: 1%">
              <span style="font-size: 17px;color: #373737;line-height: 25px;font-weight: 900;">Following</span>
            </div>
            <div class="row">

              @if(count($data2['records'])>0)
                <?php $k = ($pageNo == 1) ? $pageNo : (($pageNo - 1) * $record_per_page) + 1;
                $date = ''; ?>
                @foreach($data2['records'] as $row)
                  <div class="col-md-4 col-xs-6">
                    <div class="suggestion-card">
                      <a href="{{route('profile',$row->id)}}">
                        <img src="/image/profileImages/{{$row->profile_pic}}" class="suggestion-pic">
                        <span class="suggestion-card__name"> {{$row->first_name}} {{$row->last_name}} </span>
                        <!-- <span class="suggestion-card__cities">New Delhi</span> -->
                      </a>
                      <a class="join-btn mt-3" href="{{route('profile',$row->id)}}">Profile</a>
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
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  {!! $data2['records']->links() !!}
                </ul>
              </div>
            </div>
          </div>
          <div class="suggestion-box" style="margin-top: 1%">
            <div class="row col-lg-12 text-center" style="padding-left: 7%;margin-top: 1%">
              <span style="font-size: 17px;color: #373737;line-height: 25px;font-weight: 900;">Discover Members</span>
            </div>
            <div class="row">

              @if(count($data['records'])>0)
                <?php $k = ($pageNo == 1) ? $pageNo : (($pageNo - 1) * $record_per_page) + 1;
                $date = ''; ?>
                @foreach($data['records'] as $row)
                  <div class="col-md-4 col-xs-6">
                    <div class="suggestion-card">
                      <a href="{{route('profile',$row->id)}}">
                        <img src="/image/profileImages/{{$row->profile_pic}}" class="suggestion-pic">
                        <span class="suggestion-card__name"> {{$row->first_name}} {{$row->last_name}} </span>
                        <!-- <span class="suggestion-card__cities">New Delhi</span> -->
                      </a>
                      <a class="join-btn mt-3" href="{{route('profile',$row->id)}}">Profile</a>
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
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  {!! $data['records']->links() !!}
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12" style="padding-left: 0;">
          <div class="post-right">
            <div class="watched">
              <h4>
                <img src="/web/timeline/images/most.png" class="most-pic img-responsive">
                <span>Most Watched</span>
                <a href="#">
                  <i class="fas fa-cog"></i>
                </a>
              </h4>
              <div class="wtch-vid">

                <div class="slides-part">
                  <div class="mySlides">
                    <div class="numbertext">1 / 4</div>
                    <img src="/web/timeline/images/wtch-vid.png" class="wtch-pic img-responsive">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">2 / 4</div>
                    <img src="/web/timeline/images/wtch-vid2.png" class="wtch-pic img-responsive">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">3 / 4</div>
                    <img src="/web/timeline/images/wtch-vid.png" class="wtch-pic img-responsive">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">4 / 4</div>
                    <img src="/web/timeline/images/wtch-vid2.png" class="wtch-pic img-responsive">
                  </div>



                  <a class="prev" onclick="plusSlides(-1)">❮</a>
                  <a class="next" onclick="plusSlides(1)">❯</a>

                  <div class="caption-container">
                    <p id="caption"></p>
                  </div>

                  <div class="row">
                    <div class="column">
                      <div class="demo cursor" onclick="currentSlide(1)" alt="The Woods">1</div>
                    </div>
                    <div class="column">
                      <div class="demo cursor" onclick="currentSlide(2)" alt="Cinque Terre">2</div>
                    </div>
                    <div class="column">
                      <div class="demo cursor" onclick="currentSlide(3)" alt="Nature and sunrise">3</div>
                    </div>
                    <div class="column">
                      <div class="demo cursor" onclick="currentSlide(4)" alt="Snowy Mountains">4</div>
                    </div>


                  </div>
                </div>

                <div class="wtch-text">

                  <ul>
                    <li> of 27</li>
                    <li>
                      <a href="#">
                        <i class="fas fa-pause"></i>
                      </a>
                    </li>
                    <li class="last">
                      <a href="#">
                        <i class="fas fa-volume-mute"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="images-img">
              <img src="/web/timeline/images/add2.png" class="add2-pic img-responsive">
            </div>
            <div class="watched watched2">
              <h4>
                <img src="/web/timeline/images/moment.png" class="most-pic img-responsive">
                <span>Moments</span>
                <a href="#">
                  <i class="fas fa-cog"></i>
                </a>
              </h4>
              <div class="watched2-row">
                <!--<h4><img src="/web/timeline/images/moment2.png" class="most-pic img-responsive"><span>Moments</span></h4>-->
                <ul class="watched-list" style="display:none;">
                  <li>
                    <a href="#">Post</a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="far fas fa-play-circle"></i>
                    </a>
                  </li>
                  <li class="last">
                    <a href="#">
                      <i class="far fas fa-eye"></i>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="watched-box">
                <div class="clear"></div>
                <div class="view-pics view-pics2">

                  <div class="view11 view_small new11">
                    <div class="view1 gal1">

                      <div class="overlay"></div>
                      <img src="/web/timeline/images/view2.png" class="vw-pic img-responsive">
                      <div class="inner-text">

                        <img src="/web/timeline/images/red-avtar.png" class="rvavtr img-responsive">
                        <h3>Sue Fields</h3>
                      </div>
                      <div class="inner-text2">

                        <img src="/web/timeline/images/play2.png" class="rvavtr img-responsive">
                        <h3>Watch Moments</h3>
                      </div>

                    </div>
                  </div>

                  <div class="view11 view_small new11">

                    <div class="view1 view2 gal1">
                      <div class="overlay"></div>
                      <img src="/web/timeline/images/view3.png" class="vw-pic img-responsive">
                      <div class="inner-text">
                        <img src="/web/timeline/images/red-avtar.png" class="rvavtr img-responsive">
                        <h3>Share a Moment</h3>
                      </div>
                      <div class="inner-text2">
                        <img src="/web/timeline/images/camera2.png" class="rvavtr img-responsive">
                        <h3>Share a Moment</h3>
                      </div>

                    </div>
                  </div>

                  <div class="view11 view_small new11">
                    <div class="view1 gal1  gal3">
                      <div class="overlay"></div>
                      <img src="/web/timeline/images/view4.png" class="vw-pic img-responsive">
                      <div class="inner-text">

                        <img src="/web/timeline/images/red-avtar.png" class="rvavtr img-responsive">
                        <h3>Jim Home</h3>
                      </div>
                      <div class="inner-text2">

                        <img src="/web/timeline/images/play2.png" class="rvavtr img-responsive">
                        <h3>Watch Moments</h3>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="watched-3">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item col-lg-3 col-sm-3 col-6">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">best</a>
                </li>
                <li class="nav-item nav-item col-lg-3 col-sm-3 col-6">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">trend</a>
                </li>
                <li class="nav-item nav-item col-lg-3 col-sm-3 col-6">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">rising </a>
                </li>
                <li class="nav-item nav-item col-lg-3 col-sm-3 col-6">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="false">news</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-1.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Director Bong Jo-on Hio + main cast of ‘Parasite’ attend lunch on wish president Moon just in at the
                        blue House.</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-2.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Yo allegadly tradmarks “BaseMon” alongside “Baby Monstars”</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 2 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-3.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>ONE’s Miyawaj Sakura revealed to have been in tears during her return broadcasr as DJ of “Tonight,
                        Under the Cherry” Blossom Tree</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-2.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-3.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-1.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-1.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-2.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-3.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-2.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-3.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                  <div class="row t-b-normal">
                    <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                      <img src="/web/timeline/images/tab-1.png" alt="" />
                    </div>
                    <div class="col-lg-9 col-sm-8 xs-center col-12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-1.png" alt="" /> 1 hour ago</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-2.png" alt="" /> 0</a>
                      <a href="#">
                        <img src="/web/timeline/images/tab-icon-3.png" alt="" /> 1123</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="market-classifieds">
              <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                  <h3>
                    <img src="/web/timeline/images/market-1.png" alt="" /> Market Classifieds</h3>
                </div>
              </div>
              <div class="row all-space">
                <div class="col-lg-6 normal-space col-sm-6 col-12">
                  <div class="images" style="background:url(/web/timeline/images/img-1.png) 50% 50% no-repeat; background-size:cover;">
                    <span>$10,500</span>
                    <a href="#">
                      <img src="/web/timeline/images/new-cross.png" alt="" />
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 normal-space col-sm-6 col-12">
                  <div class="images" style="background:url(/web/timeline/images/img-2.png) 50% 50% no-repeat; background-size:cover;">
                    <span>$18</span>
                    <a href="#">
                      <img src="/web/timeline/images/new-cross.png" alt="" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- right side bar start from there..  -->

        <div class="col-lg-1 col-sm-2 col-md-1 col-xs-1 vd-post-pos-right-outer" style="padding: 0px; margin: 0px;">
          <div class="post-left vd-post-right">
            <div id="mySidebar1" class="sidebar" style="left: -170px !important;">
              <div class="fixed-part">
                <div class="home">
                  <div class="container">
                    <div class="neew1">
                      <div onclick="topFunction()" id="myBtn1" class="neew">
                        <span style="float: right !important;margin-right: 35px !important;">Hide Community Affairs </span>
                        <a href="javascript:void(0)" class="closebtn" style="left: -30px !important;" onclick="closeNav1()">
                          <img src="/web/timeline/images/list-arrow.png" class="bk img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/one.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/two.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/three.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/four.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/five.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/six.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/seven.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/eight.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/nine.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/ten.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/11.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/12.png" class="ab img-responsive">
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
                              <img style="margin: 0px 7px !important;" src="/web/timeline/images/13.png" class="ab img-responsive">
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
                    <img src="/web/timeline/images/back.png" class="menu-pic img-responsive">
                  </a>
                </li>
              </ul>
              <ul class="two">
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/one.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/two.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/three.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/four.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a style="color: #000;">&nbsp;&nbsp;&nbsp;
                    <b>Contacts</b>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/five.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/six.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/seven.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/eight.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/nine.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/ten.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/11.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/12.png" class="menu-pic img-responsive">
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="/web/timeline/images/13.png" class="menu-pic img-responsive">
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



<!-- Modal -->
<!-- Modal -->
<div class="modal" id="myModalText">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<div id="myModalImage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div id="myModalVideo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <script src="{{asset('web/js/timeline.js')}}"></script>

  @endsection