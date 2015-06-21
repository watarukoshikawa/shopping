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
		<form action="/shopping/cakephp/user/run_regist" method="POST">
			ID<input type="text" name="regist_id">
			名前<input type="text" name="regist_name">
			パスワード<input type="text" name="regist_pass">
			<input type="submit" value="登録">
		</form>
	</div>
</div>