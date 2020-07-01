<div class="box2">
    <link href="{{asset('web/css/emojionearea.min.css')}}" type="text/css" rel="stylesheet">
    <div class="box2-left">
        <a href="{{route('profile',$row->user->id)}}">
            <img src="/image/profileImages/{{$row->user->profile_pic}}" class="tanya img-responsive img-circle" style="width: 46px;
    height: 44px;">
        </a>
    </div>

    <div class="box2-right">
        <h4>
            {{$row->user->first_name}} {{$row->user->last_name}}
            <span>1h</span>
            <ul>
                <li>
                    <a href="#">
                        <img src="/web/timeline/images/world.png" class="world img-responsive">
                    </a>
                </li>
                <li class="last">
                    <a href="#">
                        <img src="/web/timeline/images/share.png" class="world img-responsive">
                    </a>
                </li>
            </ul>
        </h4>
        @if(filter_var($row->post_title, FILTER_VALIDATE_URL))
            <p class="b-bottom" id="append_result_{{$row->id}}"><a href="{{$row->post_title}}"
                                                                   target="_blank">{{$row->post_title}}</a></p>
        @else
            @if(strlen($row->post_title)<=10)
                <p class="b-bottom" id="append_result_{{$row->id}}"
                   style="font-size: 20px!important;">{{$row->post_title}}</p>
            @else
                <p class="b-bottom" id="append_result_{{$row->id}}">{{$row->post_title}}</p>
            @endif
        @endif
        <div class="row t-b-space">
            <div class="col-lg-4 col-sm-4 col-12">
                <div class="sandy-react emoji-react-outer" style="border:none;">
                    <ul class="comment-li guest-suggeston">
                        <li class="">
                            <div class="emoji-option-li">
                                <?php if(!empty($row->myreact)){

                                $type = $row->myreact->react_type;

                                if ($type == 0) {
                                    $image = 'hugging_face.gif';
                                } elseif ($type == 1) {
                                    $image = 'pouting_face.gif';
                                } elseif ($type == 2) {
                                    $image = 'crying_face.gif';
                                } else {
                                    $image = 'face_with_tears_of_joy.gif';
                                }  ?>

                                <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)"
                                   post_id="{{$row->id}}"><img style="height: 22px;margin: 0 !important;"
                                                               src="/image/{{$image}}" alt=""/>

                                </a>


                                <?php }else{?>
                                <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)"
                                   post_id="{{$row->id}}"><i class="far fa-thumbs-up" style="font-size: 19px!important;"></i><span>Like</span>
                                    {{--<img style="height: 22px;margin: 0 !important;"--}}
                                                               {{--src="/image/like.png" alt=""/>--}}

                                </a>


                                <?php }?>


                                <div class="hover-emoji-option">
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="0"><img
                                                src="/image/hugging_face.gif" alt=""/></a>
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="1"><img
                                                src="/image/pouting_face.gif" alt=""/></a>
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="2"><img
                                                src="/image/crying_face.gif" alt=""/></a>
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="3"><img
                                                src="/image/face_with_tears_of_joy.gif" alt=""/></a>
                                </div>

                            </div>

                            <?php if(!empty($row->myreact)){



                            $type = $row->myreact->react_type;

                            if ($type == 0) {
                                $image = 'hugging_face.gif';
                            } elseif ($type == 1) {
                                $image = 'pouting_face.gif';
                            } elseif ($type == 2) {
                                $image = 'crying_face.gif';
                            } else {
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
                        <li>
                            <a href="#">
                                <i class="far fa-comment-alt" aria-hidden="true" style="padding-top: 8px;"></i>{{count($row->comments)}}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="sharepopup" post_id="{{$row->id}}">
                                <i class="fas fa-share" aria-hidden="true" style="padding-top: 7px;"></i>{{count($row->share)}}</a>
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
                    <a href="{{route('profile',$comment->user->id)}}"><img
                                src="/image/profileImages/{{$comment->user->profile_pic}}"
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
                                    <input type="hidden" id="comment-id">
                                    <input name="comment" class="form-control" id="reply-message"
                                           placeholder="Write a Comment..">
                                    <br>
                                    <a href="javascript:void(0)">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="replying()">
                                            Reply
                                        </button>
                                    </a>

                                </div>
                                @foreach(\App\ReplyCommentTable::where('id_comment',$comment->id)->get() as $replyItem)
                                    <div id="reply-div-{{$comment->id}}">
                                        <div style="color: grey;margin-top: 10px!important;margin-left: 2px!important;">
                                            <span style="color: #004080;font-weight: bold">{{\App\User::where('id',$replyItem->id_user)->first()['first_name']}}</span>
                                            <span style="margin-right: 10px!important;color: #004080;font-weight: bold">{{\App\User::where('id',$replyItem->id_user)->first()['last_name']}}</span>
                                            {{$replyItem->message}}
                                        </div>
                                    </div>
                                @endforeach
                            </h4>
                        </div>

                        <!--   <div class="comnt-row">
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
                           onclick="uploadImage('{{$row->id}}')" accept="image/*"></i>
                        <input type="file" name="image" id="comment-photo-{{$row->id}}" onchange="readURL(this)"
                               style="display: none">
                    </div>
                    <a href="javascript:void(0)">
                        <button type="button" post_id="{{$row->id}}" class="post_comment">Send</button>
                    </a>
                </div>
                <img id="photopreview{{$row->id}}" style="width: 100px!important;margin-top: 5px;margin-left: 45px">
                <input type="hidden" value="{{csrf_token()}}" id="csrf-token">

            </form>
        </div>
    </div>
</div>
<script>
    let rowId = "";

    function uploadImage(id) {
        rowId = id;
        document.getElementById("comment-photo-" + rowId).click();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('photopreview' + rowId).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function replyComment(commentId) {

        document.getElementById("reply-section" + commentId).style.display = "block";
        document.getElementById("comment-id").value = commentId;
    }

    function replying() {
        let commentId = document.getElementById('comment-id').value;
        let message = document.getElementById('reply-message').value;
        $.ajax({
            url: `{{env('APP_URL')}}/reply/comment`,
            type: 'POST',
            dataType: "JSON",
            data: {
                commentId: commentId,
                message: message,
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {

                var comment_div = '<div style="color: grey;margin-top: 10px!important;margin-left: 2px!important;"><span style="color: #004080;font-weight: bold">' + data.fname + '</span> <span style="margin-right: 10px!important;color: #004080;font-weight: bold">' + data.lname + '</span>' + data.comment + '</div>'
                $("#reply-div-" + commentId).append(comment_div);
                $("#reply-message").val('');
            },
        });
    }

    $(".post_comment").click(function () {
        var post_id = $(this).attr('post_id');

        var url = '/save-comment';
        var method = "post";
        // var data = $("#postComment_"+post_id).serializeArray();
        let data = new FormData();
        data.append('image', document.getElementById('comment-photo-' + post_id).files[0]);
        data.append('post_id', post_id);
        data.append('comment', document.getElementById('post-comment-' + post_id).value);
        data.append("_token", document.getElementById('csrf-token').value);
        // call.send(data, url, method, function(data) {
        //
        // var comment_div = '<div class="comnt1" style="padding-bottom:20px;"><img  style="width: 46px;height: 44px;" src="/image/profileImages/'+data.user_image+'"  class="cmnt-pic img-responsive img-circle"><div class="comnt-right"><div class="comnt1-text"><h4>'+data.user_name+'<span>'+data.comment+'</span></h4></div></div></div>'
        // $(".react_"+post_id).append(comment_div);
        // $(".commentText").val('');
        //   // location.reload();
        // });
        $.ajax({
            url: `/save-comment`,
            type: 'POST',
            dataType: "JSON",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                var comment_div = '<div class="comnt1" style="padding-bottom:20px;"><img  style="width: 46px;height: 44px;" src="/image/profileImages/' + data.user_image + '"  class="cmnt-pic img-responsive img-circle"><div class="comnt-right"><div class="comnt1-text"><h4>' + data.user_name + '<img style="width: 30px!important;;height: 30px!important;" src="/image/' + data.image + '"><span>' + data.comment + '</span></h4></div></div></div>'
                $(".react_" + post_id).append(comment_div);
                $(".commentText").val('');
            },
        });
    });
</script>
<script src="{{asset('web/js/emojionearea.min.js')}}"></script>
