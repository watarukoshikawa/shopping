<style type="text/css">
	div#main_area{
		width: 500px;
		margin: 0 auto;
	}
</style>

<div id="main_area">
	<?php
		if(isset($msg) && $msg != ""){
			print("<h1>".$msg."</h1>");
		}
	?>
	<div id="button_area">
		<form action="/shopping/cakephp/user" method="POST">
			<input type="submit" value="戻る">
		</form>
	</div>
	<div id="regist_area">
		<?php if(isset($update_data)): ?>
		<form action="/shopping/cakephp/user/run_update" method="POST">
				<input type="hidden" name="forcs_id" value="<?php echo $update_data['account_tb']['id']; ?>">
				ID<input type="text" name="regist_id" value="<?php echo $update_data['account_tb']['id']; ?>">
				名前<input type="text" name="regist_name" value="<?php echo $update_data['account_tb']['name']; ?>">
				パスワード<input type="text" name="regist_pass" value="<?php echo $update_data['account_tb']['pass']; ?>">
				残金<input type="text" name="regist_money" value="<?php echo $update_data['account_tb']['money']; ?>">
				<input type="submit" value="変更">
		<?php else: ?>
		<form action="/shopping/cakephp/user/run_regist" method="POST">
				ID<input type="text" name="regist_id">
				名前<input type="text" name="regist_name">
				パスワード<input type="text" name="regist_pass">
				残金<input type="text" name="regist_money">
			<input type="submit" value="登録">
			<?php endif; ?>
		</form>
	</div>
</div>