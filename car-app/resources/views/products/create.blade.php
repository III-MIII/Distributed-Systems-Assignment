@extends('products.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new Product here</h2>
            </div>
            <div class="pull-right">
                <a href="{{  route('products.index') }}" class="btn btn-primary"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input mate... <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Name...">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" style="height:140px" name="description" class="form-control" placeholder="Description...">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Weight:</strong>
                    <input type="text" name="weight" class="form-control" placeholder="Weight...">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>PS:</strong>
                    <input type="text" name="power_ps" class="form-control" placeholder="122 PS!">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="12345€">
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </div>
    </form>

@endsection 