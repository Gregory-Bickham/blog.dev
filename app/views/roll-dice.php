<!DOCTYPE html>
<html lang="en">
<head>
    <title>Roll dice</title>
</head>
<body>
    <h1>Your guess is <?= $guess ?>, the roll was <?= $random ?></h1>
    <?php if ($random == $guess):  ?>
		<h1> You guessed right</h1>
	<?php endif; ?>

</body>
</html>