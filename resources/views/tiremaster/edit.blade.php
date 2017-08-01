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
				<div class="col-md-6">
					<div class="form-group">
						<label for="nama">Kode</label>
						{{ Form::text('code', null, ['class'=>'form-control','required'=>'required','id'=>'code','placeholder'=>'Kode']) }}
					</div>
					<div class="form-group">
						<label for="nama">Tipe</label>
						{{ Form::select('type_id', $tiretype,null,['class'=>'form-control']) }}
					</div>
					<div class="form-group">
						<label for="nama">Part Number</label>
						{{ Form::text('partnumber', null, ['class'=>'form-control','required'=>'required','id'=>'partnumber','placeholder'=>'Part Number']) }}
					</div>
					<div class="form-group">
						<label for="nama">Ukuran</label>
						{{ Form::select('size_id', $tiresize,null,['class'=>'form-control']) }}
					</div>
					<div class="form-group">
						<label for="nama">Brand</label>
						{{ Form::text('brand', null, ['class'=>'form-control','required'=>'required','id'=>'brand','placeholder'=>'Nama']) }}
					</div>
				</div>
				<div class="col-md-6">	
					<div class="form-group">
						<label for="nama">Std KM</label>
						{{ Form::number('km', 0, ['class'=>'form-control','required'=>'required','id'=>'km','placeholder'=>'Std KM']) }}
					</div>
					<div class="form-group">
						<label for="nama">Std Harga</label>
						{{ Form::number('price', 0, ['class'=>'form-control','required'=>'required','id'=>'price','placeholder'=>'Std Harga']) }}
					</div>
					<div class="form-group">
						<label for="nama">Std Supplier</label>
						{{ Form::text('supplier', null, ['class'=>'form-control','required'=>'required','id'=>'supplier','placeholder'=>'Std Supplier']) }}
					</div>
				
					<button type="submit" class="btn btn-primary">
	                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan
	                </button>
	                <a class="btn btn-danger" href="{{ url('/tiremaster') }}">
	                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Batal
	                </a>
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