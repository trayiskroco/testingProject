@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Master Ban
@endsection

@section('main-content')
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Tambah Master Ban</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(array('url'=>url('tiremaster'),'method'=>'POST')) !!}
			{{ csrf_field() }}
				<div class="col-md-6">
					<div class="form-group">
						<label for="nama">Nama</label>
						{{ Form::text('name', null, ['class'=>'form-control','required'=>'required','id'=>'name','placeholder'=>'Nama']) }}
					</div>
				
					<button type="submit" class="btn btn-primary">
	                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan
	                </button>
	                <a class="btn btn-danger" href="{{ url('/tiremaster') }}">
	                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Batal
	                </a>
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>

@endsection
