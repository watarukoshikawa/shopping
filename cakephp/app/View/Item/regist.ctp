<style type="text/css">
	div#main_area{
		width: 300px;
		margin: 0 auto;
	}
</style>
<div id="main_area">
	<?php if(isset($update_data)): ?>
	<form action="/shopping/cakephp/item/run_update" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="data[item_id]" value="<?php echo $this->request->query['update']; ?>">
	<?php else: ?>
	<form action="/shopping/cakephp/item/run_regist" method="POST" enctype="multipart/form-data">
	<?php endif; ?>
		<p>商品名</p>
		<input type="text" name="data[name]" value="<?php if(isset($update_data)){ echo $update_data['item_tb']['name'];}; ?>">
		<p>商品説明</p>
		<textarea name="data[text]"><?php if(isset($update_data)){ echo $update_data['item_tb']['text'];}; ?></textarea>
		<p>金額</p>
		<input type="text" name="data[price]" value="<?php if(isset($update_data)){ echo $update_data['item_tb']['price'];}; ?>">
		<p>カテゴリー</p>
		<select name="data[category_id]">
			<?php foreach ($select as $selecter): ?>
				<?php if(isset($update_data) && $update_data['item_tb']['category_id'] == $selecter['category_tb']['id']): ?>
					<option value="<?php echo $selecter['category_tb']['id'] ?>" selected><?php echo $selecter['category_tb']['name'] ?></option>
				<?php else: ?>
					<option value="<?php echo $selecter['category_tb']['id'] ?>"><?php echo $selecter['category_tb']['name'] ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
		<?php
		if(isset($update_data)){
			echo "<br>";
			if ($update_data['item_tb']['img'] != "") {
				echo $this->Html->image($update_data['item_tb']['img'],array('width' => '60px', 'height' => "60px"));
				echo "<br>";
				?>
				<input type="hidden" name="img_name" value="<?php echo $update_data['item_tb']['img']; ?>">
				<?php
			}
			echo "変更する場合選択してください";
		}; 
		?>
		<input type="file" name="data[file]" style="width:300px; margin-left: -5px;">
		<input type="submit" value="<?php if(isset($update_data)){ echo '変更';}else{ echo '登録';}; ?>">
	</form>
</div>