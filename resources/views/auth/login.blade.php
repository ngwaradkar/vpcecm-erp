@extends('layouts.login_master')

@section('content')
    <div class="page-content login-cover">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login card -->
                <form class="login-form" method="post" action="{{ route('login') }}" style="width: 100%; max-width: 440px;">
                    @csrf
                    <div class="card mb-0 shadow-lg border-0">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/college_logo.png') }}" alt="Vidya Prabodhini College" class="img-fluid mb-3" style="max-height: 80px; object-fit: contain;">
                                </a>
                                <h5 class="mb-1 font-weight-bold text-dark">Institutional ERP Portal</h5>
                                <span class="d-block text-muted">Sign in with your college credentials</span>
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span class="font-weight-semibold">Oops!</span> {{ implode('<br>', $errors->all()) }}
                            </div>
                            @endif

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" name="identity" value="{{ old('identity') }}" placeholder="Login ID or Email (e.g. cj or admin)" required>
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input required name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled" {{ old('remember') ? 'checked' : '' }} data-fouc>
                                        Remember
                                    </label>
                                </div>

                                <a href="{{ route('password.request') }}" class="ml-auto text-muted">Forgot password?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-bold">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            <div class="text-center text-muted font-size-xs mt-3">
                                Vidya Prabodhini College of Commerce, Education, Computer and Management
                            </div>

                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection
