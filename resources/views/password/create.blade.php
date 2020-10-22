@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('passwords.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="password-name" class="col-md-4 col-form-label text-md-right">Password Name</label>

                            <div class="col-md-6">
                                <input id="password-name" type="text" class="form-control" name="password_name" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_email" class="col-md-4 col-form-label text-md-right">Account email/user</label>

                            <div class="col-md-6">
                                <input id="password_email" type="text" class="form-control" name="password_email" required autocomplete="new-user">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Create Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
