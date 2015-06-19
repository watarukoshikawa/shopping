
<style>
	#login_box{
		width: 500px;
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
</style>

<div id="login_box">
	<form class="login_form" action="run_login" method="POST">
		<div class="text_box">ID:<input type="text" name="login_id" value=""></div>
		<div class="text_box">PASS:<input type="password" name="login_pass" value=""></div>
		<input type="submit" id="login_btn" name="login_btn" value="ログイン">
	</form>
</div>
