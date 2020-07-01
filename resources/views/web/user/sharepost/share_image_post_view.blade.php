 <div class="box2">
                              <div class="box4-left">
                              <a href="#" class="on-admin"><img src="/web/profile/images/tanya.png" class="img-responsive"></a>
                              <a href="#" class="on-insta"><img src="/web/profile/images/insta.png" class="img-responsive"></a>
                              <a href="#" class="on-pro"><img src="/web/profile/images/pro.png" class="img-responsive"></a>
                              </div>
                              
                              <div class="box2-right">
                                  <h4>{{$user->first_name}} {{$user->last_name}} shared a post</h4>
                                  <p>{{$row->text}}</p>
                                  <p>{{$row->post->post_title}}</p>
                                 <!--  <h6><img src="/web/profile/images/double-arrow.png" class="db img-responsive"><span>with <a href="#">Michel Wu</a> and <a href="#">17 Others.</a></span></h6> -->
                                 <p class="b-bottom" id="append_result_{{$row->post->id}}">
                                  <img src="/image/postImages/{{$row->post->image_name}}" class="tnya-vid img-responsive">
                                </p>
                                         <div class="sandy-react">
                                      <ul class="pull-left reacts">
                                           <li class="emoji-option-li">

                      <?php if(!empty($row->post->myreact)){

                      $type =$row->post->myreact->react_type;

                      if($type == 0){
                        $image = 'hugging_face.gif';
                      }elseif($type ==1){
                        $image = 'pouting_face.gif';
                      }elseif ($type == 2) {
                         $image = 'crying_face.gif';
                      }else{
                        $image = 'face_with_tears_of_joy.gif';
                        }  ?>

                        <a class="myreact_{{$row->post->id}}" href="javascript:void(0)" post_id="{{$row->post->id}}"><img style="height: 26px;margin: 0 !important;" src="/image/{{$image}}" alt=""/><span>{{count($row->post->reacts)}}</span></a>

                      <?php }else{?>
                        <a class="myreact_{{$row->post->id}}" href="javascript:void(0)" post_id="{{$row->post->id}}"><i class="far fa-thumbs-up" style="font-size: 19px!important;"></i><span>{{count($row->post->reacts)}}</span></a>

                      <?php }?>
                      

                          <div class="hover-emoji-option">
                            <a class="react" href="javascript:void(0)" post_id="{{$row->post->id}}" type="0"><img src="/image/hugging_face.gif" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->post->id}}" type="1"><img src="/image/pouting_face.gif" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->post->id}}" type="2"><img src="/image/crying_face.gif" alt=""/></a>
                            <a class="react" href="javascript:void(0)" post_id="{{$row->post->id}}" type="3"><img src="/image/face_with_tears_of_joy.gif" alt=""/></a>
                          </div>
                      </li>
                                          <li><a href="#"><i class="far fa-comments"></i><span>{{count($row->post->comments)}}</span></a></li>
                                          <li>
                                  <a href="javascript:void(0)" class="sharepopup" post_id="{{$row->post->id}}">
                                    <i class="fa fa-retweet" aria-hidden="true"></i>{{count($row->post->share)}}</a>
                                </li>
                                      </ul>
                                      
                                      <!-- <div class="reacters">
                                          <img src="/web/profile/images/emojee.png" class="emji img-responsive">
                                          <p>You, <a href="#">Robin Holt, Roger Graham,</a> and <a href="#">2 others.</a></p>
                                      </div> -->
                                  </div>


                                 <div class="feedback2 new react_{{$row->post->id}}">
                                  @foreach($row->post->comments as $comment)
                              <div class="reply">
                                  <div class="reply1">
                                      <div class="reply-flex">
                                          <img src="/image/profileImages/{{$comment->user->profile_pic}}"class="cmnt-pic img-responsive img-circle pull-left" style="width: 46px;height: 44px;">
                                          <div class="reply-right">
                                              <h4>{{$comment->user->first_name}} {{$comment->user->last_name}}<span>{{$comment->comment}}</span></h4>
                                          </div> 
                                      </div>
                                   
                                  </div>
                                  
                                
                              </div>
                              @endforeach
                            </div>
                                  
                                  
                                  <div class="write-comment">
                                      <form name="postComment" id="postComment_{{$row->post->id}}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" name="post_id" value="{{$row->post->id}}">
                                        <div style="display: flex; align-items: flex-end;">
                                          <img class="img-circle img-responsive commentProfileImage" src="/image/profileImages/15924237810_7.jpg">
                                          <textarea name="comment" class="commentText" placeholder="Write a Comment.."></textarea>
                                          <a href="javascript:void(0)">
                                            <button type="button" post_id="{{$row->post->id}}" class="post_comment_profile">Send</button>
                                          </a>
                                      </div>
                                    </form>
                                </div>
                              </div>
                          </div>
