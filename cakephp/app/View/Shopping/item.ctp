
<style>
	div#header_btn{
		width: 600px;
		margin: 20px auto;
	}
	div#image_box{
		width: 500px;
		margin: 100px auto 20px;
	}
	div#table_area{
		width: 600px;
		margin: 20px auto;
	}
	div#add_cart_area{
		width: 600px;
		margin: 0px auto;
	}
</style>


<div id="header_btn">
	<div style="float:left;">
		<!-- ログアウトボタン -->
		<form class="logout_btn_form" action="run_logout" method="POST">
			<input type="submit" name="logout_btn" value="ログアウト">
		</form>
	</div>
	<div style="float:left; padding-left:140px;">
		<!-- ショップボタン -->
		<form class="shop_btn_form" action="shop" method="POST">
			<input type="submit" name="shop_btn" value="ショップに戻る">
		</form>
	</div>
	<div style="float:right;">
		<!-- カートボタン -->
		<form class="cart_btn_form" action="cart" method="POST">
			<input type="submit" name="cart_btn" value="カートへ">
		</form>
	</div>
</div>

<!-- 商品情報表示 -->
<div id="image_box">
	<?php
		if ($item_info['item_tbs']['item_img'] != "") {
			echo $this->Html->image($item_info['item_tbs']['item_img'], array('width' => '500px', 'height' => '400px'));
		}
	?>
</div>

<div id="table_area">
	<table>
		<tr>
			<td>商品名：</td><td><?php echo $item_info['item_tbs']['item_name']; ?></td>
		</tr>
		<tr>
			<td>説明：</td><td><?php echo $item_info['item_tbs']['item_text']; ?></td>
		</tr>
		<tr>
			<td>金額：</td><td>￥<?php echo $item_info['item_tbs']['item_price']; ?></td>
		</tr>
		<tr>
			<td>在庫：</td><td><?php echo $item_info['stock_tbs']['item_stock']; ?>個</td>
		</tr>
	</table>
</div>

<div id="add_cart_area">
	<!-- カートに入れるボタン -->
	<form class="add_cart_form" action="add_cart" method="POST">
		<input type="hidden" name="add_cart_id" value="<?php echo $item_info['item_tbs']['item_id']; ?>">
		<input type="hidden" name="add_cart_name" value="<?php echo $item_info['item_tbs']['item_name']; ?>">
		<input type="hidden" name="add_cart_price" value="<?php echo $item_info['item_tbs']['item_price']; ?>">
		<input type="hidden" name="add_cart_img" value="<?php echo $item_info['item_tbs']['item_img']; ?>">
			<select name="add_cart_number">
				<option>0</option>
				<?php for ($i=0; $i < $item_info['stock_tbs']['item_stock']; $i++) {
					$number = $i + 1;
					echo '<option>'.$number.'</option>';
				} ?>
			</select>個
		<input type="submit" name="add_cart_btn" value="カートに入れる">
	</form>
</div>
