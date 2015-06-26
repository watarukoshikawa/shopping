
<style>
	div#login_box{
		width: 300px;
		margin: auto;
	}
	.login_form{
		width: 300px;
	}
	.text_box{
		width: 250px;
		margin: auto;
	}
	#login_btn{
		margin: 0px 25px;
	}
	div#msg_box{
		text-align: center;
		font-size: 16px;
		color: #ff0000;
	}
</style>
<script>
	function check(){
		if (document.login_form.login_id.value == "") {
			alert("IDが未入力です");
			return false;
		}
		if (document.login_form.login_pass.value == "") {
			alert("PASSが未入力です");
			return false;
		}
	}
</script>

<div id="msg_box">
	<?php
		echo isset($msg)? $msg : '';
	?>
</div>
<div id="login_box">
	<form name="login_form" action="run_login" method="POST" onsubmit="return check()">
		<div class="text_box">ID:<input type="text" name="login_id" value=""></div>
		<div class="text_box">PASS:<input type="password" name="login_pass" value=""></div>
		<input type="submit" id="login_btn" name="login_btn" value="ログイン">
	</form>
</div>
