
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
    <title><?php echo $config['system_name']; ?></title>
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icomoon-v1.0/style.css">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/master.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet">
    
<style>
.card .content .footer {
    line-height: 33px !important;
}
</style>
</head>

<body>
    <div class="wrapper">
        
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-link"></i> <span>Help</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        
                                        
                                        <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Version</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i> Updates</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i> About</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        
                        <?php /*
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Total Records</p>
                                                <span class="number"><?php echo $this->adhan->count_total_prayer_time(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-calendar"></i> Stored in database
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-money-bill-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Total Zone</p>
                                                <span class="number"><?php echo $this->adhan->total_zone(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-calendar"></i> Stored in database
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        */ ?>
                        
                        <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="card-header">Prayer Zone</div>
                                <div class="card-body">
                                    <h5 class="card-title">Select your zone</h5>
                                    <div class="form-group" style="margin-bottom: 0px;">
                                            <select class="form-control" name="selected_zone" id="selected_zone">
                                                <option value="0">Please select your zone</option>
                                                <?php foreach($this->adhan->list_all_zone() as $a => $b){ ?>
                                                <option value="<?php echo $b['jakim_zon']; ?>" <?php if($selected_zone == $b['jakim_zon']){ echo "selected"; } ?>><?php echo $b['jakim_zon']; ?></option>
                                                <?php } ?>
                                            </select>
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Media Player</h5>
                                        <p class="text-muted">MPG123</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <div id="now_playing_idle" style="display: none;">
                                            <div class="alert alert-primary" role="alert"><i class="fas fa-info"></i> Not playing any media Adhan.</div>
                                            
                                        </div>
                                        
                                        <div id="now_playing_adhan" style="display: none;">
                                            <div class="alert alert-success" role="alert"><i class="fas fa-play"></i> <span class="now_playing_adhan_text"></span></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Cronjob</h5>
                                        <p class="text-muted">Triggering Prayer Time</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <?php if($is_cronjob_prayer_time_exists == 'no'){ ?>
                                            <div class="alert alert-danger">
                                                <h5 class="alert-title"><i class="fas fa-exclamation-triangle"></i> Important</h5>
                                                We could not found cronjob to trigger Prayer Time. Please configure it.
                                            </div>
                                        <?php }else{ ?>
                                            
                                            
                                        
                                        
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Media</h5>
                                        <p class="text-muted">Choose media to play when the time has come</p>
                                    </div>
                                    
                                    <div class="canvas-wrapper">
                                    
                                        
                                    
                                        <table class="table no-margin bg-lighter-grey">
                                            <thead class="success">
                                                <tr>
                                                    <th>Prayer</th>
                                                    <th class="text-right">Media</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($this->adhan->list_prayer_detail() as $a => $b){ ?>
                                                <tr>
                                                    <td><i class="<?php if(strlen($b['adhan_media_name']) < 5){ echo "grey"; }else{ echo "blue"; } ?> fa fa-star-and-crescent icon_adhan"></i> <?php echo $b['adhan_name']; ?></td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($b['adhan_media_name']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $b['adhan_media_name']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_<?php echo $b['adhan_id']; ?>" class="upload_media_adhan" data-adhan_id="<?php echo $b['adhan_id']; ?>" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_<?php echo $b['adhan_id']; ?>" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('<?php echo $b['adhan_id']; ?>')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                        
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <a href="https://github.com/farxpeace/Raspberry-Pi-Waktu-Solat-Jakim" target="_blank">
                                                <i class="black large-icon mb-2 fab fa-github-alt"></i>
                                                <h4 class="mb-0">Github</h4>
                                            <p class="text-muted">Raspberry-Pi-Waktu-Solat-Jakim</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <a href="https://www.facebook.com/farxpeace" target="_blank">
                                                <i class="blue large-icon mb-2 fab fa-facebook"></i>
                                                <h4 class="mb-0">Profile</h4>
                                                <p class="text-muted">@farxpeace</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="red large-icon mb-2 fab fa-google"></i>
                                            <h4 class="mb-0">Gmail</h4>
                                            <p class="text-muted">farxpeace@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="olive large-icon mb-2 fas fa-phone-square-alt"></i>
                                            <h4 class="mb-0">Mobile</h4>
                                            <p class="text-muted">+60 13 797 4467</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chartsjs/Chart.min.js"></script>
    <!--  <script src="<?php echo base_url(); ?>assets/js/dashboard-charts.js"></script>  -->
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
</body>

<script type="text/javascript">
$(function(){
    doPoll();
    
    $(".upload_media_adhan").on("change", function(){
        var adhan_media_name = $(this).parent().children('.adhan_media_name');
        $(adhan_media_name).text(this.files[0].name);
        
        
        var adhan_id = $(this).data("adhan_id");
        start_upload(this.files, adhan_id);
    });
});

var poll_time = 5000;
function doPoll(){
    $.ajax({
        url: "<?php echo site_url(); ?>/jakim/now_playing",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            if(data.status == 'idle'){
                $("#now_playing_idle").show();
                $("#now_playing_adhan").hide();
            } else if (data.status == 'playing'){
                poll_time = 10000;
                $(".now_playing_adhan_text").html(" Now playing <b>"+data.now_playing.media_adhan_info.adhan_media_name+"</b>");
                $("#now_playing_adhan").show();
                $("#now_playing_idle").hide();
            }
            
            
            
            setTimeout(doPoll,poll_time);
        }
    })
    
}

function remove_media(adhan_id){
    $.ajax({
        url: "<?php echo site_url(); ?>/jakim/remove_media_adhan",
        type: "POST",
        dataType: "JSON",
        data: {
            postdata: {
                adhan_id: adhan_id
            }
        },
        success: function(data){
            if(data.status == 'success'){
                $.toast({
                    text: data.message_single, // Text that is to be shown in the toast
                    heading: 'Configuration Updated', // Optional heading to be shown on the toast
                    icon: 'success', // Type of toast icon
                    showHideTransition: 'fade', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'top-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    
                    
                    
                    textAlign: 'left',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9EC600',  // Background color of the toast loader
                });
            }
            
            var parent = $("#upload_media_adhan_"+adhan_id).parent().children(".adhan_media_name").text("No file chosen");
            
            var icon = $("#upload_media_adhan_"+adhan_id).parent().closest("tr").find(".icon_adhan")[0];
            $(icon).removeClass('blue').addClass('grey');
            
        }
    })
}

function start_upload(files, adhan_id){


        var fd = new FormData();
        fd.append("adhan_id", adhan_id);
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: '<?php echo site_url(); ?>/jakim/upload_mp3_for_adhan',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(data){
                data = JSON.parse(data);
                 if(data.status == "success"){
                    
                    var icon = $("#upload_media_adhan_"+adhan_id).parent().closest("tr").find(".icon_adhan")[0];
                    $(icon).removeClass('grey').addClass('blue');
                    
                    $.toast({
                        text: data.message_single, // Text that is to be shown in the toast
                        heading: 'Uploaded', // Optional heading to be shown on the toast
                        icon: 'success', // Type of toast icon
                        showHideTransition: 'fade', // fade, slide or plain
                        allowToastClose: true, // Boolean value true or false
                        hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                        position: 'top-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                        
                        
                        
                        textAlign: 'left',  // Text alignment i.e. left, right or center
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600',  // Background color of the toast loader
                    });
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
        

}
</script>
<script type="text/javascript">
$(function(){
    $("#selected_zone").on("change", function(){
        on_change_selected_zone();
    });
});
function on_change_selected_zone(){
    var selected_zone = $("#selected_zone").val();
    $.ajax({
        url: '<?php echo site_url(); ?>/jakim/jakim_update_config',
        type: "POST",
        dataType: "JSON",
        data: {
            postdata: {
                selected_zone: selected_zone
            }
        },
        success: function(data){
            if(data.status == 'success'){
                $.toast({
                    text: data.message_single, // Text that is to be shown in the toast
                    heading: 'Configuration Updated', // Optional heading to be shown on the toast
                    icon: 'success', // Type of toast icon
                    showHideTransition: 'fade', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'top-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    
                    
                    
                    textAlign: 'left',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9EC600',  // Background color of the toast loader
                });
            }
        }
    })
}
</script>

</html>