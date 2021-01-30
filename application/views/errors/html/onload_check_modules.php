<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.0
* Author: Alexis Luna
* Copyright 2020 Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blank Page | Bootstrap Simple Admin Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@duckdoc/termynal@1.0.0/termynal.css" integrity="sha256-dMpY/WddWZbPzXeg/67fZN+gqClErMKM/GpaJE8Bnwk=" crossorigin="anonymous">
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="assets/img/bootstraper-logo.png" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="dashboard.html"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="forms.html"><i class="fas fa-file-alt"></i> Forms</a>
                </li>
                <li>
                    <a href="tables.html"><i class="fas fa-table"></i> Tables</a>
                </li>
                <li>
                    <a href="charts.html"><i class="fas fa-chart-bar"></i> Charts</a>
                </li>
                <li>
                    <a href="icons.html"><i class="fas fa-icons"></i> Icons</a>
                </li>
                <li>
                    <a href="#uielementsmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> UI Elements</a>
                    <ul class="collapse list-unstyled" id="uielementsmenu">
                        <li>
                            <a href="ui-buttons.html"><i class="fas fa-angle-right"></i> Buttons</a>
                        </li>
                        <li>
                            <a href="ui-badges.html"><i class="fas fa-angle-right"></i> Badges</a>
                        </li>
                        <li>
                            <a href="ui-cards.html"><i class="fas fa-angle-right"></i> Cards</a>
                        </li>
                        <li>
                            <a href="ui-alerts.html"><i class="fas fa-angle-right"></i> Alerts</a>
                        </li>
                        <li>
                            <a href="ui-tabs.html"><i class="fas fa-angle-right"></i> Tabs</a>
                        </li>
                        <li>
                            <a href="ui-date-time-picker.html"><i class="fas fa-angle-right"></i> Date & Time Picker</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#authmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Authentication</a>
                    <ul class="collapse list-unstyled" id="authmenu">
                        <li>
                            <a href="login.html"><i class="fas fa-lock"></i> Login</a>
                        </li>
                        <li>
                            <a href="signup.html"><i class="fas fa-user-plus"></i> Signup</a>
                        </li>
                        <li>
                            <a href="forgot-password.html"><i class="fas fa-user-lock"></i> Forgot password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pagesmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Pages</a>
                    <ul class="collapse list-unstyled" id="pagesmenu">
                        <li>
                            <a href="blank.html"><i class="fas fa-file"></i> Blank page</a>
                        </li>
                        <li>
                            <a href="404.html"><i class="fas fa-info-circle"></i> 404 Error page</a>
                        </li>
                        <li>
                            <a href="500.html"><i class="fas fa-info-circle"></i> 500 Error page</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="users.html"><i class="fas fa-user-friends"></i>Users</a>
                </li>
                <li>
                    <a href="settings.html"><i class="fas fa-cog"></i>Settings</a>
                </li>
            </ul>
        </nav>
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                
                
            </nav>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3 style="text-align: center;">There are some error need to resolve first</h3>
                    </div>
<style>
blockquote {
    margin: 0;
    background-color: #808080;
    color: #FFFFFF;
    padding: 5px 20px;
    width: 100%;
    margin-bottom: 10px;
}                    
</style>
                    <?php if(is_array($error['missing_required_extension']) && count($error['missing_required_extension']) > 0){ ?>
                    
                    <?php foreach($error['missing_required_extension'] as $a => $b){ ?>
                    <div class="card">
                        <h5 class="card-header">Missing Required Extension '<?php echo $b; ?>'</h5>
                            <div class="card-body">
                                <?php if($b == 'sqlite3'){ ?>
                                Check PHP version
                                <blockquote>php -v</blockquote>
                                <blockquote>sudo apt-get install sqlite3</blockquote>
                                <blockquote>sudo apt-get install php7.3-sqlite</blockquote>
                                <blockquote>sudo service apache2 restart</blockquote>
                                <?php } ?>
                                
                                <?php if($b == 'mbstring'){ ?>
                                Install mbstring
                                <blockquote>sudo apt-get install php7.3-mbstring</blockquote>
                                <blockquote>sudo service apache2 restart</blockquote>
                                <?php } ?>
                                
                            </div>
                        </div>
                    <?php } ?>
                    
                    
                    <?php } ?>
                    
                    <?php if(is_array($error['database_not_writable']) && count($error['database_not_writable']) > 0){ ?>
                    
                        <?php foreach($error['database_not_writable'] as $a => $b){ ?>
                        <div class="card">
                            <h5 class="card-header">Database not writable '<?php echo $b; ?>'</h5>
                                <div class="card-body">
                                    <?php if(is_dir($b)){ ?>
                                    <blockquote>sudo chmod 0775 -R <?php echo $b; ?></blockquote>
                                    <?php }else{ ?>
                                    <blockquote>sudo chmod 0775 <?php echo $b; ?></blockquote>
                                    <?php } ?>
                                    
                                    
                                    
                                </div>
                            </div>
                        <?php } ?>
                    
                    
                    <?php } ?>
                    
                    <?php if(is_array($error['media_adhan_directory_not_writable']) && count($error['media_adhan_directory_not_writable']) > 0){ ?>
                    
                        <?php foreach($error['media_adhan_directory_not_writable'] as $a => $b){ ?>
                        <div class="card">
                            <h5 class="card-header">Media directory not writable '<?php echo $b; ?>'</h5>
                                <div class="card-body">
                                    <?php if(is_dir($b)){ ?>
                                    <blockquote>sudo chmod 0775 -R <?php echo $b; ?></blockquote>
                                    <?php }else{ ?>
                                    <blockquote>sudo chmod 0775 <?php echo $b; ?></blockquote>
                                    <?php } ?>
                                    
                                    
                                    
                                </div>
                            </div>
                        <?php } ?>
                    
                    
                    <?php } ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@duckdoc/termynal@1.0.0/termynal.js" ></script>
</body>

</html>