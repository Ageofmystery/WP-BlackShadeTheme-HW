<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
    <header class="prime-header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 class="logo"><a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            </div>
            <?php
            $menuArguments = array(
                'theme_location' => 'primary',
                'container'       => 'nav',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'bs-example-navbar-collapse-1',
                'menu_class' 	=> 'top-menu nav navbar-nav navbar-right',
            );
            wp_nav_menu($menuArguments); ?>
        </div>
        <nav class="home-drop-menu unvis">
            <div class="container">
                <ul class="row center-xs end-sm">
                    <?php $args = array(
                        'style'              => 'list',
                        'title_li'           => '',
                        'taxonomy'           => 'category',
                    );
                    wp_list_categories( $args ); ?>
                </ul>
            </div>
        </nav>
    </header>