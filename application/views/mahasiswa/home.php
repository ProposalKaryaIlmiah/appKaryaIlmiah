<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Informasi Pengajuan Karya Ilmiah</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>templates/mahasiswa/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>templates/mahasiswa/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>templates/mahasiswa/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>templates/mahasiswa/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Social Buttons CSS -->
    <link href="<?php echo base_url();?>templates/mahasiswa/vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href=".<?php echo base_url();?>templates/mahasiswa/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>templates/mahasiswa/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>home">Sistem Informasi Pengajuan Karya Ilmiah</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="<?php echo base_url();?>home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                        <li><a href="<?php echo base_url();?>home/dosen"><i class="fa fa-users fa-fw"></i> Dosen</a></li>
                        <li><a href="<?php echo base_url();?>home/pengajuan"><i class="fa fa-edit fa-fw"></i> Pengajuan</a></li>
                        <li><a href="<?php echo base_url();?>home/pengumuman"><i class="fa fa-bullhorn fa-fw"></i> Pengumuman</a></li>
                        <li><a href="<?php echo base_url();?>home/absensi"><i class="fa fa-files-o fa-fw"></i> Form Absensi</a></li>
                        <li><a href="<?php echo base_url();?>home/profil/edit/<?php echo $mahasiswa->mahasiswa_npm; ?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li><a href="<?php echo base_url();?>login/keluar"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
             <?php $this->load->view($content);?>
         
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
<script src="<?php echo base_url();?>templates/mahasiswa/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/metisMenu/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>templates/mahasiswa/dist/js/sb-admin-2.js"></script>
  <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>templates/mahasiswa/vendor/datatables-responsive/dataTables.responsive.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
 