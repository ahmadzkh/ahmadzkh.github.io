@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('container')
<link rel="stylesheet" href="{{asset ('/assets/css/page/account.css')}}">
@if (session('success'))
<script>
    alert( "{{session('success')}} '{{auth()->user()->nama}}' Role as '{{auth()->user()->levels}}'" )

</script>
@endif
<section class="page-section">
    <div class="container">
        @auth
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="font-weight-bold m-sm-0">Setting Account</h2>
                </div>
                <div class="card-body px-5">
                    <form action="/account/{{$user->id}}/update" method="POST">
                        {{csrf_field()}}
                        <div class="row mb-sm-3">
                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleFormControlInput1" value="{{$user['nama']}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput2">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput2" value="{{$user['email']}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput3">Last Password</label>
                                <input type="text" name="oldpassword" class="form-control" id="exampleFormControlInput3" value="{{$user['password']}}" disabled>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput4">Check Last Password</label>
                                <input type="password" name="checkpassword" class="form-control" id="exampleFormControlInput4">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput4">New Password</label>
                                <input type="password" name="newpassword" class="form-control" id="exampleFormControlInput4">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput4">Confirm New Password</label>
                                <input type="password" name="confirmnewpassword" class="form-control" id="exampleFormControlInput4">
                            </div>
                            @if(session('failed'))
                            <div class="alert alert-danger col-sm" role="alert">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <a href="" class="text-decoration-none">&times;</a>
                                    </button>
                                </div>
                                {{session('failed')}}
                            </div>
                            @endif
                            @if(session('success'))
                            <div class="alert alert-success col-sm" role="alert">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <a href="" class="text-decoration-none">&times;</a>
                                    </button>
                                </div>
                                {{session('success')}}
                            </div>
                            @endif
                        </div>
                        <!-- <pre class="text-center text-danger mb-sm-3">Can't Change your password here</pre> -->
                        <button type="submit" class="btn btn-success float-right" name="submit" onclick="return confirm('Are you sure you want to change this data? This is an action that will make you log in again with the account that you updated, please be careful ')">Update</button>
                        <a href="{{ route('back') }}" class="btn btn-secondary float-right mr-sm-2" name="submit">Back</a>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</section>

@endsection
