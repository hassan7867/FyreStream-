 <div class="box4">
                          <div class="box4-left">
                              <a href="#" class="on-admin"><img src="/web/profile/images/online-admin.png" class="img-responsive"></a>
                              <a href="#" class="on-insta"><img src="/web/profile/images/insta.png" class="img-responsive"></a>
                              <a href="#" class="on-pro"><img src="/web/profile/images/pro.png" class="img-responsive"></a>
                          </div>
                          
                          <div class="box4-right" style="width: 86%">
                              <div class="sandy">
                                  <div class="sandy-row">
                                      <div class="sandy-left">
                                         <h4>{{$user->first_name}} {{$user->last_name}}</h4>
                                  <p id="append_result_{{$row->id}}">{{$row->post_title}}</p>
                                      </div>
                                      
                                      <div class="sandy-right">
                                          <ul>
                                              <li><a href="#"><img src="/web/profile/images/world.png" class="img-responsive"></a></li>
                                              <li class="last"><a href="#"><img src="/web/profile/images/share.png" class="img-responsive"></a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  
                                  <div class="sandy-react emoji-react-outer">
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
                        <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)" post_id="{{$row->id}}"><i class="far fa-thumbs-up" style="font-size: 19px!important;"></i>
                            
                        </a>
                        

                      <?php }?>
                      

                          <div class="hover-emoji-option">
                            <a class="reaction" href="javascript:void(0)" post_id="{{$row->id}}" type="0"><img src="/image/hugging_face.gif" alt=""/></a>
                            <a class="reaction" href="javascript:void(0)" post_id="{{$row->id}}" type="1"><img src="/image/pouting_face.gif" alt=""/></a>
                            <a class="reaction" href="javascript:void(0)" post_id="{{$row->id}}" type="2"><img src="/image/crying_face.gif" alt=""/></a>
                            <a class="reaction" href="javascript:void(0)" post_id="{{$row->id}}" type="3"><img src="/image/face_with_tears_of_joy.gif" alt=""/></a>
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
                                  <li>{{@$rct->user->first_name}} {{@$rct->user->last_name}}</li>
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
                                          <li><a href="#"><i class="far fa-comment-alt"></i><span>{{count($row->comments)}}</span></a></li>
                                          <li>
					                        <a href="javascript:void(0)" class="sharepopup" post_id="{{$row->id}}">
					                          <i class="fas fa-share" aria-hidden="true"></i>{{count($row->share)}}</a>
					                      </li>
                                      </ul>
                                      
                                      <!-- <div class="reacters">
                                          <img src="/web/profile/images/emojee.png" class="emji img-responsive">
                                          <p>You, <a href="#">Robin Holt, Roger Graham,</a> and <a href="#">2 others.</a></p>
                                      </div> -->
                                  </div>
                              </div>
                              
                              <div class="feedback2 new react_{{$row->id}}">
                                  @foreach($row->comments as $comment)
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
                                      <form name="postComment" id="postComment_{{$row->id}}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" name="post_id" value="{{$row->id}}">
                                        <div style="display: flex; align-items: flex-end;">
                                          <img class="img-circle img-responsive commentProfileImage" src="/image/profileImages/15924237810_7.jpg">
                                          <textarea name="comment" class="commentText" placeholder="Write a Comment.."></textarea>
                                          <a href="javascript:void(0)">
                                            <button type="button" post_id="{{$row->id}}" class="post_comment_profile">Send</button>
                                          </a>
                                      </div>
                                    </form>
                                </div>
                          </div>
                      </div>
