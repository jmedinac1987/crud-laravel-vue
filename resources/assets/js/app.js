new Vue({

	el:'#crud',
	created: function ()
	{
		this.getKeeps();
	},
	data:
	{
		keeps: [],
		newKeep: '',
		paginate:{
			'total': 0,
			'current_page': 0,
			'per_page'    : 0,
			'last_page'   : 0,
			'from' : 0,
			'to'   : 0
		},
		errors: [],
		fillKeep: {'id': '', 'keep': ''},
		offset: 2

	},
	computed:{
		isActivate: function()
		{
			return this.paginate.current_page;
		},
		pagesNumber: function()
		{
			if (!this.paginate.to) {
				return [];
			} 

			let from = this.paginate.current_page - this.offset;

			if (from < 1 ) {
				from = 1;
			} 

			let to = from + (this.offset * 2);

			if (to >= this.paginate.last_page ) {
				to = this.paginate.last_page;
			} 

			let pagesArray = [];
			
			while (from <= to)
			{
				pagesArray.push(from);
				from++;
			}

			return pagesArray;
		}
	},
	methods:
	{
		getKeeps: function(page)
		{
			let urlKeeps = 'Task?page=' + page;
			axios.get(urlKeeps).then(
				response => {
					this.keeps = response.data.tasks.data;					
					this.paginate = response.data.paginate;					

					console.log(response.data);
				});
		},
		editKeep: function(keep)
		{
			this.fillKeep.id = keep.id;			
			
			this.fillKeep.keep = keep.keep;

			$('#update').modal('show');
		},
		updateKeep: function(id)
		{
			let url = 'Task/' + id;
			axios.put(url,this.fillKeep).then( 
				response => {
					this.getKeeps();					
					this.fillKeep =  {'id': '', 'keep': ''};
					this.errors = [];
					$('#update').modal('hide');
					toastr.success('Tarea actualizada con exito!');
			}).catch(
				error => {
					this.errors = error.response.data
				}
			);
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
		},
		createKeep: function()
		{
			let url = 'Task';
			axios.post(url,{
				keep: this.newKeep
			}).then( 
				response => {
					this.getKeeps();
					this.newKeep = '';
					this.errors = [];
					$('#create').modal('hide');
					toastr.success('Tarea creada con exito!');
			}).catch(
				error => {
					this.errors = error.response.data
				}
			);
		},
		changePage: function(page)
		{
			this.paginate.current_page = page;
			this.getKeeps(page);
		}
	}

});