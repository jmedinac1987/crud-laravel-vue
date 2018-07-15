new Vue({

	el:'#crud',
	created: function ()
	{
		this.getKeeps();
	},
	data:
	{
		keeps: []
	},
	methods:
	{
		getKeeps: function()
		{
			let urlKeeps = 'Task';
			axios.get(urlKeeps).then(
				response => {
					this.keeps = response.data
				});
		},
		deleteKeep: function(id)
		{
			if(confirm("Desea eliminar la tarea?"))
			{
				let urlKeeps = 'Task/'+id;
				axios.delete(urlKeeps).then(
					response => {
					this.getKeeps();
					toastr.success('Tarea eliminada correctamente!');
				});
			}
		}
	}

});