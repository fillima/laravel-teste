@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="row g-3" action="{{route('cadastrar.form')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')}}"></input>
                <div class="col-md-12">
                    <label for="floatingInput">Nova rota</label>
                    <input type="url" class="form-control" id="floatingInput" name="url" placeholder="http://www.minharota.com.br" required>
                    <br>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection