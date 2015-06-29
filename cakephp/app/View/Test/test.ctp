<form action="/shopping/cakephp/test/run" method="POST" enctype="multipart/form-data">
	<input type="file" name="data[file]" value="">
	<input type="submit" value="go">
</form>
<?php echo $this->Html->image('test1.jpeg',array('alt' => 'tet')); ?>