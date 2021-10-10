<div class="container">

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">Chat App</h5>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <div currentid="" id="active_user_id"></div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users">
                                    <?php 
                                    $users = $user->show_all_users();
                                    while ($user = $users->fetch()) :
                                     ?>

                                    <li class="person" data-chat="person1" user-id="<?php echo $user['id'];?>">
                                    <!-- <li class="person active-user" data-chat="person1"> -->
                                        <div class="user">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <span class="status busy"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name user_name" id="user_name"><?php echo $user['name']; ?></span>
                                            <!-- <span class="time">15/02/2019</span> -->
                                        </p>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="dropdown text-right">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                  <?php echo $_SESSION['username']; ?>
                              </button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="javascript:void" id="profile_btn">Profile</a>
                                  <a class="dropdown-item" href="javascript:void" id="logout_btn">Logout</a>
                                  
                                  
                              </div>
                          </div>
                            <div class="selected-user">
                                <span>To: <span class="name" id="toname">User</span></span>
                                <!-- <span id="toname">Miss Ayesha</span> -->
                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <form>
                                        <textarea class="form-control" touser="" id="msg_txt" rows="3" placeholder="Type your message here..."></textarea>
                                        <input type="submit" class="btn btn-primary" value="Send" id="chat_send_btn" name="chat_send_btn">
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

</div>



<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="form-group">
              <label for="name">Your Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Your Name" value="<?php echo $_SESSION['username']?>" name="name" disabled>
          </div>
          <div class="form-group">
              <label for="email">Your Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Your Email" value="<?php echo $_SESSION['useremail']?>" name="email" disabled>
          </div>
          <form action="" id="update_profile">
          <div class="form-group">
              <label for="pwd">Current Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Your Current Password" name="pwd">
          </div>
          <div class="form-group">
              <label for="newpwd">New Password:</label>
              <input type="password" class="form-control" id="newpwd" placeholder="New Password" name="newpwd">
          </div>
          <div class="form-group">
              <label for="connewpwd">Confirm New Password:</label>
              <input type="password" class="form-control" id="connewpwd" placeholder="Confirm New Password" name="connewpwd">
          </div>
          <div class="form-group">
              <label for="profile_pic">Profile Picture</label>
              <input type="file" class="form-control" id="profile_pic" name="profile_pic">
          </div>

        <button type="submit" class="btn btn-primary" id="update_profile_btn">Update</button>
        <div id="profile_result">
            
        </div>
    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>