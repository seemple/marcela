<!DOCTYPE html>
<html lang="en-US" class="homepage">
<head>
    <meta charset="utf-8">
    <title>Marcela Khouri | <? echo $title;?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<?
	if(!empty($meta))
	foreach($meta as $name=>$content){
		echo "\n\t\t";
	?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" />
	<?php } echo "\n"; ?>
    <!-- Prefetching Fonts -->
    <link rel="dns-prefetch" href="http://fonts.googleapis.com/" />

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo base_url("assets/themes/samurai");?>/css/general.css" />

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:600' rel='stylesheet' type='text/css' />
</head>