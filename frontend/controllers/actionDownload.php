<?php
public function actionDownload(){
        $data = Files::findOne($_SESSION['files_id']);
        header('Content-Type:'.pathinfo(Yii::getAlias('@fileUrl').'/'.$data->filename, PATHINFO_EXTENSION));
        header('Content-Disposition: attachment; filename='.$data->filename);
        readfile(Yii::getAlias('@fileUrl').'/'.$data->filename);
    }
    ?>