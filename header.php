<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Theme for building apartment rental sites">
    <meta name="author" content="Noah Gamboa">

    <title><?php echo get_bloginfo('name')?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head();?>
    <link href="<?php bloginfo('template_directory');?>/blog.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

    <div class="blog-masthead">
        <div class="blog-masthead-wrapper">
            <div class="blog-header">
                <h1 class="blog-title"><a class="blog-title-text" href="<?php bloginfo('wpurl');?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
                <p class="blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
            </div>
                <div class="menu-btn" onclick="openMenu()">Menu</div>

            <nav class="nav">
                <?php wp_list_pages( '&title_li='); ?>
            </nav>
            <a class="btn blog-lease-now" href="<?php bloginfo('wpurl');?>/contact/">Lease Now</a>
        </div>
    </div>


