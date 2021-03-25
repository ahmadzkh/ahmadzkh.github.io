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
                    <form action="/client/{{$user->id}}/update" method="POST">
                        {{csrf_field()}}
                        <div class="row mb-sm-3">
                            <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                                    value="{{$user['nama']}}" aria-autocomplete="">
                            </div>
                                <div class="form-group col-sm-6">
                                <label for="exampleFormControlInput5">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleFormControlInput5"
                                    value="{{$user['email']}}" aria-autocomplete="">
                            </div>
                        </div>
                        <pre class="text-center text-danger mb-sm-3">Can't Change your password here</pre>
                        <button type="submit" class="btn btn-success float-right" name="submit"
                            onclick="return confirm('Are you sure is the data correct ?')">Update</button>
                        <a href=" {{ route('back') }}" class="btn btn-secondary float-right mr-sm-2" name="submit">Back</a>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</section>

@endsection
