<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 06.02.2017
 * Time: 15:44
 */
    // database
    include("func/database.php");

    // functions
    include("func/functions.php");


    // checks any page was given
    if (isset($_GET["page"])) { $page=$_GET["page"]; }
    else { $page="strona-glowna"; }

    // if exists $page
    if (!file_exists("layout/".$page.".php")) { $page="404"; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pożyczka MAXX - kredyty, pożyczki, chwilówki - Twoje miejsce wiedzy o finansach</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main-style.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>

    <link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="ico/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="ico/favicon-160x160.png" sizes="160x160" />
    <link rel="icon" type="image/png" href="ico/favicon-196x196.png" sizes="196x196" />
    <link rel="apple-touch-icon" sizes="57x57" href="ico/favicon-57x57.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="ico/favicon-114x114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="ico/favicon-72x72.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="ico/favicon-144x144.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="ico/favicon-60x60.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="ico/favicon-120x120.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="ico/favicon-76x76.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="ico/favicon-152x152.png" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="ico/favicon-144x144.png">

    <!-- // google tracking -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-41890492-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>

<div class="container">
    <!-- mini-header -->
    <?php include("layout/mini-header.php"); ?>
    <!-- END mini-header -->

    <!-- main menu -->
    <?php include("layout/main-menu.php"); ?>
    <!-- end main menu -->

    <!-- main advertising -->
    <?php include("layout/main-advertising.php"); ?>
    <!-- end of main advertising -->

    <hr />



    <!-- main content -->

    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <?php include("layout/".$page.".php"); ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <?php include("layout/right-column-side.php"); ?>
    </div>
    </div>

    <!-- END of main content -->

    <br /><hr /><br />

    <!-- footer -->
    <?php include("layout/footer.php"); ?>
    <!-- footer END -->
</div>


<!-- close database connection -->
<?php $db=null; ?>

</body>
</html>
