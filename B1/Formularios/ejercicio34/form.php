<form action="" method="post">

Introduce un numero:
<input type="text" name="num" value="<?php if (isset($_POST['num'])) //value --> para q escriba el valor introducido
												echo $_POST['num']?>" />

<!-- OTRA FORMA  <input type="text" name="num" value="<?=isset($_POST['num']) ? $_POST['num']: ''?>" /> -->

<br>

<input type="submit" value="Enviar" />
</form>