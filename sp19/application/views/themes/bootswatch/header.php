<!DOCTYPE html>
<html lang="en">
  <head>
	<title><?=$this->config->item('title')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap themes use style settings to change look and feel -->
    <!-- old bootwatch files
    <link rel="stylesheet" href="<?=base_url()?>public/themes/bootswatch/css/<?=$this->config->item('style')?>" media="screen">
    <link rel="stylesheet" href="<?=base_url()?>public/themes/bootswatch/css/bootswatch.min.css">
    -->

    <!-- new bootwatch cdn -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-T5jhQKMh96HMkXwqVMSjF3CmLcL1nT9//tCqu9By5XSdj7CwR0r+F3LTzUdfkkQf" crossorigin="anonymous">

    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
     <div class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <nav>
          <a href="<?=base_url()?>" class="navbar-brand"><?=$this->config->item('banner')?></a>
    	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
        <div class="navbar-collapse collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <?=makeLinks($this->config->item('nav1'))?>

            <?php /* comment out original nav bar
            <li class="active"><a href="#" title="">Active Link</a></li>
			<li><?=anchor('customer/mylist','Customers')?></li>
			<li><?=anchor('customer/add','Add Customer')?></li>

            <li><?=anchor('news/','News')?></li>
            <li><?=anchor('news/create','Add News')?></li>
            */ ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
    <?php
    echo bootswatchFeedback();
    ?>
