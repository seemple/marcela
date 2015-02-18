<!DOCTYPE html>
<html lang="en-US" class="<?php echo $class;?>">
<head>
    <meta charset="utf-8">
    <title>Marcela Khouri | <?php echo $title;?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php
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