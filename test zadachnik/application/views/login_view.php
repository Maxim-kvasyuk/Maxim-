<h2>Страница авторизации</h2>
<div class="login">
<div class="authlogin">
<form class="loginob" name="loginob" action="" method="post">
		<div class="loginp">
<p class="loginl">Логин</p><input type="text" name="login">
</div>
<div class="loginv">
<p class="pass">Пароль</p><input class="passin" type="password" name="password">
</div>
<div class="admsubmit">
<input type="submit" value="Войти" name="btn" class="logsubmit">
</div>
</form>
</div>
<?php extract($data); ?>
<?php if($login_status=="access_granted") { ?>
<p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif($login_status=="access_denied") { ?>
<p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } ?>
</div>
