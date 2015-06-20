
<div id="header_box">
	<!-- ログアウトボタン -->
	<div style="float:left">
		<form class="logout_btn_form" action="run_logout" method="POST">
			<input type="submit" name="logout_btn" value="ログアウト">
		</form>
	</div>
	<!-- カートボタン -->
	<div style="float:right">
		<form class="cart_btn_form" action="cart" method="POST">
			<input type="submit" name="cart_btn" value="カートへ">
		</form>
	</div>
</div>

<!-- 検索フォーム -->
<form class="search_shop_form" action="search_shop" method="POST">
	<div>
		カテゴリ：
		<select name="category_select">
			<option value="all">全て</option>
			<?php foreach ($categories as $category): ?>
				<option value="<?php echo $category['category_tbs']['name']; ?>">
					<?php echo $category['category_tbs']['name']; ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>
	<div>
		在庫：
			<div><input type="radio" name="stock" value="yes">あり</div>
			<div><input type="radio" name="stock" value="all" checked="checked">全て</div>
	</div>
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
