<?php 
$model = $connection->createCommand('DELETE FROM comments WHERE files_id=:id');
		$model->bindParam(':id', $id);
		$model->execute();
?>