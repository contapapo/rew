<meta charset="utf-8">
<meta name="description" content="">
<meta name="" content="">

<title>Réseau d'Energies de Wavre</title>

<!-- load bootstrap from a cdn -->
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.css') !!}
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}

<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.0.0.min.js"></script>

<!-- ui theme stylesheet - contents shown below -->
<link rel="stylesheet" href="css/theme.less.css">
<!-- jQuery UI theme (cupertino example here) -->
<link rel="stylesheet" href="css/theme.bootstrap_2.css">
<!-- tablesorter plugin -->
<script src="js/jquery.tablesorter.js"></script>
<!-- tablesorter widget file - loaded after the plugin -->
<script src="js/jquery.tablesorter.widgets.js"></script>
    

<script type="text/javascript" language="JavaScript">
//    setTimeout(function () {
//            location.href = 'http://localhost/rew/public/save'; 
//            }, 5000);

setTimeout(function() { location.href = 'http://localhost/rew/public/'; }, 1000*<?php 
$then1 = mktime(11,45,0);
$tomorrow1 = mktime(06,45,0, date("m") , date("d")+1);
$now1 = time(); 
if ($now1 > $then1) {echo $tomorrow1 - $now1;}
else {echo $then1 - $now1;}?>);

setTimeout(function() { location.href = 'http://localhost/rew/public/savedaily'; }, 1000*<?php 
$then1 = mktime(12,00,0);
$tomorrow1 = mktime(07,00,0, date("m") , date("d")+1);
$now1 = time(); 
if ($now1 > $then1) {echo $tomorrow1 - $now1;}
else {echo $then1 - $now1;}?>);
    
setTimeout(function() {location.href = 'http://localhost/rew/public/savecomp'; }, 1000*<?php 
$then = mktime(12,00,30);
$tomorrow = mktime(07,00,30, date("m") , date("d")+1);
$now = time(); 
if ($now > $then) {echo $tomorrow - $now;}
else {echo $then - $now;}?>);
    
setTimeout(function() {location.href = 'http://localhost/rew/public/savemonthly'; }, 1000*<?php 
$then = mktime(12,01,0);
$tomorrow = mktime(07,01,0, date("m") , date("d")+1);
$now = time(); 
if ($now > $then) {echo $tomorrow - $now;}
else {echo $then - $now;}?>);
    
setTimeout(function() {location.href = 'http://localhost/rew/public/movefiles'; }, 1000*<?php 
$then = mktime(12,10,0);
$tomorrow = mktime(07,10,0, date("m") , date("d")+1);
$now = time(); 
if ($now > $then) {echo $tomorrow - $now;}
else {echo $then - $now;}?>);

</script>

    <style> textarea { resize: none; } </style>