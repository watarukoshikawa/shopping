
<!-- ログアウトボタン -->
<form class="logout_btn_form" action="run_logout" method="POST">
	<input type="submit" name="logout_btn" value="ログアウト">
</form>

<!-- カートボタン -->
<form class="cart_btn_form" action="cart" method="POST">
	<input type="submit" name="cart_btn" value="カートへ">
</form>

<!-- 検索フォーム -->
<form class="search_shop_form" action="search_shop" method="POST">
	カテゴリ：
	<select name="category_select">
		<option value="all">全て</option>
	</select>
	在庫：
	あり<input type="radio" name="stock_yes">
	全て<input type="radio" name="stock_all" checked="checked">
	<input type="submit" name="search_shop_btn" value="検索">
</form>

<!-- 商品一覧表示 -->
<table>
	<tr>
		<th>写真</th><th>カテゴリ名</th><th>商品名</th>
	</tr>
	<?php foreach($items as $item): ?>
	<tr>
		<td>
			<!-- 写真表示予定 -->
		</td>
		<td>
			<?php echo $item['category_tbs']['category_name'];?>
		</td>
		<td>
			<a href="item?item=<?php echo $item['item_tbs']['item_id']; ?>">
				<?php echo $item['item_tbs']['item_name']; ?>
			</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
