
<!-- ログアウトボタン -->
<form class="logout_btn_form" action="run_logout" method="POST">
	<input type="submit" name="logout_btn" value="ログアウト">
</form>

<!-- ショップボタン -->
<form class="shop_btn_form" action="shop" method="POST">
	<input type="submit" name="shop_btn" value="ショップに戻る">
</form>

<!-- カートの中身一覧表示 -->
<?php foreach ($in_cart as $session_id => $in_cart_item): ?>
<div>
	<div>
		商品名： <?php echo $in_cart_item['item_name']; ?>
	</div>
	<div>
		金額： <?php echo $in_cart_item['item_price']; ?>
	</div>
	<div>
		個数： <?php echo $in_cart_item['number']; ?>
	</div>
</div>
<form class="delete_cart_form" action="delete_cart" method="POST">
	<input type="hidden" name="delete_item" value="<?php echo $session_id; ?>">
	<input type="submit" name="delete_cart_btn" value="削除">
</form>
<?php endforeach; ?>


<!-- 戻るボタン -->
<form class="retrun_form" action="item" method="post">
	<input type="submit" name="return_btn" value="戻る">
</form>

<!-- 購入ボタン -->
<form class="buy_item_form" action="buy_items" method="POST">
	<input type="submit" name="buy_item_btn" value="購入">
</form>
