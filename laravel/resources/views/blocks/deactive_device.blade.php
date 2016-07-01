@if ($v->active)
	<a id="{{$modid}}_deact_button" type="submit" class="btn btn-danger pull-right" href="#">Deactivate</a>
@else
	<a id="{{$modid}}_act_button" type="submit" class="btn btn-success pull-right" href="#">Connect</a>
@endif
<script>
	var genInterval;
	$('#{{$modid}}_act_button').click(function(e) {
		e.preventDefault();
		BootstrapDialog.show({
			title: 'Connect Device',
			message: '<div class="row"><div class="col-sm-6 col-sm-offset-3"><img style="max-width: 100%" src="https://chart.googleapis.com/chart?cht=qr&chl={{ $v->activation() }}&chs=500x500&choe=UTF-8&chld=L|2" alt="Activate Device"><h1 class="pair-code">@foreach(str_split($v->pairing_code) as $c)<span>{{ $c }}</span>@endforeach</h1></div></div>',
			onshown: function(dialog) {
				genInterval = setInterval(function() {
					$.ajax({
						url: '/devices/{{$v->id}}/active',
						type: 'POST',
						context: document.body,
						data: {
							crap: 'morecrap'
						}
					}).done(function(data) {
						if (data == 1) {
							dialog.close();
							clearInterval(genInterval);
							window.location.href = "/devices";
						}
					});
				}, 750);
			},
			onhidden: function(dialog) {
				clearInterval(genInterval);
			}
		});
		
	});
	$('#{{$modid}}_deact_button').click(function(e) {
		e.preventDefault();
		BootstrapDialog.show({
			title: 'Deactivate {{ $v->user_name }}',
			message: 'Are you sure you want to deactivate {{$v->user_name}}?',
			type: BootstrapDialog.TYPE_DEFAULT,
			buttons: [
				{
					label: 'Cancel',
					action: function(dialog) {
						dialog.close();
					}
				},
				{
					label: 'Deactivate',
					action: function(dialog) {
						dialog.enableButtons(false);
						$.ajax({
							url: '/{{$table}}/{{$modid}}/unpair',
							type: 'POST',
							context: document.body,
							data: {
								_token: '{{csrf_token()}}'
							}
						}).done(function(data) {
							dialog.close();
							window.location.href= "/devices";
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