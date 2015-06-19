
<!-- ログアウトボタン -->
<form class="logout_btn_form" action="run_logout" method="POST">
	<input type="submit" name="logout_btn" value="ログアウト">
</form>

<!-- ショップボタン -->
<form class="shop_btn_form" action="shop" method="POST">
	<input type="submit" name="shop_btn" value="ショップに戻る">
</form>

<!-- カートボタン -->
<form class="cart_btn_form" action="cart" method="POST">
	<input type="submit" name="cart_btn" value="カートへ">
</form>

<!-- 商品情報表示 -->
<div>
	<!-- 写真を表示予定 -->
</div>

<table>
	<tr>
		<td>商品名：</td><td><?php echo $item_info['item_tbs']['item_name']; ?></td>
	</tr>
	<tr>
		<td>説明：</td><td><?php echo $item_info['item_tbs']['item_text']; ?></td>
	</tr>
	<tr>
		<td>金額：</td><td><?php echo $item_info['item_tbs']['item_price']; ?></td>
	</tr>
	<tr>
		<td>在庫</td><td><?php echo $item_info['stock_tbs']['item_stock']; ?></td>
	</tr>
</table>

<!-- 戻るボタン -->
<form class="retrun_form" action="shop" method="post">
	<input type="submit" name="return_btn" value="戻る">
</form>

<!-- カートに入れるボタン -->
<form class="add_cart_form" action="add_cart" method="POST">
	<input type="hidden" name="add_cart_name" value="<?php echo $item_info['item_tbs']['item_name']; ?>">
	<input type="hidden" name="add_cart_price" value="<?php echo $item_info['item_tbs']['item_price']; ?>">
	<input type="text" name="add_cart_number" value="">個
	<input type="submit" name="add_cart_btn" value="カートに入れる">
</form>
