@extends('layout')

@section('title', 'Registration')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-12">
            <h3>Registration</h3>
            <form action="/user-create" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Alex">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="username@gmail.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <button type="submit" class="btn btn-outline-dark">Submit</button>

            </form>
        </div>
    </div>
@endsection

