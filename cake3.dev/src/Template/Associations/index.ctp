<table id="clients" class="table table-striped table-bordered white-bg" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Id</th>
		<th>Country</th>
		<th>View cities</th>
	</tr>
	</thead>
	<tbody>
    <?php foreach ($countries as $country) : ?>
		<tr>
			<td><?= $country->id; ?></td>
			<td><?= $country->name; ?></td>
			<td><a href="/associations/view/<?= $country->id; ?>">view</a></td>
		</tr>
    <?php endforeach; ?>
	</tbody>
</table>
