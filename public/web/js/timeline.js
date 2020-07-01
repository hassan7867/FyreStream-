$(document).ready(function(){
	/*************Commeon function for ajax call*******/
       function ajaxCall() {
                    this.send = function(data, url, method, success, type) {
                        type = type || 'json';
                        var successRes = function(data) {
                            success(data);
                        }
                        var errorRes = function(e) {
                            console.log(e);
                            alert("Error found \nError Code: " + e.status + " \nError Message: " + e.statusText);
                        }
                        $.ajax({
                            url: url,
                            type: method,
                            data: data,
                            success: successRes,
                            error: errorRes,
                            dataType: type,
                            timeout: 600000
                        });
                    }
                }

$(document).on('click', '.select-post', function(event) {
  /*var post_type = $(this).attr('flag');
  alert(post_type);
  //return false;
  if(post_type == 'image'){
    $("#myModalImage").show();
  }else if(post_type == 'video'){
    $("#myModalVideo").show();
  }else{
    $("#myModalText").show();

  }*/
});


 


 $(".post_comment_profile").click(function () {
      var post_id = $(this).attr('post_id');
      var call = new ajaxCall();
      
      var url ='/save-comment';
      var method = "post";
      var data = $("#postComment_"+post_id).serializeArray();
      if(data[2].value == ''){
        return false;
      }
      call.send(data, url, method, function(data) {

      

      //var comment_div = '<div class="comnt1" style="padding-bottom:20px;"><img  style="width: 46px;height: 44px;" src="/image/profileImages/'+data.user_image+'"  class="cmnt-pic img-responsive img-circle"><div class="comnt-right"><div class="comnt1-text"><h4>'+data.user_name+'<span>'+data.comment+'</span></h4></div></div></div>'
      var comment_div = '<div class="reply"><div class="reply1"><div class="reply-flex"><img src="/image/profileImages/'+data.user_image+'" class="cmnt-pic img-responsive img-circle pull-left" style="width: 46px;height: 44px;"><div class="reply-right"><h4>'+data.user_name+'<span>'+data.comment+' !!!!</span></h4></div></div></div></div>';

      $(".react_"+post_id).append(comment_div);
      $(".commentText").val('');
        // location.reload();
      });
  });
 
  $(".react").click(function () {
    var post_id = $(this).attr('post_id');
    var react_type = $(this).attr('type');
    var reaction = $(this).find('img').attr('src');
    $(".myreact_"+post_id).find('img').attr('src',reaction);

     var call = new ajaxCall();
     var url ='/react-post';
     var method = "get";
     data= { 
              'post_id': post_id,
              'react_type' :react_type
          }
                    
    call.send(data, url, method, function(data) {
      
      

    });

  });
  $(".reaction").click(function () {
    var post_id = $(this).attr('post_id');
    var react_type = $(this).attr('type');
    var reaction = $(this).find('img').attr('src');
    $(".myreact_"+post_id).find('img').attr('src',reaction);

     var call = new ajaxCall();
     var url ='/react-post';
     var method = "get";
     data= { 
              'post_id': post_id,
              'react_type' :react_type
          }
                    
    call.send(data, url, method, function(data) {
      
      

    });

  });

   $(".respond-txt").click(function(){
      $(".responds-reply-box").slideToggle();
    });



  $(".sharepopup").click(function () {
     var post_id = $(this).attr('post_id');
     $(".sharePost").attr('post_id',post_id);
     $("#sharePostModal").modal('show');


  });
 
  $(".sharePost").click(function () {

                    var post_id = $(this).attr('post_id');
                    var share_text = $("#share_text").val();
                    var call = new ajaxCall();
                    
                    var url ='/share-post';
                    var method = "get";
                     data= { 
                              'post_id': post_id,
                              'text' :share_text
                          }
                    
                    call.send(data, url, method, function(data) {
                       $("#sharePostModal").modal('hide');
                       if(data.success == true){
                        var result ="<div class='alert alert-success' role='alert'>"+data.errors+"!</div>";
                      }else{
                        
                        var result ="<div class='alert alert-danger' role='alert'>"+data.errors+"!</div>";
                      }

                       
                       $("#append_result_"+post_id).append(result);

                    });

  });

$("#add_text_post").click(function(){
  $("#addTextPost").submit();
})
})
