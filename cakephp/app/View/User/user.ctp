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
		<div id="regist_area">
			<form action="/shopping/cakephp/user/show_regist">
				<input type="submit" value="新規登録">
			</form>
		</div>
		<div id="return_area">
			<form action="/shopping/cakephp/master" action="POST">
				<input type="submit" value="戻る">
			</form>
		</div>
	</div>
	<div id="table_area">
		<table>
			<tr>
				<th>ID</th>
				<th>ユーザー名</th>
				<th>履歴</th>
				<th>削除</th>
			</tr>
			<?php foreach($table_data as $data): ?>
			<tr>
				<td><?php echo $data['account_tb']['id']; ?></td>
				<td>
					<a href="/shopping/cakephp/user/show_update?update_id=<?php echo $data['account_tb']['id']; ?>">
						<?php echo $data['account_tb']['name'] ?>
					</a>
				</td>
				<td>
					<form action="/shopping/cakephp/user/show_history" method="POST">
						<input type="hidden" name="history_id" value="<?php echo $data['account_tb']['id']; ?>">
						<input type="submit" name="history" value="参照">
					</form>
					
				</td>
				<td>
					<form action="/shopping/cakephp/user/run_delete" method="POST">
						<input type="hidden" name="delete_id" value="<?php echo $data['account_tb']['id']; ?>">
						<input type="hidden" name="delete_name" value="<?php echo $data['account_tb']['name']; ?>">
						<input type="submit" name="delete" value="削除">
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>