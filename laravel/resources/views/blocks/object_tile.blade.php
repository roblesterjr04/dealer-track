<a class="btn btn-app" id="app_obj_{{$object->id}}">
	@if (isset($object->permissions) && $object->permissions != 'X')
		<span class="badge bg-yellow">{{ $object->permissions }}</span>
	@else
		<span class="badge"></span>
	@endif
	<i class="fa {{ $object->icon or 'fa-cube' }}"></i> {{$object->name}}
	<div style="display: none" id="app_obj_{{$object->id}}_perms">
		<p>Set the access permissions that {{ $application->name or 'this application' }} will have on {{ $object->name }}.</p>
		<div class="form-group app_obj_{{$object->id}}_perms">
			<label><input type="checkbox" class="flat-red" data-perm="R"> Read</label>
	        <label><input type="checkbox" class="flat-red" data-perm="W"> Write</label>
	        <label><input type="checkbox" class="flat-red" data-perm="M"> Modify</label>
	        <label><input type="checkbox" class="flat-red" data-perm="D"> Delete</label>
	      </div>
	     
	</div>
	<input id="val_app_obj_{{$object->id}}_perms" type="hidden" name="objects[OBJ{{$object->id}}]" value="{{ $object->permissions or 'X' }}">
</a>
<script>
	$('#app_obj_{{$object->id}}').click(function(e) {
		e.preventDefault();
		BootstrapDialog.show({
			title: 'Resource Permissions',
			type: BootstrapDialog.TYPE_SUCCESS,
			message: $($('#app_obj_{{$object->id}}_perms').html()),
			onshown: function(dialog) {
				var str = $('#app_obj_{{$object->id}} span').text();
				for (var i = 0; i < str.length; i++) {
					$('.bootstrap-dialog-message .app_obj_{{$object->id}}_perms input[data-perm="'+str[i]+'"]').prop('checked', true);
				}
			},
			buttons: [
				{
					label: 'Cancel',
					action: function(dialog) {
						dialog.close()
					}
				},
				{
					label: 'Save',
					cssClass: 'btn-success',
					action: function(dialog) {
						var perms = '';
						$('.bootstrap-dialog-message .app_obj_{{$object->id}}_perms input:checked').each(function() {
							perms += $(this).attr('data-perm');
						});
						$('#app_obj_{{$object->id}} span').text(perms).addClass('bg-yellow');
						$('#val_app_obj_{{$object->id}}_perms').val(perms?perms:'X');
						dialog.close();
					}
				}
			]
		});
	});
</script>