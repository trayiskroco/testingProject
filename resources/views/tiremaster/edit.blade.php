@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Tipe Band
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
			<h3 class="panel-title">Edit Tipe Ban : {{$tiremaster->code}}</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(array('url'=>url('tiremaster/'.$tiremaster->id),'method'=>'POST')) !!}
			{{ csrf_field() }}
			{{ method_field('PUT') }}
				<div class="form-group">
					<label for="nama">Nama</label>
					{{ Form::text('name', $tiremaster->name, ['class'=>'form-control','id'=>'name','placeholder'=>'Nama']) }}
				</div>
				<button type="submit" class="btn btn-primary">
	                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan
	            </button>
	            <a class="btn btn-danger" href="{{ url('/tiremaster') }}">
	                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Batal
	            </a>
			{!! Form::close() !!}
		</div>
	</div>

@endsection