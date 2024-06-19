<?php
require_once 'assets/php/functions.php';
if(isset($_GET['newfp'])){
    unset($_SESSION['auth_temp']);
    unset($_SESSION['forgot_code']);
}
if(isset($_SESSION['Auth'])){
    $user = getUser($_SESSION['userdata']['id']);
    $posts = getpost();
    $follow_suggestions = filterFollowSuggestion();
}

$pagecount = count($_GET);


//for managing pages
if(isset($_SESSION['Auth']) && !$pagecount){
    showPage('header',['page_title'=>'Home']);
    showPage('navbar');
    showPage('wall');
}elseif(isset($_SESSION['Auth']) && $user['ac_status']==2 && !$pagecount ){
    showPage('header',['page_title'=>'Blocked']);
    showPage('blocked');
}elseif(isset($_SESSION['Auth']) && isset($_GET['editprofile'])){
    showPage('header',['page_title'=>'Edit Profile']);
    showPage('navbar');
    showPage('edit_profile');
}elseif(isset($_SESSION['Auth']) && isset($_GET['u'])){
    $profile = getUserByUsername($_GET['u']);
    if(!$profile){
        showPage('header',['page_title'=>'User Not Found']);
        showPage('navbar');
        showPage('user_not_found');

    }else{
     $profile_post = getPostById($profile['id']); 
        showPage('header',['page_title'=>$profile['first_name'].' '.$profile['last_name']]);
        showPage('navbar');
        showPage('profile');
    }
 
  
}elseif(isset($_GET['signup'])){
    showPage('header',['page_title'=>'Clone - SignUp']);
    showPage('signup');
}elseif(isset($_GET['login'])){
   
    showPage('header',['page_title'=>'Clone - Login']);
    showPage('login');
}else{
    if(isset($_SESSION['Auth'])){
        showPage('header',['page_title'=>'Home']);
        showPage('navbar');
        showPage('wall');
    }elseif(isset($_SESSION['Auth'])){
        showPage('header',['page_title'=>'Blocked']);
        showPage('blocked');
    }else{
        showPage('header',['page_title'=>'Clone - Login']);
        showPage('login');
    }
  
}


showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);







