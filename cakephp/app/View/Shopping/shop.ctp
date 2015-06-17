
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
	<input type="radio" name="stock_yes" value="あり">
	<input type="radio" name="stock_all" value="全て" checked="checked">
	<input type="submit" name="search_shop_btn" value="検索">
</form>

<!-- 商品一覧表示 -->
