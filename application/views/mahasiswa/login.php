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
             <li><a href="#">Login</a></li>
             
           </ul>
        </div>  
     </div> 
</div>

<!--main-->
<div class="col-md-12" id="main">
   <div class="row">
      <div class="col-md-12 col-md-12 col-sm-12">
      <div class="panel panel-default">
           <div class="panel-heading"><h4>Login Mahasiswa</h4></div>
              <div class="panel-body">
                <div class="col-md-12">
                   
                               <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-close sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                     <form class="form" action="<?php echo base_url();?>login/ceklogin" method="post">
                     <div class="table-responsive">
                    <table>
                      <tr>
                         <td>NPM</td>
                         <td>:</td>
                         <td><input type="npm" class="form-control input-lg" name="npm" placeholder="Masukan NPM"></td>
                      </tr>
                      <tr>
                       <td>Password</td>
                         <td>:</td>
                          <td><input type="password" class="form-control input-lg" name="password" placeholder="Password"></td>
                      </tr>
                      <tr>
                          <td><input type="submit" class="btn btn-primary center-block" name="masuk" value="login">
                          </tr>
                          </table>
                      </div>
                    </form>
                  </div>
                
              
            </div>
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