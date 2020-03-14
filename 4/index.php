<?php
require_once "config.php";
require_once "common.php";

if (!empty($_GET['page']) && $_GET['page'] == 'add-post')
{ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add New Content Post - DumbSocmed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page Add Content">
    <meta name="author" content="ChlassWG26">

    <!-- Le styles -->
    <link href="<?php echo $base_url; ?>assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo $base_url; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $base_url; ?>assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $base_url; ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $base_url; ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $base_url; ?>assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo $base_url; ?>">DumbSocmed</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="<?php echo $base_url; ?>">Main Content</a></li>
              <li class="active"><a href="javascript:void(0)">Add Content</a></li>
              <li><a href="?page=edit-post">Edit Content</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <h1>Add Posts</h1>
      <hr />

      <div class="container">
      <?php
      if (isset($_POST['addPost'])) {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['writter'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $writter = $_POST['writter'];
        // query sql
	$sql = "INSERT INTO posts_tb (title, content, createdBy) VALUES('$title','$content','$writter')";
	$query = mysqli_query($koneksi, $sql) or die (mysqli_error());
 
	if($query){
		echo "Data berhasil di insert!";
	} else {
		echo "Error :".$sql."<br>".mysqli_error($koneksi);
	}
 
	mysqli_close($koneksi);
    }
    }
    ?>
        <form role="form" action="?page=add-post" method="POST">
            <div class="row">
            <label class="col-xs-4" for="title">Title</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="title" name="title" placeholder="Input Title">
            </div>
            </div>
            <div class="row">
            <label class="col-xs-4" for="content">Content</label>
            <div class="col-xs-12">
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            </div>
            <div class="row">
            <div class="col-xs-12">
            <div class="control-group">
                <label class="control-label" for="writter">Select Writters</label>
                <div class="controls">
                <select id="writter" name="writter">
                <?php
                $sql = "SELECT * FROM user_tb ORDER BY id DESC";
                $query = mysqli_query($koneksi, $sql) or die (mysqli_error());
                if (mysqli_num_rows($query) > 0)
                {
                    while($baris = mysqli_fetch_array($query)) {
                        echo '<option value="' . $baris['id'] . '">' . $baris['name'] . '</option>';
                    }
                }
                mysqli_close($koneksi); ?>
                </select>
                </div>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-xs-12">
                <button type="submit" name="addPost" class="btn btn-default">Submit</button>
            </div>
            </div>
        </form>
        </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $base_url; ?>assets/js/jquery.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-button.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-typeahead.js"></script>

    </body>
</html>
<?php
} else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DumbSocmed - Seputar Informasi Kebun Binatang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Menyajikan informasi seputar tentang kebun binatang">
    <meta name="author" content="Ichlas Wardy Gustama">

    <!-- Le styles -->
    <link href="<?php echo $base_url; ?>assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?php echo $base_url; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $base_url; ?>assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $base_url; ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $base_url; ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $base_url; ?>assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo $base_url; ?>">DumbSocmed</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="javascript:void(0)">Home</a></li>
              <li><a href="users.php">Users</a></li>
              <li><a href="comments.php">Comments</a></li>
            </ul>
            <p class="navbar-text pull-right">Logged in as <a href="javascript:void(0)">Guest</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="javascript:void(0)">Main Content</a></li>
              <li><a href="<?php echo $base_url; ?>?page=add-post">Add Content</a></li>
              <li><a href="<?php echo $base_url; ?>?page=edit-post">Edit Content</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Halo, sobat!</h1>
            <p>Disini kalian bisa mencari berbagai informasi tentang kebun binatang untuk memperluas wawasan sobat sekalian hehehe.</p>
            <p><a class="btn btn-primary btn-large">Pelajari lebih lanjut &raquo;</a></p>
          </div>
          <div class="row-fluid">
          <?php
 
            // query sql
            $sql = "SELECT * FROM posts_tb ORDER BY id DESC";
            $query = mysqli_query($koneksi, $sql) or die (mysqli_error());
            if (mysqli_num_rows($query) > 0)
            {
                $no = 1;
                while ($row = mysqli_fetch_array($query)) {
                $idUser = $row['createdBy'];
                $sql = "SELECT * FROM user_tb ORDER BY id DESC";
                $query = mysqli_query($koneksi, $sql) or die (mysqli_error());
                $writter = mysqli_fetch_array($query);
            echo '
            <div class="span4">
              <h3>' . $row['title'] . '</h2>
              <br />
              <small>' . $writter['name'] . '</small>
              <hr />
              <p>' . $row['content'] . '</p>
            </div><!--/span-->';
                } $no++; } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                mysqli_close($koneksi); ?>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; ChlassWG 2020</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $base_url; ?>assets/js/jquery.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-button.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
            <?php } ?>