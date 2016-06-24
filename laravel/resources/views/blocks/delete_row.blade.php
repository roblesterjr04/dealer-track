<a id="{{$modid}}_del_button" type="submit" class="text-danger pull-right" href="#">Delete</a>
<script>
	$('#{{$modid}}_del_button').click(function(e) {
		e.preventDefault();
		BootstrapDialog.show({
			title: 'Delete from {{$table}}',
			message: 'Are you sure you want to delete this item from {{$table}}?',
			type: BootstrapDialog.TYPE_WARNING,
			buttons: [
				{
					label: 'Cancel',
					action: function(dialog) {
						dialog.close();
					}
				},
				{
					label: 'Delete',
					action: function(dialog) {
						dialog.enableButtons(false);
						$.ajax({
							url: '/{{$table}}/{{$modid}}',
							type: 'POST',
							context: document.body,
							data: {
								_method: 'DELETE',
								_token: '{{csrf_token()}}'
							}
						}).done(function(data) {
							
							$('#{{$table}}_{{$modid}}').fadeOut(function() {
								dialog.close();
							});
						}).fail(function(data) {
							console.log(data);
						})
					},
					cssClass: 'btn-danger'
				}
			]
		});
	});
</script>