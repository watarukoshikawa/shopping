<style type="text/css">
	div#main_area{
		width: 300px;
		margin: 0 auto;
	}
</style>
<div id="main_area">
	<?php if(isset($update_data)): ?>
	<form action="/shopping/cakephp/item/run_update" method="POST">
	<?php else: ?>
	<form action="/shopping/cakephp/item/run_regist" method="POST" enctype=" multipart/form-data">
	<?php endif; ?>
		<p>商品名</p>
		<input type="text" name="name" value="<?php if(isset($update_data)){ echo $update_data['item_tb']['name'];}; ?>">
		<p>商品説明</p>
		<textarea name="text"><?php if(isset($update_data)){ echo $update_data['item_tb']['text'];}; ?></textarea>
		<p>金額</p>
		<input type="text" name="price" value="<?php if(isset($update_data)){ echo $update_data['item_tb']['price'];}; ?>">
		<p>カテゴリー</p>
		<select name="category_id">
			<?php foreach ($select as $selecter): ?>
				<?php if(isset($update_data) && $update_data['item_tb']['category_id'] == $selecter['category_tb']['id']): ?>
					<option value="<?php echo $selecter['category_tb']['id'] ?>" selected><?php echo $selecter['category_tb']['name'] ?></option>
				<?php else: ?>
					<option value="<?php echo $selecter['category_tb']['id'] ?>"><?php echo $selecter['category_tb']['name'] ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
		<input type="file" name="img" style="width:300px; margin-left: -5px;">
		<input type="submit" value="<?php if(isset($update_data)){ echo '変更';}else{ echo '登録';}; ?>">
	</form>
</div>