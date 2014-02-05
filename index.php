<!DOCTYPE html>
<html>
	<head>
		<title>MTV Seeker</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<form action="" method="POST">
			Dla jakiego zakresu chcesz przeszukać witrynę "MTV.com"?<br/>
			<label for="od">Od:</label><input type="text" name="od" value="<?php echo isset($_POST['od']) ? $_POST['od'] : ''; ?>"/>
			<label for="do">Do:</label><input type="text" name="do" value="<?php echo isset($_POST['do']) ? $_POST['do'] : ''; ?>"/>
			<br/>
			<input type="Submit" value="Szukaj"/>
		</form>

		<?php
		if (isset($_POST['od']) && isset($_POST['do'])) {
			$matches = Array();
			$url = 'http://www.mtv.com/videos/?series=2213&seriesId=39254&channelId=1&id=';
			for ($i = (int) $_POST['od']; $i <= (int) $_POST['do']; $i++) {
				$urlContents = file_get_contents($url . $i);
				preg_match("/<title>(.*)<\/title>/i", $urlContents, $matches);
				echo '<a href="' . $url . $i . '" target="_blank">' . $i . '</a> : ' . $matches['1'] . '<br/>';
			}
		}
		?>
	</body>
</html>