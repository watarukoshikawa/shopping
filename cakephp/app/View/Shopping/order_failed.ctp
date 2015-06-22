<style>
	div#msg_box{
		margin-top: 20px;
		text-align: center;
		font-size: 20px;
	}
	div#btn_box{
		margin-top: 30px;
		text-align: center;
	}
</style>

<div id="msg_box">
	<?php foreach ($msg as $failed_msg): ?>
		<div><?php echo $failed_msg; ?></div>
	<?php endforeach; ?>
</div>

<div id="btn_box">
	<form action="cart" method="POST">
		<input type="submit" name="return_btn" value="カートに戻る">
	</form>
</div>
