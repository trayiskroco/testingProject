@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Master Valas
@endsection

@section('main-content')

	<div class="flash-message">
		@foreach (['danger','warning','success','info'] as $pesan)
			@if(Session::has('alert-'.$pesan))
	        <p class="alert alert-{{ $pesan }}">
	        	{{Session::get('alert-'.$pesan)}}
	        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        	@endif
    	@endforeach
	</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">Daftar Master Valas</h2>
			</div>
			<div class="panel-body">
				<a href="{{ url('tiretype/create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah Data</a>

				<table class="table table-bordered">
					<thead>
						<tr>
							<td>No</td>
							<td>Nama</td>
							<td>Proses</td>
						</tr>
					</thead>
					<tbody>
						@foreach ($tiretype as $tiretype)
						<tr>
							<td>{{ $tiretype->code }}</td>
							<td>{{ $currency->name }}</td>
							<td>
								{!! Form::open(array('url'=>url('tiretype/'.$tiretype->id))) !!}
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<a href="{{url('tiretype/'.$tiretype->id.'/edit')}}" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah</a>
									<button class="btn btn-danger" onClick="var x = confirm('Hapus ?');if(x){return true;}else{return false;}">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>


@endsection

