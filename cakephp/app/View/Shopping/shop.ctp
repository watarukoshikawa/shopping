
<style>
	div#header_btn{
		width: 1000px;
		margin: 20px auto;
	}
	div#table_area{
		width: 1000px;
		margin: 20px auto;
	}
	div#search_area{
		width: 500px;
		margin: 100px auto 50px;
	}
	div#msg_box{
		text-align: center;

	}
	div#msg_box{
		text-align: center;
		font-size: 16px;
		color: #0000ff;
	}
	table#search_table{
		border-collapse: collapse;
		border: solid;
	}
	table#search_table td{
		border-bottom: solid;
		font-size: 15px;
	}
</style>

<div id="msg_box">
	<?php
		echo isset($msg)? $msg : '';
	?>
</div>

<div id="header_btn">
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
<div id="search_area">
	<form class="search_shop_form" action="search_shop" method="POST">
		<table id="search_table">
			<tr>
				<td>カテゴリ：</td>
				<td colspan="2">
					<select name="category_select">
						<option value="all">全て</option>
						<?php foreach ($categories as $category): ?>
							<option value="<?php echo $category['category_tbs']['name']; ?>">
								<?php echo $category['category_tbs']['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>在庫：</td>
				<td><input type="radio" name="stock" value="yes">あり</td>
				<td><input type="radio" name="stock" value="all" checked="checked">全て</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center"><input type="submit" name="search_shop_btn" value="検索"></td>
			</tr>
		</table>
	</form>
</div>

<!-- 商品一覧表示 -->
<div id="table_area">
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
</div>
