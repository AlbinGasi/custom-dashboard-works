
<body>
<input type="hidden" id="path" value="<?php echo Config::get('path_url') ?>">
<script>
var path = document.getElementById("path").value;
</script>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin Panel</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
                      <li>
                        <a  href="admin.php?action=newphoto"><i class="fa fa-desktop fa-3x"></i> Add new photo</a>
                    </li>
					<li>
                        <a  href="admin.php?action=categories"><i class="fa fa-table fa-3x"></i> Categories</a>
                    </li>
					<li>
                        <a  href="admin.php?action=files"><i class="fa fa-file fa-3x"></i> All files</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >