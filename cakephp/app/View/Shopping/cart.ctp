
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
		height: 20px;
		width: 50px;
		margin: 10px auto;
	}
	div#total_price_area{
		height: 20px;
		width: 500px;
		font-size: 20px;
		text-align: right;
		padding-top: 15px;
	}
	div#order_area{
		width: 600px;
		margin: 30px auto;
	}
</style>

<script>
	function order_check () {
		if (window.confirm("購入しますか？")) {
			return true;
		}else {
			return false;
		}
	}
</script>

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
	<?php $total_price = 0; ?>
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
	<?php $total_price = $total_price + $in_cart_item['item_price'] * $in_cart_item['number']; ?>
	<?php endforeach; ?>
	<?php endif; ?>
</div>

<div id="order_area">
	<div id="total_price_area" style="float:left">
		<!-- 合計金額表示 -->
		合計：<?php echo $total_price ?>円
	</div>

	<?php if (isset($in_cart)): ?>
	<div id="buy_btn_area" style="float:right">
		<!-- 購入ボタン -->
		<form class="buy_item_form" action="buy_items" method="POST" onsubmit="return order_check()">
			<input type="submit" name="buy_item_btn" value="購入">
		</form>
	</div>
	<?php endif; ?>
</div>
