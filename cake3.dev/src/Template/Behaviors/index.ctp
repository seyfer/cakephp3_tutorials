<table id="clients" class="table table-striped table-bordered white-bg" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Id</th>
		<th>First name</th>
		<th>Last name</th>
		<th>Country</th>
		<th>City</th>
		<th>Credit</th>
	</tr>
	</thead>
	<tbody>
    <?php foreach ($customers as $customer) : ?>
		<tr>
			<td><?= $customer->customerNumber; ?></td>
			<td><?= $customer->contactFirstName; ?></td>
			<td><?= $customer->contactLastName; ?></td>
			<td><?= $customer->country; ?></td>
			<td><?= $customer->city; ?></td>
			<td><?= $customer->creditLimit; ?></td>
		</tr>
    <?php endforeach; ?>
	</tbody>
</table>

<script>
	$(document).ready(function () {
		$('#clients').DataTable({
			'pageLength': 10,
			'columnDefs': [
				{'orderable': false, 'targets': 4}
			]
		});
	});
</script>
