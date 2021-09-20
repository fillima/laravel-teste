@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('cadastrar.home') }}"><button class="btn btn-dark" type="button">Adicionar nova rota</button></a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="col">                    
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        {{ __('Rotas salvas') }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-dark" id="update-urls">Atualizar
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-urls">
                        <tr>
                            <td>Url</td>
                            <td>Status</td>
                            <td>Resposta</td>
                        </tr>
                        @foreach($urls as $url)
                        <tr>
                            <td>{{$url->url}}</td>
                            <td>{{$url->status}}</td>
                            <td>{{$url->body_request}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#update-urls").click(function() {
        var id = $("#update-urls").val();
            html_option = "<tr><td>Url</td><td>Status</td><td>Resposta</td></tr>";

        console.log(id);

        $.ajax({
            "type": "GET",
            "data": "",
            "url": "{{route('url.update', ['id' => session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')])}}",
            "success": function (data) {
                data.forEach(function(value, id) {
                    html_option += "<tr><td>"+value.url+"</td><td>"+value.status+"</td><td>"+value.body_request+"</td></tr>"
                });

                $(".table-urls").html(html_option);
            }                
        });
    }) 
</script>
@endsection