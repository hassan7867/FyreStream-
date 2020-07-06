@extends('layout.web.app')
<style>
    .fake-input { position: relative; width:240px; }
    .fake-input input { display: block;
        width: 529px;
        box-sizing: border-box;
        height: 82px;
        padding-left: 71px;
        padding-bottom: 31px;
        border-radius: 5px}
    .fake-input img { position: absolute; top: 5px; left: 3px }
</style>
@section('content')
    <section id="post" class="post-page-content inner-page-mid-content">
        <div class="container-fluid" style="margin: 0 auto !important;">
            <div class="row">
                @include('web.common.leftsidebar')
                <div class="col-lg-7 col-sm-8 col-md-7 col-xs-12">
                    <div class="post-mid" style="width: 100%">
                        <div class="box1">
                            <div class="part1">
                                <ul class="left">
                                    <li class="first">
                                        <a class="active select-post" data-toggle="modal" data-target="#textPostModal"
                                           flag="text">
                                            <img src="/web/timeline/images/inverted.png"
                                                 class="left-img img-responsive">
                                            <span>Status</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="select-post" data-toggle="modal" data-target="#textPostModal"
                                           flag="image">
                                            <i class="far fas fa-image" style="margin-top: 8px!important;"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="select-post" data-toggle="modal" data-target="#textPostModal"
                                           flag="video">
                                            <i class="fas fa-video" style="margin-top: 8px!important;"></i>
                                        </a>
                                    </li>
                                    <!-- <li class="last">
                                      <a class="select-post" href="javascript:void(0)" flag="gif">
                                        <img src="/web/timeline/images/gif.png" alt="" />
                                      </a>
                                    </li> -->
                                </ul>

                                <ul class="right">
                                    <li>
                                        <a class="active" href="#">
                                            <img src="/web/timeline/images/moment.png" class="left-img img-responsive">
                                            <span>Moments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/web/timeline/images/market-new.png"
                                                 class="left-img img-responsive">
                                            <span>Market Post</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/web/timeline/images/more-new.png"
                                                 class="left-img img-responsive">
                                            <span>More</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="part2">
                                <div class="part2-left">
                                    <img src="/image/profileImages/{{Auth::user()->profile_pic}}"
                                         class="tnya img-responsive img-circle" style="width: 56px;
    height: 54px;">
                                </div>

                                <div class="part2-right" style="width: 86%">
                                    <form name="add-text-post" id="addTextPost" method="post"
                                          action="{{route('add_post_text')}}">
                                        {{csrf_field()}}
                                        <textarea name="post_text" id="LearnMoreBtn" class="area"
                                                  placeholder="What do you want to share now?" data-toggle="modal"
                                                  data-target="#textPostModal" flag="text"></textarea>
                                        <a class="publish" href="#">
                                            <img src="/web/timeline/images/send.png" class="send-img img-responsive">
                                            <span id="add_text_post">Publish</span>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="box2">
                            <div class="view-pics">
                                <a class="nt-textt" href="#">
                                    <img src="/web/timeline/images/cross.png" class="crs img-responsive">
                                </a>
                                <div class="view11">
                                    <div class="view1">
                                        <div class="overlay"></div>
                                        <img src="/web/timeline/images/view1.png" class="vw-pic img-responsive">
                                        <div class="inner-text">
                                            <img src="/web/timeline/images/view_one.png" class="rvavtr img-responsive">
                                            <h3>Sandra Miller</h3>
                                        </div>
                                        <div class="inner-text2">
                                            <img src="/web/timeline/images/play2.png" class="rvavtr img-responsive">
                                            <h3>Watch Moments</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="view11">
                                    <div class="view1">
                                        <div class="overlay"></div>
                                        <img src="/web/timeline/images/view2.png" class="vw-pic img-responsive">
                                        <div class="inner-text">
                                            <img src="/web/timeline/images/view_two.png" class="rvavtr img-responsive">
                                            <h3>Sue Fields</h3>
                                        </div>
                                        <div class="inner-text2">

                                            <img src="/web/timeline/images/play2.png" class="rvavtr img-responsive">
                                            <h3>Watch Moments</h3>
                                        </div>

                                    </div>
                                </div>
                                <div class="view11">
                                    <div class="view1 view2">
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
                                <div class="view11">
                                    <div class="view1">
                                        <div class="overlay"></div>
                                        <img src="/web/timeline/images/view4.png" class="vw-pic img-responsive">
                                        <div class="inner-text">

                                            <img src="/web/timeline/images/view_four.png" class="rvavtr img-responsive">
                                            <h3>Jim Horne</h3>
                                        </div>
                                        <div class="inner-text2">

                                            <img src="/web/timeline/images/play2.png" class="rvavtr img-responsive">
                                            <h3>Watch Moments</h3>
                                        </div>

                                    </div>
                                </div>
                                <div class="view11">
                                    <div class="view1 view3">
                                        <div class="overlay"></div>
                                        <img src="/web/timeline/images/view5.png" class="vw-pic img-responsive">
                                        <div class="inner-text">

                                            <img src="/web/timeline/images/view_five.png" class="rvavtr img-responsive">
                                            <h3>Bobby Manche…</h3>
                                        </div>
                                        <div class="inner-text2">

                                            <img src="/web/timeline/images/play2.png" class="rvavtr img-responsive">
                                            <h3>Watch Moments</h3>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        if(count($data['records']) > 0){
                        $k = ($pageNo == 1) ? $pageNo : (($pageNo - 1) * $record_per_page) + 1;
                        $date = ''; ?>
                        <?php

                        foreach ($data['records'] as $key => $row) {
                        if(!empty($row->post_title)){
                        if($row->post_type == 0){?>
                        @include('web.common.text_post_view')
                        <?php  }elseif($row->post_type == 1){?>
                        @include('web.common.text_post_view')
                        <?php }else{?>
                        @include('web.common.text_post_view')
                        <?php }
                        }else{
                        // dd($row);

                        //$row = $row->post;



                        if($row->post->post_type == 0){?>
                        @include('web.common.sharepost.share_text_post_view')
                        <?php  }elseif($row->post->post_type == 1){?>
                        @include('web.common.sharepost.share_image_post_view')
                        <?php }else{?>
                        @include('web.common.sharepost.share_video_post_view')
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
                <div class="col-lg-3 col-md-3 col-xs-12">
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
                                            <div class="demo cursor" onclick="currentSlide(2)" alt="Cinque Terre">2
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="demo cursor" onclick="currentSlide(3)" alt="Nature and sunrise">
                                                3
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="demo cursor" onclick="currentSlide(4)" alt="Snowy Mountains">4
                                            </div>
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

                                                <img src="/web/timeline/images/red-avtar.png"
                                                     class="rvavtr img-responsive">
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
                                                <img src="/web/timeline/images/red-avtar.png"
                                                     class="rvavtr img-responsive">
                                                <h3>Share a Moment</h3>
                                            </div>
                                            <div class="inner-text2">
                                                <img src="/web/timeline/images/camera2.png"
                                                     class="rvavtr img-responsive">
                                                <h3>Share a Moment</h3>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="view11 view_small new11">
                                        <div class="view1 gal1  gal3">
                                            <div class="overlay"></div>
                                            <img src="/web/timeline/images/view4.png" class="vw-pic img-responsive">
                                            <div class="inner-text">

                                                <img src="/web/timeline/images/red-avtar.png"
                                                     class="rvavtr img-responsive">
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
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">best</a>
                                </li>
                                <li class="nav-item nav-item col-lg-3 col-sm-3 col-6">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile" aria-selected="false">trend</a>
                                </li>
                                <li class="nav-item nav-item col-lg-3 col-sm-3 col-6">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                       aria-controls="contact" aria-selected="false">rising </a>
                                </li>
                                <li class="nav-item nav-item col-lg-3 col-sm-3 col-6">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#news" role="tab"
                                       aria-controls="news" aria-selected="false">news</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-1.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Director Bong Jo-on Hio + main cast of ‘Parasite’ attend lunch on wish
                                                president Moon just in at the
                                                blue House.</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-2.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Yo allegadly tradmarks “BaseMon” alongside “Baby Monstars”</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 2 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-3.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>ONE’s Miyawaj Sakura revealed to have been in tears during her return
                                                broadcasr as DJ of “Tonight,
                                                Under the Cherry” Blossom Tree</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-2.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-3.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-1.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-1.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-2.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-3.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-2.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-3.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                    <div class="row t-b-normal">
                                        <div class="col-lg-3 flush-right col-sm-4 xs-center col-12">
                                            <img src="/web/timeline/images/tab-1.png" alt=""/>
                                        </div>
                                        <div class="col-lg-9 col-sm-8 xs-center col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry</p>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-1.png" alt=""/> 1 hour ago</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-2.png" alt=""/> 0</a>
                                            <a href="#">
                                                <img src="/web/timeline/images/tab-icon-3.png" alt=""/> 1123</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="market-classifieds">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <h3>
                                        <img src="/web/timeline/images/market-1.png" alt=""/> Market Classifieds</h3>
                                </div>
                            </div>
                            <div class="row all-space">
                                <div class="col-lg-6 normal-space col-sm-6 col-12">
                                    <div class="images"
                                         style="background:url(/web/timeline/images/img-1.png) 50% 50% no-repeat; background-size:cover;">
                                        <span>$10,500</span>
                                        <a href="#">
                                            <img src="/web/timeline/images/new-cross.png" alt=""/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 normal-space col-sm-6 col-12">
                                    <div class="images"
                                         style="background:url(/web/timeline/images/img-2.png) 50% 50% no-repeat; background-size:cover;">
                                        <span>$18</span>
                                        <a href="#">
                                            <img src="/web/timeline/images/new-cross.png" alt=""/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- right side bar start from there..  -->

                <div class="col-lg-1 col-sm-2 col-md-1 col-xs-1 vd-post-pos-right-outer"
                     style="padding: 0px; margin: 0px;">
                    <div class="post-left vd-post-right">
                        <div id="mySidebar1" class="sidebar sidebarRight">
                            <div class="fixed-part">
                                <div class="home">
                                    <div class="container">
                                        <div class="neew1">
                                            <div onclick="topFunction()" id="myBtn1" class="neew">
                                                <span style="float: right !important;margin-right: 35px !important;">Hide Community Affairs </span>
                                                <a href="javascript:void(0)" class="closebtn"
                                                   style="left: -30px !important;" onclick="closeNav1()">
                                                    <img src="/web/timeline/images/list-arrow.png"
                                                         class="bk img-responsive">
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
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/one.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/two.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/three.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/four.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 style="text-align: left; background-color: #cccccc;  margin-top: 10px;">
                                                &nbsp; &nbsp; &nbsp;Contacts</h4>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/five.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/six.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/seven.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse2">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/eight.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/nine.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/ten.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/11.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/12.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/timeline/images/13.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
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
    <div class="modal fade new-popup-modal" id="sharePostModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="#" method="post">
            {{csrf_field()}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-custom-hdrs">
                            <h2>Say Something</h2>
                        </div>

                        <textarea class="form-control" name="share_text" id="share_text"
                                  placeholder="Say Some Words About This Post"></textarea>

                    </div>

                    <div class="modal-footer text-right">
                        <button type="button" class="new-pro-btn-1 new-pro-btn-1-border" data-dismiss="modal">Cancel
                        </button>
                        <button type="button" post_id="" class="new-pro-btn-1 sharePost">Share</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade new-popup-modal" id="textPostModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document" style="border: 6px solid black;border-radius: 20px!important;">
            <div class="modal-content">
                <div class="modal-body">
                    {{--<ul class="nav nav-pills nav-custom mb-3" id="pills-tab" role="tablist">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link active" id="pills-text-tab" data-toggle="pill" href="#pills-text"--}}
                               {{--role="tab" aria-controls="pills-text" aria-selected="true">--}}

                                {{--<h2 class="popup-custom-hdrs">Status </h2>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"--}}
                               {{--role="tab" aria-controls="pills-profile" aria-selected="false">--}}
                                {{--<h2 class="popup-custom-hdrs">Image </h2>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"--}}
                               {{--role="tab" aria-controls="pills-contact" aria-selected="false">--}}
                                {{--<h2 class="popup-custom-hdrs">Video </h2>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane show active" id="pills-text" role="tabpanel"
                             aria-labelledby="pills-text-tab">
                            <form action="{{route('add_post_text')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="fake-input">
                                   <span> <input type="text" id="share-post-text-id"  name="post_text"  placeholder="What do you want to share?"/></span>
                                        <img src="/image/profileImages/{{Auth::user()->profile_pic}}"
                                               class="tnya img-responsive img-circle" style="width: 48px;height: 45px;">

                                </div>
                                <div style="  background: #cccccc6b;padding: 13px;margin-top: 2px;text-align: center;" id="drop-area">
                                    <span>Drag and drop image/video here or</span> <span style="color: lightskyblue!important;cursor: pointer" onclick="uploadImage()">Browse</span>
                                    <input type="file" name="photo" id="photo" onchange="readURL(this)" style="display: none">
                                    <div style="display: none;margin-top: 2px!important;" id="show-photos">
                                        <img id="photopreview" style="width: 150px!important;height: 100px!important;">
                                    </div>
                                </div>
                                <div style="padding: 3px!important;background: #cccccc6b;margin-top: 5px">
                                <div class="modal-footer" style="margin-left: -30px!important">

                                        <div class="col-md-4">
                                            <select class="form-control fas" id="sel1" name="sellist1" style="width: 229px!important;font-family: 'Font Awesome 5 Free'">
                                                <option selected class="fas"> &#xf57d; Public Audience</option>
                                                <option class="fas"> &#xf502; Private Audience</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" style="margin-left: 45px!important;" >
                                            <button style="height: 34px!important;border-radius: 5px!important;" >Friends Tagging</button>
                                        </div>
                                    <div class="col-md-1"><i class="fas fa-video" style="border-radius: 5px!important;font-size: 25px;margin-left: -20px;margin-top: 5px;" onclick="embeddVideo()" ></i></div>
                                    <div class="col-md-2" style="margin-left: -19px">
                                        <button type="submit" class="new-pro-btn-1" style="border-radius: 7px;">Post</button>
                                    </div>

                                </div>
                                </div>
                                <div class="modal-footer text-right" style="display: none;margin-left: -30px!important" id="video-div">
                                    <div class="col-md-7">
                                     <input type="text" class="form-control" name="video-link" style="width: 530px!important;" placeholder="Embedd any video link here">
                                    </div>

                                </div>
                                {{--<div class="modal-footer text-right">--}}
                                    {{--<button type="button" class="new-pro-btn-1 new-pro-btn-1-border"--}}
                                            {{--data-dismiss="modal">Cancel--}}
                                    {{--</button>--}}
                                    {{--<button type="submit" class="new-pro-btn-1">Post</button>--}}
                                {{--</div>--}}
                            </form>
                        </div>


                        {{--<div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">--}}
                            {{--<form id="imageForm" action="{{route('add_post_image')}}" method="post">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<textarea class="form-control" name="post_text" placeholder="Status"></textarea>--}}

                                {{--<div class="form-group mb-0">--}}
                                    {{--<label for="message-text" class="col-form-label mt-3">Upload or Drag Image</label>--}}
                                    {{--<div id="imageUpload" class="dropzone"></div>--}}
                                    {{--<div id="verificationUploadFormError" class="custom-error" style="display:none">Some--}}
                                        {{--Error are in image uploading.--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer text-right">--}}
                                    {{--<button type="button" class="new-pro-btn-1 new-pro-btn-1-border"--}}
                                            {{--data-dismiss="modal">Cancel--}}
                                    {{--</button>--}}
                                    {{--<button type="submit" id="finishImages" class="new-pro-btn-1">Post</button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}


                        {{--<div class="tab-pane" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">--}}
                            {{--<form action="{{route('add_post_video')}}" method="post">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<textarea class="form-control" name="post_text" placeholder="Status"></textarea>--}}
                                {{--<hr>--}}
                                {{--<textarea class="form-control" name="video_code"--}}
                                          {{--placeholder="Embedded Video Code"></textarea>--}}

                                {{--<div class="modal-footer text-right">--}}
                                    {{--<button type="button" class="new-pro-btn-1 new-pro-btn-1-border"--}}
                                            {{--data-dismiss="modal">Cancel--}}
                                    {{--</button>--}}
                                    {{--<button type="submit" class="new-pro-btn-1">Post</button>--}}
                                {{--</div>--}}
                            {{--</form>--}}

                        {{--</div>--}}


                    </div>
                </div>

            </div>
        </div>
    </div>





    <link href="{{asset('web/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('web/plugins/dropzone/dist/dropzone.js')}}"></script>
    <script src="{{asset('web/js/timeline.js')}}"></script>
    <script type="text/javascript">
        window.onload = function() {
            let dropArea = document.getElementById("drop-area");
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false)
            });
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            dropArea.addEventListener('drop', handleDrop.bind(this), false);
            function handleDrop(e) {
                let data = e.dataTransfer;
                let files = data.files;
                document.getElementById('photo').files=files
                for (let j = 0; j < files.length; j++) {
                    if (files[j].type.indexOf('image') !== -1) {
                        this.readImageURL(files[j]);
                    } else {
                        this.readImageURL(files[j]);
                    }
                }
            }
        }
        function uploadImage() {
            document.getElementById("photo").click();
        }
        function readImageURL(files) {
            document.getElementById("show-photos").style.display="block";
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('photopreview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(files);
        }
        function readURL(input) {
            document.getElementById("show-photos").style.display="block";
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('photopreview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        myDropzone = new Dropzone('div#imageUpload', {
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

                var myDropzone = this;
                // Update selector to match your button
                $("#finishImages").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();

                    return false;
                });

                this.on('sending', function (file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $("#imageForm").serializeArray();
                    $.each(data, function (key, el) {

                        formData.append(el.name, el.value);

                    });

                });
            },
            error: function (file, response) {
                var error_msg = '';
                $.each(response.errors, function (key, el) {
                    error_msg += el[0];

                });

                myDropzone.removeAllFiles(true);
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
                console.log(file, response);
                if (response.success == true) {
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
        myDropzone = new Dropzone('div#imageUploadStatus', {
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

                var myDropzone = this;
                // Update selector to match your button
                $("#finishImages").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();

                    return false;
                });

                this.on('sending', function (file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $("#imageForm").serializeArray();
                    $.each(data, function (key, el) {

                        formData.append(el.name, el.value);

                    });
                    console.log(formData);

                });
            },
            error: function (file, response) {
                var error_msg = '';
                $.each(response.errors, function (key, el) {
                    error_msg += el[0];

                });

                myDropzone.removeAllFiles(true);
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
                console.log(file, response);
                if (response.success == true) {
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
        function embeddVideo() {
            document.getElementById("video-div").style.display="block";
        }
    </script>

@endsection
