<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$eq->id}}">
	{{Form::Open(array('action'=>array('EquipoController@destroy',$eq->id),'method'=>'delete'))}}
		<div class="model-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Equipo</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea eliminar el Equipo</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	{{Form::Close()}}
</div>