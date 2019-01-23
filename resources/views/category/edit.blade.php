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
                <h1 class="m-0 text-dark">Edit Data category</h1>
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
                    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('nama_category') ? ' has-error' : '' }}">
                            <label class="control-label">Nama category</label>	
                            <input type="text" name="nama_category" class="form-control" value="{{ $category->nama_category }}"  required>
                            @if ($errors->has('nama_category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_category') }}</strong>
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