<?php include_once ('head.php')?>

<body data-spy="scroll" data-target=".navbar-fixed-top">
<?php include_once('header.php')?>
<div class="clear"></div>
<div id="page-content">
    <section class="breadcrumb">
        <div class="container">
            <h2>Blog Page</h2>
            <ul>
                <li><a href="index.html">Home</a> ></li>
                <li><a href="#"><?php echo $_SERVER['REQUEST_URI'] ?></a></li>
            </ul>
        </div>
    </section>
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    <div class="blog-post">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="clear"></div>
<?php include_once ('footer.php')?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>

</html>
