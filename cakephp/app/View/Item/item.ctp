<style type="text/css">
	div#main_area{
		width: 500px;
		margin: 0 auto;
	}

	div#regist_area{
		float: left;
	}

	div#return_area{
		float: right;
		margin-right: -15px;
	}
</style>

<div id="main_area">
	<div id="msg_area">
		<?php if(isset($msg) && $msg != ""): ?>		
			<h1><?php echo $msg ?></h1>
		<?php endif; ?>
	</div>
	<div id="button_area">
		<div id="regist_area">
			<form action="/shopping/cakephp/item/show_regist" method="POST">
				<input type="submit" value="新規登録">
			</form>
		</div>
		<div id="return_area">
			<form action="/shopping/cakephp/master" method="POST">
				<input type="submit" value="戻る">
			</form>
		</div>
	</div>
	<div id="table_area">
		<table>
			<tr>
				<th>画像</th>
				<th>名前</th>
				<th>削除</th>
			</tr>
			<?php foreach($table_data as $data): ?>
			<tr>
				<td>画像</td>
				<td><a href="/shopping/cakephp/item/update?update=<?php echo $data['item_tb']['id'] ?>"><?php echo $data['item_tb']['name'] ?></a></td>
				<td>
					<form action="/shopping/cakephp/item/run_delete" method="POST">
						<input type="hidden" name="delete_name" value="<?php echo $data['item_tb']['name'] ?>">
						<input type="hidden" name="delete_id" value="<?php echo $data['item_tb']['id'] ?>">
						<input type="submit" neme="delete" value="削除">
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>