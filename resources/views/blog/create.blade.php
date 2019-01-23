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
            <h1 class="m-0 text-dark">Tambah blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>			
			  <div class="panel-body">
			  	<form action="{{ route('blog.store') }}" method="post"  enctype="multipart/form-data" >
					  {{ csrf_field() }}
                      
                      <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul</label>	
			  			<input type="text" name="judul" class="form-control"  required>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
			  		</div>

                    
                    <div class="form-group {{ $errors->has('artikel') ? ' has-error' : '' }}">
			  			<label class="control-label">artikel</label>	
			  			<textarea name="artikel" class="form-control" rows="10"  required>
                          @if ($errors->has('artikel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('artikel') }}</strong>
                            </span>
                        @endif
                        </textarea>
			  		</div>
            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">foto</label>
                                <input name="foto" type="file" required>
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