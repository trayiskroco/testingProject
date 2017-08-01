@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Master Valas
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
			<h3 class="panel-title">Edit Master Valas : {{$currency->code}}</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(array('url'=>url('currency/'.$currency->id),'method'=>'POST')) !!}
			{{ csrf_field() }}
			{{ method_field('PUT') }}
				<div class="form-group">
					<label for="id">Kode</label>
					{{ Form::text('code', $currency->code, ['class'=>'form-control','required'=>'required','id'=>'code','placeholder'=>'Kode']) }}
				</div>
				<div class="form-group">
					<label for="nama">Nama</label>
					{{ Form::text('name', $currency->name, ['class'=>'form-control','id'=>'name','placeholder'=>'Nama']) }}
				</div>
				<div class="form-group">
					<label for="nama">Formula</label>
					{{ Form::select('pattern', array('*' => 'USD x Kurs Internasional', '/' => 'USD / Kurs Internasional'),$currency->pattern,['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					<label for="nama">Selisih Jual-Beli</label>
					{{ Form::number('diff', $currency->diff, ['class'=>'form-control','id'=>'diff','placeholder'=>'Selisih Jual-Beli']) }}
				</div>
				<button type="submit" class="btn btn-primary">
	                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan
	            </button>
	            <a class="btn btn-danger" href="{{ url('/currency') }}">
	                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Batal
	            </a>
			{!! Form::close() !!}
		</div>
	</div>

@endsection