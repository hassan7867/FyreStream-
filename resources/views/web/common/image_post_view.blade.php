<div class="box2">
              <div class="box2-left">
                   <a href="{{route('profile',$row->user->id)}}">
                  <img src="/image/profileImages/{{$row->user->profile_pic}}" class="tanya img-responsive img-circle" style="width: 46px;
    height: 44px;">
                </a>
                <!--<a href="#"><img src="/web/timeline/images/img-3.png" class=""></a>
                <a href="#"><img src="/web/timeline/images/img-4.png" class=""></a>-->
                <!--
                        <ul>
                            <li><a href="#">Like (23)</a></li>
                            <li><a href="#">Share (13)</a></li>   
                        </ul>
                        <img src="/web/timeline/images/reactions.png" class="react-pics img-responsive">
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Nunc hendre rit mi. Intege<a href="#">+ 12 others</a></p>
                -->
              </div>

              <div class="box2-right">
                <h4>{{$row->user->first_name}} {{$row->user->last_name}}</h4>
                <p>{{$row->post_title}} <!-- >> With
                  <a href="#">Michel Wu</a> and
                  <a href="#">17 Others</a> -->
                </p>
                <p class="b-bottom" id="append_result_{{$row->id}}">
                <img src="/image/postImages/{{$row->image_name}}" class="tnya-vid img-responsive">
              </p>
               <div class="row t-b-space">
                  <div class="col-lg-4 col-sm-4 col-12">
                     <div class="sandy-react emoji-react-outer" style="border:none;">
                    <ul class="comment-li guest-suggeston">
                      <li class="">
                        <div class="emoji-option-li">
                      <?php if(!empty($row->myreact)){

                      $type =$row->myreact->react_type;

                      if($type == 0){
                        $image = 'smile.png';
                      }elseif($type ==1){
                        $image = 'angry.png';
                      }elseif ($type == 2) {
                         $image = 'sad.png';
                      }else{
                        $image = 'laugh.png';
                        }  ?>

                        <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)" post_id="{{$row->id}}"><img style="height: 22px;margin: 0 !important;" src="/image/{{$image}}" alt=""/>

                        </a>


                      <?php }else{?>
                        <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)" post_id="{{$row->id}}"><img style="height: 22px;margin: 0 !important;" src="/image/like.png" alt=""/>
                            
                        </a>
                        

                      <?php }?>
                      

                          <div class="hover-emoji-option">
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="0"><img src="/image/smile.png" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="1"><img src="/image/angry.png" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="2"><img src="/image/sad.png" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="3"><img src="/image/laugh.png" alt=""/></a>
                          </div>
                          
                        </div>
                       
                        <?php if(!empty($row->myreact)){



                      $type =$row->myreact->react_type;

                      if($type == 0){
                        $image = 'smile.png';
                      }elseif($type ==1){
                        $image = 'angry.png';
                      }elseif ($type == 2) {
                         $image = 'sad.png';
                      }else{
                        $image = 'laugh.png';
                        }  ?>
                        
                        <span class="ml-2 liketooltip">{{count($row->reacts)}}

                          @if(count($row->reacts)>0)
                              <ul class="liketooltiptext">
                               <?php foreach ($row->reacts as $k => $rct) {?>
                                  <li>{{$rct->user->first_name}} {{$rct->user->last_name}}</li>
                                  <?php }?>
                                </ul>
                                @else
                                <ul class="liketooltiptext">
                                  <li>No reaction yet</li>
                                    
                                </ul>

                                @endif
                        </span>
                        <?php }else{?>
                         <span class="ml-2 liketooltip">{{count($row->reacts)}}

                          @if(count($row->reacts)>0)
                              <ul class="liketooltiptext">
                               <?php foreach ($row->reacts as $k => $rct) {?>
                                  <li>{{@$rct->user->first_name}} {{@$rct->user->last_name}}</li>
                                  <?php }?>
                                </ul>
                                @else
                                <ul class="liketooltiptext">
                                  <li>No reaction yet</li>
                                    
                                </ul>

                                @endif
                        </span>

                      <?php }?>
                            
                      </li>
                      <li>
                         <a href="#">
                          <i class="fa fa-comments" aria-hidden="true"></i>{{count($row->comments)}}</a>
                      </li>
                      <li>
                        <a href="javascript:void(0)" class="sharepopup" post_id="{{$row->id}}">
                          <i class="fa fa-retweet" aria-hidden="true"></i>{{count($row->share)}}</a>
                      </li>
                    </ul>
                  </div>
                  </div>
                 <!--  <div class="col-lg-8 text-right col-sm-8 col-12">
                    <p class="robin_img_new">
                      <img src="/web/timeline/images/reaction2.png" class=""> You,
                      <a href="#">Robin Holt </a>,
                      <a href="#">Roger Graham</a>, and
                      <a href="#">2 ohters.</a>
                    </p>
                  </div> -->
                </div>


               

                  <div class="feedback2 new react_{{$row->id}}">
                  @foreach($row->comments as $comment)
                  <div class="comnt1" style="padding-bottom:20px;">
                    <a   href="{{route('profile',$comment->user->id)}}"><img src="/image/profileImages/{{$comment->user->profile_pic}}" class="cmnt-pic img-responsive img-circle" style="width: 46px;
    height: 44px;"></a>
                    <div class="comnt-right">
                      <div class="comnt1-text">
                        <h4>{{$comment->user->first_name}} {{$comment->user->last_name}}
                          <span>{{$comment->comment}}</span>
                        </h4>
                      </div>
                       <!-- <a href="javascript:void(0)" id="reply">Reply</a> -->
                     
                        <div class="write-comment" id="Replycomment">
                          <form name="postComment" id="" method="post">
                              <div style="display: flex; align-items: flex-end;">
                                  <img src="/image/profileImages/{{Auth::user()->profile_pic}}">
                                  <textarea name="comment" class="commentText" placeholder="Write a Comment.."></textarea>
                                  <a href="javascript:void(0)">
                                    <button type="button" class="post_comment">Send</button>
                                  </a>
            
                              </div>
                            </form>
                        </div>

                     <!--  <div class="comnt-row">
                        <div class="row">
                          <div class="col-lg-8 col-sm-8 col-12">
                            <ul class="left2-list">
                              <li style="display:none" class="last">
                                <a href="#">
                                  <span>12</span>
                                  <img src="/web/timeline/images/reaction2.png" class="rc2 img-responsive">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="/web/timeline/images/like.png" class="lk-pic img-responsive">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="/web/timeline/images/reply.png" class="lk-pic img-responsive">
                                  <span>Respond</span>
                                  <span class="gray-color">4d</span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="/web/timeline/images/new-icon-4.png" class="lk-pic img-responsive">
                                  <span>+25 replies</span>
                                </a>
                              </li>
                              <li>
                                <a href="#"></a>
                              </li>
                              <br>
                              <li>
                                <a href="#">
                                  <img src="/web/timeline/images/img-5.png" alt="" />
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="/web/timeline/images/img-6.png" alt="" />&nbsp;
                                  <b>Jew David</b> + 10 replies</a>
                              </li>
                            </ul>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                            <ul class="right2-list">
                              <li>
                                <a href="#">
                                  <span style="color:#0d006e;">+ 12</span>
                                  <img src="/web/timeline/images/reaction2.png" class="fd-pic img-responsive">
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  @endforeach

                </div>
               
                
                <div class="write-comment">
                  <form name="postComment" id="postComment_{{$row->id}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" value="{{$row->id}}">
                  <div style="display: flex; align-items: flex-end;">
                    
                      <img  class="img-circle img-responsive commentProfileImage" src="/image/profileImages/{{Auth::user()->profile_pic}}">
                      <textarea name="comment" class="commentText" placeholder="Write a Comment.."></textarea>
                      <a href="javascript:void(0)">
                        <button type="button" post_id="{{$row->id}}" class="post_comment">Send</button>
                      </a>
                   
                    
                  </div>
                </form>
                </div>
              </div>
            </div>
            
            
<script>
    $(document).ready(function(){
      $("#Replycomment").hide();  
      $("#reply").click(function(){
        $("#Replycomment").toggle();
      });
    });
</script>
