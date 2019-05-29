<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/opener.js"></script>
    <title></title>
  </head>
    <body>
	<div class="face">
		<h3>选择头像</h3>
		<dl>
			<?php foreach(range(1, 9) as $num) { ?>
			<dd><img src="face/face0<?php echo $num?>.jpg" alt="face/face0<?php echo $num?>.jpg" title="头像<?php echo $num?>"></dd>
			<?php } ?>
		</dl>
		<dl>
			<?php foreach(range(10, 20) as $num) { ?>
			<dd><img src="face/face<?php echo $num?>.jpg" alt="face/face<?php echo $num?>.jpg" title="头像<?php echo $num?>"></dd>
			<?php } ?>
		</dl>
	</div>
</body>
</html>
