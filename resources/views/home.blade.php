<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Joinner Sistemas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.2.802/styles/kendo.default-ocean-blue.min.css">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2022.2.802/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2022.2.802/js/jszip.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2022.2.802/js/kendo.all.min.js"></script>
</head>
<style>
    .demo-section p {
        margin: 0 0 30px;
        line-height: 50px;
    }

        .demo-section p .k-button {
            margin: 0 10px 0 0;
        }

    .k-button-solid-primary {
        min-width: 150px;
    }
</style>
<body>
    <nav class="navbar navbar-light bg-light">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pessoaModal">
            Cadastrar pessoa
          </button>
    </nav>
    <!-- Button trigger modal -->


  <!-- Modal -->
    <div class="modal fade" id="pessoaModal" tabindex="-1" role="dialog" aria-labelledby="pessoaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="pessoaModalLabel">Cadastrar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="formCreate">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" required id="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="genero">Gênero</label>
                        <select name = "genero" class="form-control" id="genero">
                            <option value="">Não informado</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nascimento">Nascimento</label>
                        <input class="form-control" required type="date" id="nascimento" name="nascimento">
                    </div>
                    <div class="form-group" id="pais">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="editPessoaModal" tabindex="-1" role="dialog" aria-labelledby="editPessoaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editPessoaModalLabel">Editar pessoa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="formEdit">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" required id="edit_nome" name="nome" placeholder="Nome">
                    </div>
                    <input type="hidden" id="pessoaId">
                    <div class="form-group">
                        <label for="genero">Gênero</label>
                        <select name = "genero" class="form-control" id="edit_genero">
                            <option value="">Não informado</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nascimento">Nascimento</label>
                        <input class="form-control" type="date" required id="edit_nascimento" name="nascimento">
                    </div>
                    <div class="form-group" id="edit_pais">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" id="atualizar">Atualizar</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Excluir pessoa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Tem certeza que deseja excluir?
            </div>
            <div class="modal-footer">
              <button type="button" class="col-6 btn btn-primary" data-dismiss="modal">Não</button>
              <button type="button" class="col-6 btn btn-danger" id="excluriPessoa">Sim</button>
            </div>
          </div>
        </div>
    </div>
    <div class="container">
        <div id="ordersGrid"></div>
    </div>
<script>

    function atualizarPessoa() {
        $('#atualizar').on('click', function() {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: 'updatePessoa',
                method: 'post',
                data:{  id: $('#pessoaId').val(), nome: $('#edit_nome').val(), genero: $('#edit_genero').val(),
                        nascimento: $('#edit_nascimento').val(), pais: $('#edit_pais_id').val()},
                success: function(data) {
                    $('#formEdit').trigger("reset");
                    $('.close').click();
                },
                error: function(error) {
                    console.log(error)
                }
            }).done(function() {
                pessoas()
            })
        })
    }

    $('#cadastrar').on('click', function() {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url:'createPessoa',
            method: 'post',
            data:{nome: $('#nome').val(), genero: $('#genero').val(), nascimento: $('#nascimento').val(), pais: $('#pais_id').val()},
            success: function(data) {
                $('#formCreate').trigger("reset");
                $('.close').click()
                pessoas()
            },
            error: function(error) {
                console.log(error)
            }
        })
    })

    function pessoas()
    {
        $.ajax({
            url: 'getAllPessoas',
            async: false,
            success: function( data ) {
                $('#ordersGrid').html("<h1 class='h1'>Sem usuários cadastrados</h1>")
                if(data.data.length > 0) {
                    var gridDataSource = new kendo.data.DataSource({
                        data: data.data,
                        schema: {
                            model: {
                                fields: {
                                    id: { type: "number" },
                                    nome: { type: "string" },
                                    genero: { type: "string" },
                                    nascimento: { type: "date" },
                                }
                            }
                        },
                        pageSize: 10,
                        sort: {
                            field: "id",
                            dir: "asc"
                        }
                    });

                    $("#ordersGrid").kendoGrid({
                        dataSource: gridDataSource,
                        height: 500,
                        pageable: true,
                        sortable: true,
                        filterable: true,
                        columns: [{
                            field:"id",
                            title: "ID",
                            width: 160
                        }, {
                            field: "nome",
                            title: "Nome",
                        }, {
                            field: "genero",
                            title: "Gênero"
                        }, {
                            field: "nascimento",
                            title: "Data de Nascimento",
                            width: 200,
                            format: "{0:dd MMMM yyyy}"
                        }, {
                            title: "Ações",
                            template: "<input data-toggle='modal' data-target='\\#editPessoaModal' data='#= id #' id='edit_#= id #' type='button' class='btn btn-primary editar' value='Editar'>&nbsp;&nbsp;<input data='#= id #' id='delete_#= id #' type='button' data-toggle='modal'  class='btn btn-danger excluir' data-target='\\#excluirModal' value='Excluir'>",
                        }]
                    });
                }
            }
        })
    }

    function excluirPessoa()
    {
        $(document).on ("click", ".excluir", function() {
            let pessoaId = $(this).attr('data')
            $('#excluriPessoa').on('click', function() {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: 'deletePessoa',
                    data: { id: pessoaId},
                    method: 'post',
                    success: function(data) {
                        $('.close').click();
                        pessoas()
                    },
                    error: function(error) {
                        $('.close').click();
                    }
                })
            })
        })
    }

    function editarPessoa()
    {
        $(document).on ("click", ".editar", function() {
            $.ajax({
                url: 'editPessoa',
                data: { id: $(this).attr('data')},
                success: function(data) {
                    $('#pessoaId').val(data.id)
                    $('#edit_nome').val(data.nome)
                    $('#edit_genero').val(data.genero)
                    $('#edit_nascimento').val(data.nascimento)
                    $('#edit_pais_id').val(data.pais.nome)
                    paises(data.pais_id)
                }
            })
        });
    }

    function paises(pais_id = "")
    {
        $.ajax({
            url: 'getAllPaises',
            async: false,
            success: function( data ){
                let html = ""
                if(pais_id !== "") {
                    html += "<select required id = 'edit_pais_id' class='form-control'>"
                } else {
                    html += "<select required id = 'pais_id' class='form-control'>"
                }

                html += "<option selected >Selecione</option>"

                data.data.forEach(function(value) {
                    if(pais_id === value.id) {
                        html += "<option selected value='"+value.id+"'>"+value.nome+"</option>"
                    } else {
                        html += "<option value='"+value.id+"'>"+value.nome+"</option>"
                    }
                })
                html += "</select>"
                if(pais_id !== "") {
                    $('#edit_pais').html(html)
                } else {
                    $('#pais').html(html)
                }

            }
        })
    }

    $(document).ready(function() {
        pessoas()
        paises()
        editarPessoa()
        atualizarPessoa()
        excluirPessoa()
    })

</script>
</body>
</html>
