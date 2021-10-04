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

                                    <li class="person" data-chat="person1">
                                    <!-- <li class="person active-user" data-chat="person1"> -->
                                        <div class="user">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <span class="status busy"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name"><?php echo $user['name']; ?></span>
                                            <!-- <span class="time">15/02/2019</span> -->
                                        </p>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
                                <span>To: <span class="name">Emily Russell</span></span>
                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">Russell</div>
                                        </div>
                                        <div class="chat-text">Are we meeting today?
                                            <br>Project has been already finished and I have results to show you.</div>
                                        <div class="chat-hour">08:57 <span class="fa fa-check-circle"></span></div>
                                    </li>
                                    <li class="chat-right">
                                        <div class="chat-hour">08:59 <span class="fa fa-check-circle"></span></div>
                                        <div class="chat-text">Well I am not sure.
                                            <br>I have results to show you.</div>
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                                            <div class="chat-name">Joyse</div>
                                        </div>
                                    </li>
                                    
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea>
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