<form method="POST" @submit.prevent="updateKeep(fillKeep.id)">
	<div class="modal fade" id="update">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
							Editar
					</h5>
					<button type="button" class="close" data-dismiss="modal">						
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label for="keep">Actualizar Tarea: </label>
					<input type="text" name="keep" class="form-control" v-model="fillKeep.keep">
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="enviar" value="Actulaziar">
				</div>
			</div>
		</div>
	</div>
</form>