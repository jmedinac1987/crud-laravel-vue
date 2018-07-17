@extends('app')

@section('content')
	
	<div id="crud" class="row">		
		<div class="col-md-5 mt-5">			
			<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#create">Nuevo</button> 
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Tarea</th>
						<th colspan="2">
							Acciones
						</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="keep in keeps" :key="keep.id">
						<td>@{{ keep.id }}</td>
						<td>@{{ keep.keep }}</td>
						<td width="200px">
							<button class="btn btn-warning btn-sm"  @click.prevent="editKeep(keep)">Editar</button>
							<button class="btn btn-danger btn-sm" @click.prevent="deleteKeep(keep.id)">Eliminar</button>
						</td>						
					</tr>
				</tbody>
			</table>
			<nav>
				<ul class="pagination">
					<li class="page-item" v-if="paginate.current_page > 1">
						<a href="#" class="page-link" @click.prevent="changePage(paginate.current_page - 1)">
							<span>Atras</span>
						</a>
					</li>

					<li v-for="page in pagesNumber" :key="page" :class="[ page == isActivate ? 'active' : '']" class="page-item">
						<a href="#" class="page-link" @click.prevent="changePage(page)">
							@{{ page }}
						</a>
					</li>

					<li class="page-item" v-if="paginate.current_page < paginate.last_page">
						<a href="#" class="page-link" @click.prevent="changePage(paginate.current_page + 1)">
							<span>Siguiente</span>
						</a>
					</li>
				</ul>
			</nav>

		</div>
		
		
		@include('create')
		@include('edit')

		<div class="col-md-7 mt-5">
			<pre class="card">
				@{{ $data }}
			</pre>
		</div>
	</div>

@endsection
