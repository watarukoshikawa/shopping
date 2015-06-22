<div id="main_area">
	<?php
		if(isset($msg) && $msg != ""){
			print("<h1>".$msg."</h1>");
		}
	?>

	<div id="button_area">
		<form action="/shopping/cakephp/master" method="POST">
			<input type="submit" value="戻る">
		</form>	
	</div>
	<div id="table_area">
		<form action="/shopping/cakephp/stock/run_regist" method="POST">
			<input type="submit" value="登録" style="margin-right:0;">
			<table>
				<?php foreach ($table_data as $data_count => $data):?>
				<tr>
					<td>
						<?php echo $data['item_tbs']['name']; ?>
						<input type="hidden" name="<?php echo $data_count.'[name]'; ?>" value="<?php echo $data['item_tbs']['name'] ?>">
						<input type="hidden" name="<?php echo $data_count.'[item_id]'; ?>" value="<?php echo $data['item_tbs']['id'] ?>">
					</td>
					<td>
						<span>
							<input type="text" style="width: 45px;" name="<?php echo $data_count.'[number]'; ?>" value="<?php echo $data['stock_tbs']['number'] ?>">個
						</span>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</form>
	</div>
</div>