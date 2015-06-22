<style type="text/css">
	div#main_area{
		width: 500px;
		margin: 0 auto;
	}
	.select{
		width: 100px;
	}
	span#sub_text{
		font-size: 30px;
	}
	div#select_area{
		width: 470px;
		margin: auto;
	}
	input[type="text"]{
		font-size: 50%;
	}
	#sum_area{
		width: 100px;
		font-size:100%;
		text-align:right;
		margin-left: 350px;
	}
</style>
<div id="main_area">
	<div id="button_area">
		<form action="/shopping/cakephp/master" method="POST">
			<input type="submit" value="戻る">
		</form>
	</div>
	<div id="table_area">
		<div id="select_area">
			<form action="/shopping/cakephp/history/run_select" method="POST">
				<span>
					<span class="sub_text">From</span>
					<input type="text" name="select_from" class="select" placeholder="<?php echo date('Y-m-d'); ?>">
					<span class="sub_text" style="margin:40px;">~</span>
					<span class="sub_text">To</span>
					<input type="text" name="select_to" class="select" placeholder="<?php echo date('Y-m-d'); ?>">
				</span>
				<input type="submit" value="検索">
			</form>
		</div>
		<div id="show_area">
			<table>
				<tr>
					<th>日付</th>
					<th>商品</th>
					<th>個数</th>
					<th>金額</th>
					<th>ユーザー</th>
				</tr>
				<?php $sum = 0; ?>
				<?php foreach($table_data as $data): ?>
					<?php
						$date = explode(" ", $data['history_tbs']['date']);
					?>
				<tr>
					<th><?php echo $date[0]; ?></th>
					<th><?php echo $data['item_tbs']['name']; ?></th>
					<th><?php echo $data['history_tbs']['number']; ?></th>
					<th><?php echo $data['item_tbs']['price']; ?>円</th>
					<th><?php echo $data['history_tbs']['account_name']; ?></th>
				</tr>
				<?php $sum = $sum + $data['item_tbs']['price']; ?>
				<?php endforeach; ?>
			</table>
			<input id="sum_area" type="text" value="<?php echo $sum; ?>円" readonly>
		</div>
	</div>
</div>
