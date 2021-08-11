@extends('layout')

@section('cabecalho')
    Add Employee!
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
            <label for="firstName">First Name: </label>
            <input type="text" class="form-control" name="firstName" id="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name: </label>
            <input type="text" class="form-control" name="lastName" id="lastName">
        </div>
        <div class="form-group">
            <label for="company_id">Company: </label>
            <input type="text" class="form-control" name="company_id" id="company_id">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone: </label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <button class="btn btn-primary mt-2">Add!</button>
    </form>
@endsection
