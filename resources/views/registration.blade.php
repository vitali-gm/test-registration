@extends('layout')

@section('title', 'Registration')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/user-create" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Alex">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="username@gmail.com">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <button type="submit" class="btn btn-outline-dark">Registration</button>

            </form>
        </div>
    </div>
@endsection

