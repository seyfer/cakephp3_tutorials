<?= $this->Form->create(null, ['url' => '/csrf/submit']) ?>
<?= $this->Form->input('username'); ?>
<?= $this->Form->submit(); ?>

<input type="button"
	   onclick="sendPostRequest('/csrf/submit', 'username=' + $('#username').val())"
	   value="Submit with Ajax">
<?= $this->Form->end(); ?>

<script>
	function sendPostRequest(url, data) {
		$.ajax({
			type: 'POST',
			beforeSend: function (request) {
				var csrf = $.cookie('csrfToken');
				request.setRequestHeader('X-CSRF-Token', csrf);
			},
			url: url,
			data: data
		}).success(function (data) {
			console.log(data);
		});
	}
</script>