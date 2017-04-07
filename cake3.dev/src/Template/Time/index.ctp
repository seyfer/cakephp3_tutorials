<table id="clients" class="table table-striped table-bordered white-bg" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Id</th>
		<th>Type</th>
		<th>Message</th>
		<th>Created</th>
	</tr>
	</thead>
	<tbody>
    <?php foreach ($logs as $log) : ?>
		<tr>
			<td><?= $log->id; ?></td>
			<td><?= $log->type; ?></td>
			<td><?= substr($log->message, 0, 200) . "..."; ?></td>
			<td><?= $this->Time->format($log->created, 'yyyy-MM-dd HH:mm:ss'); ?></td>
		</tr>
    <?php endforeach; ?>
	</tbody>
</table>
