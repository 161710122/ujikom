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
            <h1 class="m-0 text-dark">Tambah Product Image</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>			
			  <div class="panel-body">
			  	<form action="{{ route('productimage.store') }}" method="post"  enctype="multipart/form-data" >
					  {{ csrf_field() }}
                      
                      <div class="form-group {{ $errors->has('id_product') ? ' has-error' : '' }}">
			  			<label class="control-label">product</label>	
			  			<select name="id_product" class="form-control">
						  <option>---</option>
							@foreach($product as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_produk }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_product'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_product') }}</strong>
                            </span>
                        @endif
			  		</div> 

					  <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">foto</label>
                                <input type="file" name="foto[]"  accept="image/*" multiple>
                            </div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ url()->previous() }}" >kembali</a>
                    </div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection