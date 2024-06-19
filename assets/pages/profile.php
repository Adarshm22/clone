<?php
global $profile;
global $profile_post;
global $user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container {
            background-color: #fff8f9; /* Light pink background */
            padding: 0.25rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 170px;
            height: 170px;
            border: 4px solid #ffe6e9;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background: linear-gradient(45deg, #e47399, #ff9a9e);
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #d26287, #e47399);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-danger {
            background: linear-gradient(45deg, #ff6b6b, #ff8787);
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-danger:hover {
            background: linear-gradient(45deg, #ff3b3b, #ff6b6b);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .modal-header, .modal-body {
            padding: 1.5rem;
        }
        .rounded-start {
            border-radius: 15px 0 0 15px;
        }
        .rounded-end {
            border-radius: 0 15px 15px 0;
        }
        .gallery img {
            transition: transform 0.2s;
        }
        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
    <div class="container col-md-9 col-sm-11 rounded-0">
        <div class="col-12 rounded p-4 mt-4 d-md-flex gap-5">
            <div class="col-md-4 col-sm-12 d-flex justify-content-center mx-auto align-items-start"><div class="px-md-5"></div><img src="assets/images/profile/<?=$profile['profile_pic']?>"
                    class="img-thumbnail rounded-circle mb-3" style="width:170px;height:170px" alt="...">
            </div>
            <div class="col-md-8 col-sm-11">
                <div class="d-flex flex-column">
                    <div class="d-flex gap-5 align-items-center">
                        <span style="font-size: xx-large;"><?=$profile['first_name']?> <?=$profile['last_name']?></span>
                        
                        <?php
if($user['id']!=$profile['id'] && !checkBS($profile['id'])){
    ?>
  <div class="dropdown">
                            <span class="" style="font-size:xx-large" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i> </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#chatbox" onclick="popchat(<?=$profile['id']?>)"><i class="bi bi-chat-fill"></i> Message</a></li>
                                <li><a class="dropdown-item " href="assets/php/actions.php?block=<?=$profile['id']?>&username=<?=$profile['username']?>"><i class="bi bi-x-circle-fill"></i> Block</a></li>
                            </ul>
                        </div>
    <?php
}
                        ?>
                      


                    </div>
                    <span style="font-size: larger;" class="text-secondary">@<?=$profile['username']?></span>
                    <?php
if(!checkBS($profile['id'])){
    ?>
 <div class="d-flex gap-2 align-items-center my-3">

<a class="btn btn-sm btn-primary"><i class="bi bi-file-post-fill"></i> <?=count($profile_post)?> Posts</a>

</div>
    <?php

}
                    ?>
                   
<?php


if($user['id']!=$profile['id']){
?>
 <div class="d-flex gap-2 align-items-center my-1">
</div>
<?php
}
?>
                   
                </div>
            </div>


        </div>
        <h3 class="border-bottom">Posts</h3>
        <?php

if(checkBS($profile['id'])){
    $profile_post = array();

   ?>
 <div class="alert alert-secondary text-center" role="alert">
    <i class="bi bi-x-octagon-fill"></i> You are not allowed to see posts !
</div>
   <?php
    
}else if(count($profile_post)<1){
    echo "<p class='p-2 bg-white border rounded text-center my-3'>You don't have any post</p>";
}
        ?>
        <div class="gallery d-flex flex-wrap gap-2 mb-4">
            <?php
               
foreach($profile_post as $post){
    $likes = getLikes($post['id']);

    ?>
            <img src="assets/images/posts/<?=$post['post_img']?>" data-bs-toggle="modal" data-bs-target="#postview<?=$post['id']?>" width="300px" class="rounded" />
       
            <div class="modal fade" id="postview<?=$post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body d-md-flex p-0">
                    <div class="col-md-8 col-sm-12">
                        <img src="assets/images/posts/<?=$post['post_img']?>" style="max-height:90vh" class="w-100 rounded-start">
                    </div>



                    <div class="col-md-4 col-sm-12 d-flex flex-column">
                        <div class="d-flex align-items-center p-2 <?=$post['post_text']?'':'border-bottom'?>">
                            <div><img src="assets/images/profile/<?=$profile['profile_pic']?>" alt="" height="50" width="50" class="rounded-circle border">
                            </div>
                            <div>&nbsp;&nbsp;&nbsp;</div>
                            <div class="d-flex flex-column justify-content-start">
                                <h6 style="margin: 0px;"><?=$profile['first_name']?> <?=$profile['last_name']?></h6>
                                <p style="margin:0px;" class="text-muted">@<?=$profile['username']?></p>
                            </div>

                            <div class="d-flex flex-column align-items-end flex-fill">
                <div class="" ></div>
                <div class="dropdown">
  <span class="<?=count($likes)<1?'disabled':''?>" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <?=count($likes)?> likes
</span>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  <?php
  foreach($likes as $like){
      $lu = getUser($like['user_id']);
      ?>
  <li><a class="dropdown-item" href="?u=<?=$lu['username']?>"><?=$lu['first_name'].' '.$lu['last_name']?> (@<?=$lu['username']?>)</a></li>

      <?php
  }
  ?> 
    
  </ul>
</div>
                <div style="font-size:small" class="text-muted">Posted <?=show_time($post['created_at'])?> </div> 
                 
</div>
                        </div>
<div class="border-bottom p-2 <?=$post['post_text']?'':'d-none'?>"><?=$post['post_text']?> </div>


                        <div class="flex-fill align-self-stretch overflow-auto" id="comment-section<?=$post['id']?>" style="height: 100px;">

                          <?php
$comments = getComments($post['id']);
if(count($comments)<1){
    ?>
<p class="p-3 text-center my-2 nce">no comments</p>
    <?php
}
foreach($comments as $comment){
    $cuser = getUser($comment['user_id']);
    ?>
<div class="d-flex align-items-center p-2">
                                <div><img src="assets/images/profile/<?=$cuser['profile_pic']?>" alt="" height="40" width="40" class="rounded-circle border">
                                </div>
                                <div>&nbsp;&nbsp;&nbsp;</div>
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <h6 style="margin: 0px;"><a href="?u=<?=$cuser['username']?>" class="text-decoration-none text-muted">@<?=$cuser['username']?></a> - <?=$comment['comment']?></h6>
                                    <p style="margin:0px;" class="text-muted"><?=show_time($comment['created_at'])?></p>
                                </div>
                            </div>

    <?php
}
                          ?>

                            
                          

                           

                        </div>
                      
                    </div>



                </div>

            </div>
        </div>
    </div>
    <?php
}
            ?>
           

        </div>




    </div>