
<style>
	div#header_btn{
		width: 600px;
		margin: 20px auto;
	}
	div#in_cart_area{
		width: 600px;
		margin: 100px auto 20px;
	}
	div#buy_btn_area{
		width: 50px;
		margin: 10px auto;
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
	<div style="float:right;font-size:20px;">
		カート
	</div>
</div>

<div id="in_cart_area">
	<!-- カートの中身一覧表示 -->
	<?php if (isset($in_cart)): ?>
	<?php foreach ($in_cart as $session_id => $in_cart_item): ?>
	<table>
		<tr>
			<td>商品名：</td><td><?php echo $in_cart_item['item_name']; ?></td>
		</tr>
		<tr>
			<td>金額：</td><td><?php echo $in_cart_item['item_price']; ?></td>
		</tr>
		<tr>
			<td>個数：</td><td><?php echo $in_cart_item['number']; ?></td>
		</tr>
		<tr>
			<td colspan="2">
				<form class="delete_cart_form" action="delete_cart" method="POST">
					<input type="hidden" name="delete_item" value="<?php echo $session_id; ?>">
					<input type="submit" name="delete_cart_btn" value="削除">
				</form>
			</td>
		</tr>
	</table>
	<?php endforeach; ?>
	<?php endif; ?>
</div>

<div id="buy_btn_area">
	<!-- 購入ボタン -->
	<form class="buy_item_form" action="buy_items" method="POST">
		<input type="submit" name="buy_item_btn" value="購入">
	</form>
</div>
