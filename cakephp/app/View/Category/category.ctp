<style type="text/css">
	div#main_area{
		width: 400px ;
		margin: 0 auto; 
	}
</style>

<div id="main_area">
	<div id="form_area">
		<form action="/shopping/cakephp/category/run_regist" method="POST">
			<p>カテゴリー名:</p>
			<input type="text" name="category_name">
			<input type="submit" name="category_regist" value="登録">
		</form>
	</div>
	<div id="table_area">
		<table>
			<tr>
				<th>カテゴリー名</th>
				<th>削除</th>
			</tr>
			<?php foreach ($table_data as $data): ?>
			<tr>
				<td><?php echo $data['category_tb']['name'] ?></td>
				<td>
					<form action="/shopping/cakephp/category/run_delete" method="POST">
						<input type="hidden" name="delete_id" value="<?php echo $data['category_tb']['id'] ?>">
						<input type="submit" value="削除">
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>