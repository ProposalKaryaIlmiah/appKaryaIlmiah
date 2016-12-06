<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Sistem Informasi Pengajuan Karya Ilmiah</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>templates/css/bootstrap.css" rel="stylesheet">
      <link href="<?php echo base_url();?>templates/css/styles.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-fixed-top header">
  <div class="col-md-12">
        <div class="navbar-header">
          
          <a href="#" class="navbar-brand"> Sistem Informasi Pengajuan Karya Ilmiah</a>
         
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
          <ul class="nav navbar-nav navbar-right">
             <li><a href="#" id="btnToggle"><i class="glyphicon glyphicon-user"></i></a></li>
             <li><a href="<?php echo base_url();?>login/keluar"><i class="glyphicon glyphicon-off"></i></a></li>
           </ul>
        </div>  
     </div> 
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">
            
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav ">
             <li><a href="<?php echo base_url();?>home">Home</a></li>
             <li><a href="#">Dosen</a></li>
             <li><a href="<?php echo base_url();?>home/pengajuan">Pengajuan</a></li>
             <li><a href="#">Pengumuman</a></li>
             <li><a href="#">Form Absensi</a></li>
           </ul>
        </div>  
     </div> 
</div>

s<!--main-->
<div class="col-md-12" id="main">
   <div class="row">
      <div class="col-md-12 col-md-12 col-sm-12">
      <div class="panel panel-default">
                <?php $this->load->view($content);?>
                  
               
         </div> 
   
    </div><!--playground-->
    
    <br>
    
    <div class="clearfix"></div>
      
    <div class="col-md-12 text-center"><p><a href="#" target="_ext">Create by :  Sistem Informasi Pengajuan Karya Ilmiah</a></p></div>
    <hr>
    
  </div>
</div><!--/main-->

  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo base_url();?>templates/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>templates/js/scripts.js"></script>
  </body>
</html>