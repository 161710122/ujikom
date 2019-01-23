@extends('layouts.admin')
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row m-t-30">
            <div class="col-md-12">
                <div class="m-b-10">
                    <a href="{{ route('product.create') }}" >
                        <button type="button" data-toggle="modal"  class="btn btn-outline-danger">
                        <i class="fa fa-pencil-square-o"></i>    
                        Tambah Data
                    </button></a>
                    
                </div>
                <br><br><br>            
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                {!! $html->table(['class'=>'table table-striped']) !!}
                    
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
        
    </div>
</div>

@endsection
@section('scripts')
{!! $html->scripts() !!}
<script type="text/javascript" language="javascript" >
</script>
@endsection
