Selected country: <strong><?php echo $country->name; ?></strong><br>
Cities in <strong><?php echo $country->name; ?></strong>: <br><br>

<?php foreach ($country->cities as $city) : ?>
	<strong><?= $city->name; ?></strong> <br>
<?php endforeach; ?>
