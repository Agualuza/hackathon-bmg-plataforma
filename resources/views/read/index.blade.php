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
                <form id="form-filter" method="post" action="/leitura">
                @csrf
                <input type="hidden" name="filter" value="1"/>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" <?php echo ($filters && array_key_exists(1,$filters) && $filters[1]) ? 'checked' : '' ?> type="checkbox" name="filter1" value="1">
                        Desequilíbrio
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" <?php echo ($filters && array_key_exists(2,$filters) && $filters[2]) ? 'checked' : '' ?> type="checkbox" name="filter2" value="1">
                        Imediatismo
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" <?php echo ($filters && array_key_exists(3,$filters) && $filters[3]) ? 'checked' : '' ?> type="checkbox" name="filter3" value="1">
                        Apatia
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" <?php echo ($filters && array_key_exists(4,$filters) && $filters[4]) ? 'checked' : '' ?> type="checkbox" name="filter4" value="1">
                        Renda insuficiente
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" <?php echo ($filters && array_key_exists(5,$filters) && $filters[5]) ? 'checked' : '' ?> type="checkbox" name="filter5" value="1">
                        Excesso de autoconfiança
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" <?php echo ($filters && array_key_exists(6,$filters) && $filters[6]) ? 'checked' : '' ?> type="checkbox" name="filter6" value="1">
                        Pressão social
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                </div>
                <div align="center"> <button onclick="submitForm()" class="btn btn-primary mt-5">Filtrar</button> </div>
                </form>
                <div align="center"><a href="leitura"><button class="btn btn-warning mt-2">Limpar filtro</button></a></div>
                </div>
            </div>
        </div>
</div>



@endsection

@section('scripts')
<script>
const submitForm = () => {
    $("#form-filter").submit();
}
</script>
@endsection