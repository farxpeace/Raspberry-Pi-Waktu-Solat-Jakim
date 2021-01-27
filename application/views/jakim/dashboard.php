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
                                                <span class="number"><?php echo number_format($info['total_records']); ?></span>
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
                                                <span class="number"><?php echo $info['total_zone'] ?></span>
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
                        
                        
                        
                        <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="card-header">Prayer Zone</div>
                                <div class="card-body">
                                    <h5 class="card-title">Select your zone</h5>
                                    <div class="form-group" style="margin-bottom: 0px;">
                                            <select class="form-control" name="selected_zone" id="selected_zone">
                                                <option value="0">Please select your zone</option>
                                                <?php foreach($info['list_all_zone'] as $a => $b){ ?>
                                                <option value="<?php echo $b; ?>" <?php if($config['selected_zone'] == $b){ echo "selected"; } ?>><?php echo $b; ?></option>
                                                <?php } ?>
                                            </select>
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-8 mt-3">
                            
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Latest Adhan Record</h5>
                                        <p class="text-muted">Trigger by system</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table no-margin bg-lighter-grey">
                                            <thead class="success">
                                                <tr>
                                                    <th><?php echo ucwords(strtolower($info['last_run']['prayer_detail']['name'])) ?></th>
                                                    <th class="text-right"><?php echo date("l, j F Y h:i A", $info['last_run']['prayer_detail']['unix_timestamp']); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class="teal fas fa-compass"></i> Zone</td>
                                                    <td class="text-right"><?php echo $info['last_run']['prayer_detail']['jakim_zon'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="blue fas fa-globe-asia"></i> Timezone</td>
                                                    <td class="text-right"><?php echo $info['last_run']['prayer_detail']['timezone'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="green fas fa-play-circle"></i> Media Status</td>
                                                    <td class="text-right">
                                                        <?php if($info['last_run']['prayer_detail']['media_detail']['status'] == 'found'){ ?>
                                                        Media exists
                                                        <?php }elseif($info['last_run']['prayer_detail']['media_detail']['status'] == 'not_found'){ ?>
                                                        No media found
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="green fas fa-music"></i> Media Name</td>
                                                    <td class="text-right">
                                                        <?php if($info['last_run']['prayer_detail']['media_detail']['status'] == 'found'){ ?>
                                                            <?php echo $info['last_run']['prayer_detail']['media_detail']['media_name']; ?>
                                                        <?php }elseif($info['last_run']['prayer_detail']['media_detail']['status'] == 'not_found'){ ?>
                                                            -
                                                        <?php }else{ ?>
                                                            -
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                
                                                
                                                
                                                
                                                
                                                
                                            </tbody>
                                        </table>
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
                                                <tr>
                                                    <td><i class="blue fa fa-star-and-crescent"></i> Imsk</td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($info['media_adhan_imsk']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $info['media_adhan_imsk']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_imsk" class="upload_media_adhan" data-adhan_name="imsk" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_imsk" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('media_adhan_imsk')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="blue fa fa-star-and-crescent"></i> Fajr</td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($info['media_adhan_fajr']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $info['media_adhan_fajr']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_fajr" class="upload_media_adhan" data-adhan_name="fajr" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_fajr" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('media_adhan_fajr')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="blue fa fa-star-and-crescent"></i> Sunrise (Syuruk)</td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($info['media_adhan_sunrise']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $info['media_adhan_sunrise']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_sunrise" class="upload_media_adhan" data-adhan_name="sunrise" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_sunrise" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('media_adhan_sunrise')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="blue fa fa-star-and-crescent"></i> Dhuhr</td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($info['media_adhan_dhuhr']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $info['media_adhan_dhuhr']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_dhuhr" class="upload_media_adhan" data-adhan_name="dhuhr" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_dhuhr" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('media_adhan_dhuhr')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="blue fa fa-star-and-crescent"></i> Asr</td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($info['media_adhan_asr']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $info['media_adhan_asr']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_asr" class="upload_media_adhan" data-adhan_name="asr" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_asr" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('media_adhan_asr')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="blue fa fa-star-and-crescent"></i> Maghrib</td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($info['media_adhan_maghrib']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $info['media_adhan_maghrib']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_maghrib" class="upload_media_adhan" data-adhan_name="maghrib" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_maghrib" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('media_adhan_maghrib')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="blue fa fa-star-and-crescent"></i> Isha</td>
                                                    <td class="text-right">
                                                        <span class="adhan_media_name">
                                                            <?php if(strlen($info['media_adhan_isha']) < 5){ ?>
                                                            No file chosen
                                                            <?php }else{ echo $info['media_adhan_isha']; }  ?>
                                                        </span>
                                                        <input type="file" id="upload_media_adhan_isha" class="upload_media_adhan" data-adhan_name="isha" hidden/>
                                                        
                                                        
                                                        <label for="upload_media_adhan_isha" class="btn btn-icon icon-left btn-info btn-sm">
                                                            <i class="fas fa-file-upload"></i> Upload
                                                        </label>
                                                        <button onclick="javascript: remove_media('media_adhan_isha')" type="button" class="btn btn-icon icon-left btn-danger btn-sm mb-2"><i class="fas fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                
                                                
                                                
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
    <script src="<?php echo base_url(); ?>assets/js/dashboard-charts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
</body>

<script type="text/javascript">
$(function(){
    $(".upload_media_adhan").on("change", function(){
        var adhan_media_name = $(this).parent().children('.adhan_media_name');
        $(adhan_media_name).text(this.files[0].name);
        
        
        var adhan_name = $(this).data("adhan_name");
        start_upload(this.files, adhan_name);
    });
});

function remove_media(media_name){
    $.ajax({
        url: "<?php echo site_url(); ?>/jakim/remove_media_adhan",
        type: "POST",
        dataType: "JSON",
        data: {
            postdata: {
                media_name: media_name
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
            
            var parent = $("#upload_"+media_name).parent().children(".adhan_media_name").text("No file chosen");
        }
    })
}

function start_upload(files, adhan_name){


        var fd = new FormData();
        fd.append("adhan_name", adhan_name);
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