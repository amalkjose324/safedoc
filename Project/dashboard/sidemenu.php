<link rel="stylesheet" href="css/croppie.css">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<!-- font icons-->
<link rel="stylesheet" type="text/css" href="fonts/icomoon.css">
<link rel="stylesheet" type="text/css" href="fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="vendors/css/extensions/pace.css">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="css/app.css">
<link rel="stylesheet" type="text/css" href="css/colors.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-overlay-menu.css">
<link href="../css/login_css.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/popup.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<!-- END Custom CSS-->
</head>
<?php
$userid=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
$u_name="New User";
$u_image="default.png";
$query=mysqli_query($con,"SELECT * FROM safedocx_profile_pic WHERE profile_pic_user_id=$userid");
while ($row=mysqli_fetch_array($query)) {
  $u_image=$row['profile_pic_image'];
}
?>
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
  <div id="safedocx_header" class="navbar-wrapper">
    <?php
    $query=mysqli_query($con,"SELECT * FROM safedocx_users WHERE user_id=$userid");
    while ($row=mysqli_fetch_array($query)) {
      $u_name=$row['user_name'];
    }
    ?>
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
        <li class="nav-item"><a href="./" class="navbar-brand nav-link"><img alt="branding logo" src="images/logo/robust-logo-light.png" data-expand="images/logo/robust-logo-light.png" data-collapse="images/logo/robust-logo-small.png" class="brand-logo"></a></li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
        </ul>
        <ul class="nav navbar-nav float-xs-right">
          <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>
              </li>
              <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                <div class="media">
                  <div class="media-left valign-middle"><i class="icon-cart3 icon-bg-circle bg-cyan"></i></div>
                  <div class="media-body">
                    <h6 class="media-heading">You have new order!</h6>
                    <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                      <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">30 minutes ago</time></small>
                    </div>
                  </div></a><a href="javascript:void(0)" class="list-group-item">
                    <div class="media">
                      <div class="media-left valign-middle"><i class="icon-monitor3 icon-bg-circle bg-red bg-darken-1"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading red darken-1">99% Server load</h6>
                        <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                          <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Five hour ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                        <div class="media">
                          <div class="media-left valign-middle"><i class="icon-server2 icon-bg-circle bg-yellow bg-darken-3"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                            <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                              <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                            </div>
                          </div></a><a href="javascript:void(0)" class="list-group-item">
                            <div class="media">
                              <div class="media-left valign-middle"><i class="icon-check2 icon-bg-circle bg-green bg-accent-3"></i></div>
                              <div class="media-body">
                                <h6 class="media-heading">Complete the task</h6><small>
                                  <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last week</time></small>
                                </div>
                              </div></a><a href="javascript:void(0)" class="list-group-item">
                                <div class="media">
                                  <div class="media-left valign-middle"><i class="icon-bar-graph-2 icon-bg-circle bg-teal"></i></div>
                                  <div class="media-body">
                                    <h6 class="media-heading">Generate monthly report</h6><small>
                                      <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last month</time></small>
                                    </div>
                                  </div></a></li>
                                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                                </ul>
                              </li>


                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                  <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag tag tag-default tag-info float-xs-right m-0">4 New</span></h6>
                                  </li>
                                  <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                      <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo('images/profile_pics/'.$u_image);?>" alt="avatar"><i></i></span></div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Margaret Govan</h6>
                                        <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start the project.</p><small>
                                          <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                                        </div>
                                      </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                          <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                                          <div class="media-body">
                                            <h6 class="media-heading">Bret Lezama</h6>
                                            <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                                              <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Tuesday</time></small>
                                            </div>
                                          </div></a><a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                              <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                                              <div class="media-body">
                                                <h6 class="media-heading">Carie Berra</h6>
                                                <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                                                  <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Friday</time></small>
                                                </div>
                                              </div></a><a href="javascript:void(0)" class="list-group-item">
                                                <div class="media">
                                                  <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                                                  <div class="media-body">
                                                    <h6 class="media-heading">Eric Alsobrook</h6>
                                                    <p class="notification-text font-small-3 text-muted">We have project party this saturday night.</p><small>
                                                      <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">last month</time></small>
                                                    </div>
                                                  </div></a></li>
                                                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
                                                </ul>
                                              </li>
                                              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="<?php echo('images/profile_pics/'.$u_image);?>" alt="avatar"><i></i></span><span class="user-name"><?php echo $u_name; ?></span></a>
                                                <div class="dropdown-menu dropdown-menu-right"><a href="./profile.php" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="#" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a><a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a><a href="#" id="cpass-icon" class="dropdown-item"><i class="icon-edit"></i>Change Password</a>
                                                  <div class="dropdown-divider"></div><a href="logout.php" id="logout" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                                                </div>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                    </nav>

                                    <span class="chat_icon fa-stack fa-3x" style="  bottom: 0 !important; right: 0 !important;">
                                      <i class="fa fa-circle fa-stack-2x" style="color: #427fe1;"></i>
                                      <i class="fa fa-commenting fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="chat_bar">
                                    Chat Now</span>
                                    <div class="chat_card">
                                      <div class="col-md-12 chat_header">
                                        <i class="fa fa-commenting fa-1x"></i>  Live Chat
                                      </div>
                                        <form id="chat_form" method="post" onsubmit="return false">
                                      <div class="col-md-12 chat_to">
                                        <i class="fa fa-arrow-left back_chat fa-2x" aria-hidden="true"></i><input type="text" id="chat_to_add"class="chat_to_add"placeholder="Enter Email / Phone to start Chat">
                                        <span class="cd-error-message" id="chat_to_error" style="position: sticky;">Invalid Password</span>
                                      </div>
                                      <div class="chat_nav">
                                        <?php
                                        $userid=$_SESSION['user_id'];
                                          $chat_h=mysqli_query($con,"SELECT DISTINCT(user_name),login_phone,login_email,login_id from safedocx_chat,safedocx_login,safedocx_users WHERE login_id=user_id AND (login_id=chat_sender_id OR login_id=chat_receiver_id) AND (chat_sender_id=$userid OR chat_receiver_id=$userid) AND login_id<>$userid");
                                          while ($c_h=mysqli_fetch_array($chat_h)) {
                                            echo "<div class='chat_div'><input type='hidden' class='chat_head_id' value='".$c_h['login_id']."'/><b class='chat_user_head'>".$c_h['user_name']." - ".$c_h['login_phone']."</b><br>".$c_h['login_email']."</div></hr>";
                                          }
                                         ?>
                                      </div>
                                      <div class="chat_content">
                                      </div>
                                      <div>
                                        <textarea placeholder="Type a message" class="type_msg" disabled="disable" onkeyup="auto_grow(this)"></textarea>
                                        <button type="submit" class="msg_sub" disabled="disable"><i class="fa fa-paper-plane fa-2x sub_chat" aria-hidden="true"></i></button>
                                      </div>
                                      </form>
                                      </div>
                                    </div>
                                    <!-- main menu-->
                                    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
                                      <!-- main menu header-->
                                      <div class="main-menu-header">
                                        <input type="text" style="text-align:center" placeholder="Search" value="<?php echo ucfirst($_SESSION['user_type'])." Login";?>" disabled class="menu-search form-control round"/>
                                      </div>
                                      <!-- / main menu header-->
                                      <!-- main menu content-->
                                      <div class="main-menu-content">
                                        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                                          <hr style="width:80%; border:0.4px solid white;"><li class=" nav-item"><a href="./"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
                                            <!-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2"></span> -->
                                          </li>
                                          <?php
                                          if($user_type=="admin"){
                                            ?>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="./admin_state_nodals.php"><i class="icon-user"></i><span data-i18n="nav.page_layouts.main" class="menu-title">State Nodals</span></a></li>
                                            <li class=" nav-item"><a href="./admin_district_nodals.php"><i class="icon-user"></i><span data-i18n="nav.page_layouts.main" class="menu-title">District Nodals</span></a></li>
                                            <li class=" nav-item"><a href="./admin_attestors.php"><i class="icon-user"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Attestors </span></a></li>
                                            <li class=" nav-item"><a href="./admin_users.php"><i class="icon-user"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Users</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="./admin_states.php"><i class="icon-map"></i><span data-i18n="nav.page_layouts.main" class="menu-title">States</span></a></li>
                                            <li class=" nav-item"><a href="./admin_districts.php"><i class="icon-map"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Districts</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="#"><i class="icon-notification"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Notification Area</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">

                                            <?php
                                          }
                                          else if($user_type=="user"){
                                            ?>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="./verified_docs.php"><i class="icon-check-square-o"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Verified Documents</span></a></li>
                                            <li class=" nav-item"><a href="./pending_docs.php"><i class="icon-clock-o"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Pending Documents</span></a></li>
                                            <li class=" nav-item"><a href="./rejected_docs.php"><i class="icon-times"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Rejected Documents</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <!-- <li class=" nav-item"><a href="./sn_district_nodals.php"><i class="icon-box"></i><span data-i18n="nav.page_layouts.main" class="menu-title">ShareBoxes</span></a></li> -->
                                            <li class=" nav-item"><a href="./shared_me_docs.php"><i class="icon-archive"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Shared With Me</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <?php
                                          }
                                          else if($user_type=="s_nodal"){
                                            ?>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="./sn_district_nodals.php"><i class="icon-user"></i><span data-i18n="nav.page_layouts.main" class="menu-title">District Nodals</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="./sn_districts.php"><i class="icon-map"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Districts</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">

                                            <?php
                                          }
                                          else if($user_type=="d_nodal"){
                                            ?>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="./dn_.php"><i class="icon-user"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Attestors</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <?php
                                          }
                                          else if($user_type=="attestor"){
                                            ?>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <li class=" nav-item"><a href="./attestor_requests.php"><i class="icon-arrow-down"></i><span data-i18n="nav.page_layouts.main" class="menu-title">New Requests</span></a></li>
                                            <li class=" nav-item"><a href="./attestor_verified.php"><i class="icon-check-square-o"></i><span data-i18n="nav.page_layouts.main" class="menu-title">verified Documents</span></a></li>
                                            <li class=" nav-item"><a href="./attestor_rejected.php"><i class="icon-times"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Rejected Documents</span></a></li>
                                            <hr style="width:80%; border:0.4px solid white;">
                                            <?php
                                          }
                                          else{
                                            ?>
                                            <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Page layouts</span></a>
                                              <ul class="menu-content">
                                                <li><a href="layout-1-column.html" data-i18n="nav.page_layouts.1_column" class="menu-item">1 column</a>
                                                </li>
                                                <li><a href="layout-2-columns.html" data-i18n="nav.page_layouts.2_columns" class="menu-item">2 columns</a>
                                                </li>
                                                <li><a href="layout-boxed.html" data-i18n="nav.page_layouts.boxed_layout" class="menu-item">Boxed layout</a>
                                                </li>
                                                <li><a href="layout-static.html" data-i18n="nav.page_layouts.static_layout" class="menu-item">Static layout</a>
                                                </li>
                                                <li class="navigation-divider"></li>
                                                <li><a href="layout-light.html" data-i18n="nav.page_layouts.light_layout" class="menu-item">Light layout</a>
                                                </li>
                                                <li><a href="layout-dark.html" data-i18n="nav.page_layouts.dark_layout" class="menu-item">Dark layout</a>
                                                </li>
                                                <li><a href="layout-semi-dark.html" data-i18n="nav.page_layouts.semi_dark_layout" class="menu-item">Semi dark layout</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-briefcase4"></i><span data-i18n="nav.project.main" class="menu-title">Pages</span></a>
                                              <ul class="menu-content">
                                                <li><a href="invoice-template.html" data-i18n="nav.invoice.invoice_template" class="menu-item">Invoice Template</a>
                                                </li>
                                                <li><a href="gallery-grid.html" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item">Gallery Grid</a>
                                                </li>
                                                <li><a href="search-page.html" data-i18n="nav.search_pages.search_page" class="menu-item">Search Page</a>
                                                </li>
                                                <li><a href="search-website.html" data-i18n="nav.search_pages.search_website" class="menu-item">Search Website</a>
                                                </li>
                                                <li><a href="login-simple.html" data-i18n="nav.login_register_pages.login_simple" class="menu-item">Login Simple</a>
                                                </li>
                                                <li><a href="register-simple.html" data-i18n="nav.login_register_pages.register_simple" class="menu-item">Register Simple</a>
                                                </li>
                                                <li><a href="unlock-user.html" data-i18n="nav.login_register_pages.unlock_user" class="menu-item">Unlock User</a>
                                                </li>
                                                <li><a href="recover-password.html" data-i18n="nav.login_register_pages.recover_password" class="menu-item">Recover Password</a>
                                                </li>
                                                <li><a href="#" data-i18n="nav.error_pages.main" class="menu-item">Error</a>
                                                  <ul class="menu-content">
                                                    <li><a href="error-400.html" data-i18n="nav.error_pages.error_400" class="menu-item">Error 400</a>
                                                    </li>
                                                    <li><a href="error-401.html" data-i18n="nav.error_pages.error_401" class="menu-item">Error 401</a>
                                                    </li>
                                                    <li><a href="error-403.html" data-i18n="nav.error_pages.error_403" class="menu-item">Error 403</a>
                                                    </li>
                                                    <li><a href="error-404.html" data-i18n="nav.error_pages.error_404" class="menu-item">Error 404</a>
                                                    </li>
                                                    <li><a href="error-500.html" data-i18n="nav.error_pages.error_500" class="menu-item">Error 500</a>
                                                    </li>
                                                  </ul>
                                                </li>
                                                <li><a href="coming-soon-flat.html" data-i18n="nav.other_pages.coming_soon.coming_soon_flat" class="menu-item">Coming Soon</a>
                                                </li>
                                                <li><a href="under-maintenance.html" data-i18n="nav.other_pages.under_maintenance" class="menu-item">Maintenance</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-ios-albums-outline"></i><span data-i18n="nav.cards.main" class="menu-title">Cards</span></a>
                                              <ul class="menu-content">
                                                <li><a href="card-bootstrap.html" data-i18n="nav.cards.card_bootstrap" class="menu-item">Bootstrap Cards</a>
                                                </li>
                                                <li><a href="card-actions.html" data-i18n="nav.cards.card_actions" class="menu-item">Card Action</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-whatshot"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Advance Cards</span></a>
                                              <ul class="menu-content">
                                                <li><a href="card-statistics.html" data-i18n="nav.cards.card_statistics" class="menu-item">Statistics</a>
                                                </li>
                                                <li><a href="card-charts.html" data-i18n="nav.cards.card_charts" class="menu-item">Charts</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Content</span></a>
                                              <ul class="menu-content">
                                                <li><a href="content-grid.html" data-i18n="nav.content.content_grid" class="menu-item">Grid</a>
                                                </li>
                                                <li><a href="content-typography.html" data-i18n="nav.content.content_typography" class="menu-item">Typography</a>
                                                </li>
                                                <li><a href="content-text-utilities.html" data-i18n="nav.content.content_text_utilities" class="menu-item">Text utilities</a>
                                                </li>
                                                <li><a href="content-helper-classes.html" data-i18n="nav.content.content_helper_classes" class="menu-item">Helper classes</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-grid2"></i><span data-i18n="nav.components.main" class="menu-title">Components</span></a>
                                              <ul class="menu-content">
                                                <li><a href="component-alerts.html" data-i18n="nav.components.component_alerts" class="menu-item">Alerts</a>
                                                </li>
                                                <li><a href="component-buttons-basic.html" data-i18n="nav.components.components_buttons.component_buttons_basic" class="menu-item">Basic Buttons</a>
                                                </li>
                                                <li><a href="component-carousel.html" data-i18n="nav.components.component_carousel" class="menu-item">Carousel</a>
                                                </li>
                                                <li><a href="component-collapse.html" data-i18n="nav.components.component_collapse" class="menu-item">Collapse</a>
                                                </li>
                                                <li><a href="component-dropdowns.html" data-i18n="nav.components.component_dropdowns" class="menu-item">Dropdowns</a>
                                                </li>
                                                <li><a href="component-list-group.html" data-i18n="nav.components.component_list_group" class="menu-item">List Group</a>
                                                </li>
                                                <li><a href="component-modals.html" data-i18n="nav.components.component_modals" class="menu-item">Modals</a>
                                                </li>
                                                <li><a href="component-pagination.html" data-i18n="nav.components.component_pagination" class="menu-item">Pagination</a>
                                                </li>
                                                <li><a href="component-navs-component.html" data-i18n="nav.components.component_navs_component" class="menu-item">Navs Component</a>
                                                </li>
                                                <li><a href="component-tabs-component.html" data-i18n="nav.components.component_tabs_component" class="menu-item">Tabs Component</a>
                                                </li>
                                                <li><a href="component-pills-component.html" data-i18n="nav.components.component_pills_component" class="menu-item">Pills Component</a>
                                                </li>
                                                <li><a href="component-tooltips.html" data-i18n="nav.components.component_tooltips" class="menu-item">Tooltips</a>
                                                </li>
                                                <li><a href="component-popovers.html" data-i18n="nav.components.component_popovers" class="menu-item">Popovers</a>
                                                </li>
                                                <li><a href="component-tags.html" data-i18n="nav.components.component_tags" class="menu-item">Tags</a>
                                                </li>
                                                <li><a href="component-pill-tags.html" class="menu-item">Pill Tags</a>
                                                </li>
                                                <li><a href="component-progress.html" data-i18n="nav.components.component_progress" class="menu-item">Progress</a>
                                                </li>
                                                <li><a href="component-media-objects.html" data-i18n="nav.components.component_media_objects" class="menu-item">Media Objects</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-eye6"></i><span data-i18n="nav.icons.main" class="menu-title">Icons</span></a>
                                              <ul class="menu-content">
                                                <li><a href="icons-feather.html" data-i18n="nav.icons.icons_feather" class="menu-item">Feather</a>
                                                </li>
                                                <li><a href="icons-ionicons.html" data-i18n="nav.icons.icons_ionicons" class="menu-item">Ionicons</a>
                                                </li>
                                                <li><a href="icons-fps-line.html" data-i18n="nav.icons.icons_fps_line" class="menu-item">FPS Line Icons</a>
                                                </li>
                                                <li><a href="icons-ico-moon.html" data-i18n="nav.icons.icons_ico_moon" class="menu-item">Ico Moon</a>
                                                </li>
                                                <li><a href="icons-font-awesome.html" data-i18n="nav.icons.icons_font_awesome" class="menu-item">Font Awesome</a>
                                                </li>
                                                <li><a href="icons-meteocons.html" data-i18n="nav.icons.icons_meteocons" class="menu-item">Meteocons</a>
                                                </li>
                                                <li><a href="icons-evil.html" data-i18n="nav.icons.icons_evil" class="menu-item">Evil Icons</a>
                                                </li>
                                                <li><a href="icons-linecons.html" data-i18n="nav.icons.icons_linecons" class="menu-item">Linecons</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="form-layout-basic.html"><i class="icon-paper"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Basic Forms</span></a>
                                            </li>
                                            <li class=" nav-item"><a href="table-basic.html"><i class="icon-table2"></i><span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Basic Tables</span></a>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-bar-graph-2"></i><span data-i18n="nav.google_charts.main" class="menu-title">google Charts</span></a>
                                              <ul class="menu-content">
                                                <li><a href="google-bar-charts.html" data-i18n="nav.google_charts.google_bar_charts" class="menu-item">Bar charts</a>
                                                </li>
                                                <li><a href="google-line-charts.html" data-i18n="nav.google_charts.google_line_charts" class="menu-item">Line charts</a>
                                                </li>
                                                <li><a href="google-pie-charts.html" data-i18n="nav.google_charts.google_pie_charts" class="menu-item">Pie charts</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-stats-dots"></i><span data-i18n="nav.chartjs.main" class="menu-title">Chartjs</span></a>
                                              <ul class="menu-content">
                                                <li><a href="chartjs-line-charts.html" data-i18n="nav.chartjs.chartjs_line_charts" class="menu-item">Line charts</a>
                                                </li>
                                                <li><a href="chartjs-bar-charts.html" data-i18n="nav.chartjs.chartjs_bar_charts" class="menu-item">Bar charts</a>
                                                </li>
                                                <li><a href="chartjs-pie-doughnut-charts.html" data-i18n="nav.chartjs.chartjs_pie_doughnut_charts" class="menu-item">Pie &amp; Doughnut charts</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-pie-graph2"></i><span data-i18n="nav.flot_charts.main" class="menu-title">Flot Charts</span></a>
                                              <ul class="menu-content">
                                                <li><a href="flot-line-charts.html" data-i18n="nav.flot_charts.flot_line_charts" class="menu-item">Line charts</a>
                                                </li>
                                                <li><a href="flot-bar-charts.html" data-i18n="nav.flot_charts.flot_bar_charts" class="menu-item">Bar charts</a>
                                                </li>
                                                <li><a href="flot-pie-charts.html" data-i18n="nav.flot_charts.flot_pie_charts" class="menu-item">Pie charts</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-map22"></i><span data-i18n="nav.maps.main" class="menu-title">Maps</span></a>
                                              <ul class="menu-content">
                                                <li><a href="gmaps-basic-maps.html" data-i18n="nav.maps.google_maps.gmaps_basic_maps" class="menu-item">Maps</a>
                                                </li>
                                                <li><a href="vector-maps-jvq.html" data-i18n="nav.maps.vector_maps.vector_maps_jvq" class="menu-item">Vector Maps</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-paint-format"></i><span data-i18n="nav.color_palette.main" class="menu-title">Color Palette</span></a>
                                              <ul class="menu-content">
                                                <li><a href="color-palette-primary.html" data-i18n="nav.color_palette.color_palette_primary" class="menu-item">Primary palette</a>
                                                </li>
                                                <li><a href="color-palette-danger.html" data-i18n="nav.color_palette.color_palette_danger" class="menu-item">Danger palette</a>
                                                </li>
                                                <li><a href="color-palette-success.html" data-i18n="nav.color_palette.color_palette_success" class="menu-item">Success palette</a>
                                                </li>
                                                <li><a href="color-palette-warning.html" data-i18n="nav.color_palette.color_palette_warning" class="menu-item">Warning palette</a>
                                                </li>
                                                <li><a href="color-palette-info.html" data-i18n="nav.color_palette.color_palette_info" class="menu-item">Info palette</a>
                                                </li>
                                                <li class="navigation-divider"></li>
                                                <li><a href="color-palette-red.html" data-i18n="nav.color_palette.color_palette_red" class="menu-item">Red palette</a>
                                                </li>
                                                <li><a href="color-palette-pink.html" data-i18n="nav.color_palette.color_palette_pink" class="menu-item">Pink palette</a>
                                                </li>
                                                <li><a href="color-palette-purple.html" data-i18n="nav.color_palette.color_palette_purple" class="menu-item">Purple palette</a>
                                                </li>
                                                <li><a href="color-palette-deep-purple.html" data-i18n="nav.color_palette.color_palette_deep_purple" class="menu-item">Deep Purple palette</a>
                                                </li>
                                                <li><a href="color-palette-indigo.html" data-i18n="nav.color_palette.color_palette_indigo" class="menu-item">Indigo palette</a>
                                                </li>
                                                <li><a href="color-palette-blue.html" data-i18n="nav.color_palette.color_palette_blue" class="menu-item">Blue palette</a>
                                                </li>
                                                <li><a href="color-palette-light-blue.html" data-i18n="nav.color_palette.color_palette_light_blue" class="menu-item">Light Blue palette</a>
                                                </li>
                                                <li><a href="color-palette-cyan.html" data-i18n="nav.color_palette.color_palette_cyan" class="menu-item">Cyan palette</a>
                                                </li>
                                                <li><a href="color-palette-teal.html" data-i18n="nav.color_palette.color_palette_teal" class="menu-item">Teal palette</a>
                                                </li>
                                                <li><a href="color-palette-green.html" data-i18n="nav.color_palette.color_palette_green" class="menu-item">Green palette</a>
                                                </li>
                                                <li><a href="color-palette-light-green.html" data-i18n="nav.color_palette.color_palette_light_green" class="menu-item">Light Green palette</a>
                                                </li>
                                                <li><a href="color-palette-lime.html" data-i18n="nav.color_palette.color_palette_lime" class="menu-item">Lime palette</a>
                                                </li>
                                                <li><a href="color-palette-yellow.html" data-i18n="nav.color_palette.color_palette_yellow" class="menu-item">Yellow palette</a>
                                                </li>
                                                <li><a href="color-palette-amber.html" data-i18n="nav.color_palette.color_palette_amber" class="menu-item">Amber palette</a>
                                                </li>
                                                <li><a href="color-palette-orange.html" data-i18n="nav.color_palette.color_palette_orange" class="menu-item">Orange palette</a>
                                                </li>
                                                <li><a href="color-palette-deep-orange.html" data-i18n="nav.color_palette.color_palette_deep_orange" class="menu-item">Deep Orange palette</a>
                                                </li>
                                                <li><a href="color-palette-brown.html" data-i18n="nav.color_palette.color_palette_brown" class="menu-item">Brown palette</a>
                                                </li>
                                                <li><a href="color-palette-blue-grey.html" data-i18n="nav.color_palette.color_palette_blue_grey" class="menu-item">Blue Grey palette</a>
                                                </li>
                                                <li><a href="color-palette-grey.html" data-i18n="nav.color_palette.color_palette_grey" class="menu-item">Grey palette</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" nav-item"><a href="changelog.html"><i class="icon-copy"></i><span data-i18n="nav.changelog.main" class="menu-title">Changelog</span><span class="tag tag tag-pill tag-danger float-xs-right">1.0</span></a>
                                            </li>
                                            <li class="disabled nav-item"><a href="#"><i class="icon-eye-disabled"></i><span data-i18n="nav.disabled_menu.main" class="menu-title">Disabled Menu</span></a>
                                            </li>
                                            <li class=" nav-item"><a href="#"><i class="icon-android-funnel"></i><span data-i18n="nav.menu_levels.main" class="menu-title">Menu levels</span></a>
                                              <ul class="menu-content">
                                                <li><a href="#" data-i18n="nav.menu_levels.second_level" class="menu-item">Second level</a>
                                                </li>
                                                <li><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">Second level child</a>
                                                  <ul class="menu-content">
                                                    <li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">Third level</a>
                                                    </li>
                                                    <li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.main" class="menu-item">Third level child</a>
                                                      <ul class="menu-content">
                                                        <li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.fourth_level1" class="menu-item">Fourth level</a>
                                                        </li>
                                                        <li><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level_child.fourth_level2" class="menu-item">Fourth level</a>
                                                        </li>
                                                      </ul>
                                                    </li>
                                                  </ul>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class=" navigation-header"><span data-i18n="nav.category.support">Support</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
                                            </li>
                                            <li class=" nav-item"><a href="https://github.com/pixinvent/robust-free-bootstrap-admin-template/issues"><i class="icon-support"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Raise Support</span></a>
                                            </li>
                                            <li class=" nav-item"><a href="https://pixinvent.com/free-bootstrap-template/robust-lite/documentation"><i class="icon-document-text"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Documentation</span></a>
                                            </li>
                                          </ul>

                                          <?php
                                        }
                                        ?>
                                      </div>
                                      <!-- /main menu content-->
                                      <!-- main menu footer-->
                                      <!-- include includes/menu-footer-->
                                      <!-- main menu footer-->
                                    </div>
                                    <!-- / main menu-->
                                    <div class="cd-popup" id="password-change" role="alert">
                                      <div class="cd-popup-container pasvs-pop">
                                        <h3>Change Password</h3>
                                        <hr>
                                        <form method="post" id="pass_change_form" onsubmit="return false">
                                          <div class="form-group ">
                                            <input type="password" id="pass-old" class="form-control" placeholder="Old Password" name="profile-name">
                                            <span class="cd-error-message" id="pass-old-error" >Invalid Password</span>
                                          </div>
                                          <div class="form-group ">
                                            <input type="password" id="pass-new" class="form-control" placeholder="New Password" name="profile-name">
                                            <span class="cd-error-message" id="pass-new-error" >Invalid Password</span>
                                          </div>
                                          <div class="form-group">
                                            <input type="password" id="pass-conf" class="form-control" placeholder="Confirm Password" name="profile-aadhaar">
                                            <span class="cd-error-message" id="pass-conf-error" >Password not matching</span>
                                          </div><hr>
                                          <input type="submit" class="btn btn-success" style="width:100%;" value="Change Password">
                                          <a href="#0" class="cd-popup-close img-replace">Close</a>
                                        </div> <!-- cd-popup-container -->
                                      </form>
                                    </div> <!-- cd-popup -->
                                    <script>
                                    function auto_grow(element) {
                                      element.style.height = "40px";
                                      element.style.height = (element.scrollHeight)+"px";
                                    }
                                    </script>
