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
                <h1 class="m-0 text-dark">Edit Data blog</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Kembali</a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
                <div class="panel-body">
                    <form action="{{ route('blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label class="control-label">Judul</label>	
                            <input type="text" name="judul" class="form-control" value="{{ $blog->judul }}"  required>
                            @if ($errors->has('judul'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('artikel') ? ' has-error' : '' }}">
			  			<label class="control-label">Artikel</label>	
			  			<textarea type="text" name="artikel" class="form-control"   required>{{ $blog->artikel }}</textarea>
			  			@if ($errors->has('artikel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('artikel') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Foto</label>
                                    <input name="foto" type="file" value="{{ $blog->foto }}">
                                    @if (isset($blog) && $blog->foto)
                                        <p>
                                            <br>
                                        <img src="{{ asset('assets/img/fotoblog/'.$blog->foto) }}" style="width:250px; height:250px;" alt="">
                                        </p>
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