<?php

/* @var $this yii\web\View */

$this->title = 'MyRepo';
?>
<div class="site-index">

    <div class="jumbotron">
    	<?php
    	if(isset($_SESSION['berhasil]'])){
    		unset($_SESSION['berhasil']) ?>
	        <div class="alert alert-success alert-dismissible">
	              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
	              <strong>SignUP GAGAL!</strong> Username sudah dipakai.
	        </div>
    	<?php } ?>
        <center>
        <font face="Century Gothic" size="6">
            Welcome Admin!
             
        </font>
        </center>
    </div>
</div>
