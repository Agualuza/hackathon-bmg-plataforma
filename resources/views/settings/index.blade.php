@extends('layouts.app')

@section('content')

<div align="center" class="mx-1">
    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card style-card card-round card-account mx-1">
        <div class="card-block">
            <h4 align="center" class="card-title text-orange">Configurações</h4>
            <h6 align="center" class="card-title text-orange">Deseja ter uma experiência completa através do whatsapp?</h6>
            <div align="center" class="custom-control custom-switch">
                <input type="checkbox" <?php echo $user->send_wpp ? 'checked' : '' ?> class="custom-control-input" id="customSwitches">
                <label class="custom-control-label" for="customSwitches"></label>
            </div>
            <h6 align="center" class="card-title text-orange mt-4">Plano<span>*<span></h6>
            <div align="center" class="form-check form-check-radio">
                <label class="form-check-label mx-1">
                    <input style="opacity:100%" class="form-check-input" disabled type="radio" name="planRadio" id="bradio" value="B" >
                    <span class="text-orange">Plano Básico</span>
                </label>
                <label class="form-check-label mx-1">
                    <input style="opacity:100%" class="form-check-input" checked type="radio" name="planRadio" id="fradio" value="F" >
                    <span class="text-orange">Plano Flex</span>
                </label>
                <label class="form-check-label mx-1">
                    <input style="opacity:100%" class="form-check-input" disabled type="radio" name="planRadio" id="tradio" value="T" >
                    <span class="text-orange">Plano Top</span>
                </label>
                <h5 align="center" class="card-title text-orange text-aux"><span>*</span>Para alterar seu plano entre em contato com o nosso suporte.</h5>
                <h5 align="center" class="card-title text-aux text-blue"><a href="#">Saiba as vantagens de ser Top</a></h5>
            </div>

            <div align="center"> <button onclick="save()" class="btn btn-primary mt-5">Salvar</button> </div>
        </div>
    </div>
   
</div>



@endsection

@section('scripts')
<script>

const save = () => {
    var send_wpp = 0;
    if($("#customSwitches").is(":checked")) {
        send_wpp = 1;
    }
    var url = "configuracao/save";
    $.ajax({
            method: "POST",
            url: url,
            data: { "_token" : $('meta[name="csrf-token"]').attr('content'), uid : <?php echo $user->id ?> , send_wpp : send_wpp }
        }).done( () => {
          $(".bootoast.alert").remove();
          bootoast.toast({
            message: 'Salvo com sucesso',
            type: 'warning',
            position: 'bottom',
            icon: null,
            timeout: 2,
            animationDuration: 300,
            dismissible: true
         });
    });
}

</script>
@endsection