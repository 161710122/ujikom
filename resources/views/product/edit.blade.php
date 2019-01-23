@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">a
              <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Kembali</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
			  <div class="panel-body">
			  	<form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_produk') ? ' has-error' : '' }}">
			  			<label class="control-label">nama_produk</label>	
			  			<input type="text" name="nama_produk" class="form-control" value="{{ $product->nama_produk }}"  required>
			  			@if ($errors->has('nama_produk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_produk') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
			  			<label class="control-label">harga</label>	
			  			<input type="number" name="harga" class="form-control" value="{{ $product->harga }}"  required>
			  			@if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
			  			<label class="control-label">stock</label>	
			  			<input type="number" name="stock" class="form-control" value="{{ $product->stock }}"  required>
			  			@if ($errors->has('stock'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stock') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('id_category') ? ' has-error' : '' }}">
			  			<label class="control-label">category</label>	
			  			<select name="id_category" class="form-control" value="{{ $product->id_category }}">
						<option>---</option>	  
						  @foreach($category as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_category }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_category'))
                            <span class="help-block">
                                <strong>{{ $erors->first('id_category') }}</strong>
                            </span>
                        @endif
			  		</div>
                      
                      <div class="form-group {{ $errors->has('id_brand') ? ' has-error' : '' }}">
			  			<label class="control-label">brand</label>	
			  			<select name="id_brand" class="form-control" value="{{ $product->id_brand }}">
						<option>---</option>	  
						  @foreach($brand as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_brand }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_brand'))
                            <span class="help-block">
                                <strong>{{ $erors->first('id_brand') }}</strong>
                            </span>
                        @endif
			  		</div>
        	  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection