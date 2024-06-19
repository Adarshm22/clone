<?php if(isset($_SESSION['Auth'])){ ?>
<div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="" style="display:none" id="post_img" class="w-100 rounded border mb-3">
        <form method="post" action="assets/php/actions.php?addpost" enctype="multipart/form-data">
          <div class="mb-3">
            <input class="form-control" name="post_img" type="file" id="select_post_img">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Say Something</label>
            <textarea name="post_text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Post</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="message_sidebar" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Messages</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" id="chatlist">
    <!-- Messages will be loaded here -->
  </div>
</div>

<div class="modal fade" id="chatbox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <a href="" id="cplink" class="text-decoration-none text-dark">
          <h5 class="modal-title" id="exampleModalLabel">
            <img src="assets/images/profile/default_profile.jpg" id="chatter_pic" height="40" width="40" class="m-1 rounded-circle border">
            <span id="chatter_name"></span>(@<span id="chatter_username">loading..</span>)
          </h5>
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column-reverse gap-2" id="user_chat">
        loading..
      </div>
      <div class="modal-footer">
        <p class="p-2 text-danger mx-auto" id="blerror" style="display:none"> 
          <i class="bi bi-x-octagon-fill"></i> You are not allowed to send msg to this user anymore
        </p>
      </div>
      <div class="input-group p-2" id="msgsender">
        <input type="text" class="form-control rounded-0 border-0" id="msginput" placeholder="Say something..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-primary" id="sendmsg" data-user-id="0" type="button">Send</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/custom.js?v=<?=time()?>"></script>

<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .modal-content {
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
  }

  .modal-header, .modal-footer {
    border-bottom: 1px solid ##fff8f9;
    border-top: 1px solid ##fff8f9;
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

  .form-control:focus {
    border-color: linear-gradient(45deg, #d26287, #e47399);
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  .offcanvas-body {
    padding: 1rem;
    background: #f0f2f5;
  }

  .offcanvas-header {
    border-bottom: 1px solid ##fff8f9;
  }

  .input-group .form-control {
    border-right: 0;
    background: #f8f9fa;
  }

  .input-group .btn {
    border-left: 0;
    background: linear-gradient(45deg, #e47399, #ff9a9e);
    color: white;
    border-radius:5px;
  }

  .modal-title {
    font-weight: bold;
    color: #343a40;
  }

  .modal-header {
    background: white;
    color: white;
  }

  .modal-footer {
    background: #f1f3f5;
  }

  .btn-close {
    color: white;
  }

  .offcanvas-title {
    font-weight: bold;
    color: #343a40;
  }

  #chatlist {
    background: #fff;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  #chatbox .modal-content {
    border-radius: 15px;
    overflow: hidden;
  }

  #chatbox .modal-header {
    background: #fff8f9;
    color: white;
  }

  #chatbox .modal-body {
    background: #f8f9fa;
  }

  #msginput {
    border-radius: 15px 0 0 15px;
    padding: 10px;
  }

  #sendmsg {
    background: linear-gradient(45deg, #e47399, #ff9a9e);
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  #sendmsg:hover{
    background: linear-gradient(45deg, #d26287, #e47399);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  }
</style>
