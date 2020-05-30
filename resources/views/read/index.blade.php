@extends('layouts.app')

@section('content')

<div class="row mx-1">
<div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div align="center">
            <div align="center"><h3 class="text-orange">Base de conhecimento</h3></div>
                <div class="card card-round card-read over-y-no-x">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($posts as $p)
                            <div class="card card-post card-round col-lg-3 col-md-4 col-sm-12 col-12 mx-1 ">
                            <img class="card-img-top" src="../assets/img/{{$p->img}}">
                            <div class="card-body">
                                <p class="text-orange post-title">{{ $p->title }}</p>
                                <a href="leitura/{{$p->id}}" class="btn btn-primary">Ler</a>
                            </div>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <div align="center">
            <div align="center"><h3 class="text-orange">Filtro</h3></div>
            <div class="col-8 card card-round card-read over-y-no-x">
                <div align="left" class="ml-3 mt-5">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        Desequilíbrio
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        Imediatismo
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        Apatia
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        Renda insuficiente
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        Excesso de autoconfiança
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        Pressão social
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                </div>
                <div align="center"> <button class="btn btn-primary mt-5">Filtrar</button> </div>
                </div>
            </div>
        </div>
</div>



@endsection

@section('scripts')

@endsection