@extends('layout.index')
@section('titulo', 'Perfil')
@section('corpo')
    <div class="col-lg-9">
        <div class="ibox ">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nome *</label>
                                    <input id="nome" name="nome" type="text" class="form-control" required
                                        value="{{ $funcionario->nome ?? old('nome') }}"
                                        pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Identificação *</label>
                                    <select class="form-control" name="tipo_doc">
                                        <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                                        <option value="Passaporte">Passaporte</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Numero de Identificação *</label>
                                    <input id="numero_doc" name="numero_doc" type="text" class="form-control" required
                                        value="{{ $funcionario->numero_doc ?? old('numero_doc') }}">
                                </div>
                                <div class="form-group">
                                    <label>Data de Validade *</label>
                                    <input id="data_validade" name="data_validade" type="date" class="form-control required"
                                        required value="{{ $funcionario->data_validade ?? old('data_validade') }}">
                                </div>
                            </div>

                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label>Telefone 1 *</label>
                                    <input id="telefone1" name="telefone1" type="text" class="form-control" required
                                        value="{{ $funcionario->telefone1 ?? old('telefone1') }}"
                                        data-mask="+244999999999">
                                </div>

                                <div class="form-group">
                                    <label>Telefone 2</label>
                                    <input id="telefone2" name="telefone2" type="text" class="form-control"
                                        value="{{ $funcionario->telefone2 ?? old('telefone2') }}"
                                        data-mask="+244999999999">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail *</label>
                                    <input id="email" name="email" type="email" class="form-control" required
                                        value="{{ $funcionario->email ?? old('email') }}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Endereço *</label>
                                    <textarea name="endereco" id="endereco" class="form-control"
                                        required>{{ $funcionario->endereco ?? old('endereco') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Função *</label>
                                    <input id="email" name="email" type="email" class="form-control" required
                                        value="{{ $funcionario->email ?? old('email') }}">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Alterar Palavra passe</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="form-group">
                            <label>Palavra passe antiga: *</label>
                            <input id="senha_antiga" name="senha_antiga" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nova palavra passe: *</label>
                            <input id="nova_senha" name="nova_senha" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmar palavra passe: *</label>
                            <input id="confirmar_senha" name="confirmar_senha" type="password" class="form-control"
                                required>
                        </div>
                        <button class="btn btn-primary dim" type="submit" onclick="mudarsenha()">ALTERAR</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mudarsenha() {

            var senha_antiga = $("#senha_antiga").val();
            var nova_senha = $("#nova_senha").val();
            var confirmar_senha = $("#confirmar_senha").val();

            if (!$.trim($("input[name='senha_antiga']").val())) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Informe a palavra passe antiga.',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                if (!$.trim($("input[name='nova_senha']").val())) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Informe a nova palavra passe.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    if (nova_senha === confirmar_senha) {
                        $.post("{{ route('funcionario.mudar_senha') }}", {
                            '_token': '{{ csrf_token() }}',
                            senha_antiga: senha_antiga,
                            nova_senha: nova_senha
                        }, function(dados) {
                            if (dados == "success") {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Palavra passe alterada.',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                window.location.href="{{route('login')}}";
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'Dados invalido.',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        })


                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'As palavra passes não correspondem.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                }

            }




        }
    </script>
@endsection


@endsection
