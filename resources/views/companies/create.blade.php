@extends('layout')

@section('cabecalho')
    Add Company!
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="website">Website: </label>
            <input type="text" class="form-control" name="website" id="website">
        </div>
        <button class="btn btn-primary mt-2">Add!</button>
    </form>
@endsection
