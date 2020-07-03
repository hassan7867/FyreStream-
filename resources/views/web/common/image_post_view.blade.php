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
                        $image = 'hugging_face.gif';
                      }elseif($type ==1){
                        $image = 'pouting_face.gif';
                      }elseif ($type == 2) {
                         $image = 'crying_face.gif';
                      }else{
                        $image = 'face_with_tears_of_joy.gif';
                        }  ?>

                        <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)" post_id="{{$row->id}}"><img style="height: 22px;margin: 0 !important;" src="/image/{{$image}}" alt=""/>

                        </a>


                      <?php }else{?>
                        <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)" post_id="{{$row->id}}"><img src="/image/like.png" style="height: 22px;width:22px!important;margin: 0 !important;">

                        </a>


                      <?php }?>


                          <div class="hover-emoji-option">
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="0"><img src="/image/hugging_face.gif" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="1"><img src="/image/pouting_face.gif" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="2"><img src="/image/crying_face.gif" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="3"><img src="/image/face_with_tears_of_joy.gif" alt=""/></a>
                          </div>

                        </div>

                        <?php if(!empty($row->myreact)){



                      $type =$row->myreact->react_type;

                      if($type == 0){
                        $image = 'hugging_face.gif';
                      }elseif($type ==1){
                        $image = 'pouting_face.gif';
                      }elseif ($type == 2) {
                         $image = 'crying_face.gif';
                      }else{
                        $image = 'face_with_tears_of_joy.gif';
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
                    <a   href="{{route('profile',$comment->user->id)}}"><img src="/image/profileImages/{{$comment->user->profile_pic}}"
                                                                             class="cmnt-pic img-responsive img-circle" style="width: 46px;
    height: 44px;"></a>
                      <div class="comnt-right">
                          <div class="comnt1-text">
                              <h4>{{$comment->user->first_name}} {{$comment->user->last_name}}
                                  <span>{{$comment->comment}}</span>
                                  <div style="margin-top: 10px!important;">
                                      <img style="width: 150px!important;;height: 150px!important;"
                                           src="/image/{{$comment->image}}">
                                  </div>
                                  <div style="margin-top: 12px!important;font-size: 12px!important;"
                                       onclick="replyComment('{{$comment->id}}')">Reply
                                  </div>
                                  <br>
                                  <div style="display: none; align-items: flex-end;" id="reply-section{{$comment->id}}">
                                      <input type="hidden" id="comment-id{{$comment->id}}">
                                      <input name="comment" class="form-control" id="reply-message-{{$comment->id}}"
                                             placeholder="Write a Comment..">
                                      <br>
                                      <a href="javascript:void(0)">
                                          <button type="button" class="btn btn-primary btn-sm" onclick="replying({{$comment->id}})">
                                              Reply
                                          </button>
                                      </a>

                                  </div>
                                  @foreach(\App\ReplyCommentTable::where('id_comment',$comment->id)->get() as $replyItem)
                                      <div id="reply-div-{{$comment->id}}">
                                          <div style="color: grey;margin-top: 10px!important;margin-left: 2px!important;">
                                              <span style="color: #004080;font-weight: bold;font-size: 15px">{{\App\User::where('id',$replyItem->id_user)->first()['first_name']}}</span>
                                              <span style="margin-right: 10px!important;color: #004080;font-weight: bold;font-size: 15px">{{\App\User::where('id',$replyItem->id_user)->first()['last_name']}}</span>
                                              {{$replyItem->message}}
                                          </div>
                                      </div>
                                  @endforeach
                              </h4>
                          </div>
                      </div>
                  </div>
                  @endforeach

                </div>


                  <div class="write-comment" style="width: 96%!important;margin-top: 23px!important;">
                      <form name="postComment" id="postComment_{{$row->id}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <input type="hidden" name="post_id" value="{{$row->id}}">
                          <div style="display: flex; align-items: flex-end;">

                              <img class="img-circle img-responsive commentProfileImage"
                                   src="/image/profileImages/{{Auth::user()->profile_pic}}">
                              <div style="  display:inline-block;position:relative;">
                        <textarea name="comment" id="post-comment-{{$row->id}}" placeholder="Write a Comment.."
                                  style="display:block;width: 400px;margin-left: 10px"></textarea>
                                  <script type="text/javascript">
                                      $(document).ready(function () {
                                          $('#post-comment-' + '{{$row->id}}').emojioneArea({
                                              pickerPosition: "bottom"
                                          });
                                      })
                                  </script>
                                  <i class="fas fa-camera"
                                     style="position:absolute;bottom:10px;right:33px;cursor: pointer!important;" title="Add image"
                                     onclick="uploadCommentImage('{{$row->id}}')" accept="image/*"></i>
                                  <input type="file" name="image" id="comment-photo-{{$row->id}}" onchange="readPicURL(this)"
                                         style="display: none">
                              </div>
                              <a href="javascript:void(0)">
                                  <button type="button" post_id="{{$row->id}}" class="post_comment">Send</button>
                              </a>
                          </div>
                          <img id="pic-preview{{$row->id}}" style="width: 100px!important;margin-top: 5px;margin-left: 45px">
                          <input type="hidden" value="{{csrf_token()}}" id="csrf-token">

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
