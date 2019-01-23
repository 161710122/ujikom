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
            <h1 class="m-0 text-dark">Tambah brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>			
			  <div class="panel-body">
			  	<form action="{{ route('brand.store') }}" method="post"  enctype="multipart/form-data" >
					  {{ csrf_field() }}
                      
                      <div class="form-group {{ $errors->has('nama_brand') ? ' has-error' : '' }}">
			  			<label class="control-label">nama brand</label>	
			  			<input type="text" name="nama_brand" class="form-control"  required>
			  			@if ($errors->has('nama_brand'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_brand') }}</strong>
                            </span>
                        @endif
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