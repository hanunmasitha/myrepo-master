<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <font face="Oswald" size="4"><?= Html::encode($this->title) ?></font>


    <div class="alert alert-danger">
        <font face="Century Gothic" size="2">
            <?= nl2br(Html::encode($message)) ?>
        </font>
    </div>

    <font face="Century Gothic" size="2">
        The above error occurred while the Web server was processing your request.
    </font>
    <font face="Century Gothic" size="2">
        Please contact us if you think this is a server error. Thank you.
    </font>

</div>
