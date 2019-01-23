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
                <h1 class="m-0 text-dark">Edit Data Product image</h1>
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
                    <form action="{{ route('productimage.update',$product_image->id) }}" method="post" enctype="multipart/form">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('id_product') ? ' has-error' : '' }}">
			  			<label class="control-label">product</label>	
			  			<select name="id_product" class="form-control" value="{{ $product_image->id_product }}">
						<option>---</option>	  
						  @foreach($product as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_product }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_product'))
                            <span class="help-block">
                                <strong>{{ $erors->first('id_product') }}</strong>
                            </span>
                        @endif
			  		</div>
                        <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Foto</label>
                                    @if (isset($product_image) && $product_image->foto)
                                        <p>
                                            <br>
                                        <img src="{{ asset('assets/img/foto/'.$product_image->foto) }}" style="width:250px; height:250px;" alt="">
                                        </p>
                                    @endif
                                    <input name="foto" type="file" value="{{ $product_image->foto }}">
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