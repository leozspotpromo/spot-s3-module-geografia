@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Estado</h4></div>
            <div class="card-body">
                        <table class="table table-bordered" id="table-data">
          
                        </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
                   

@endsection

@section('javascript')

    <script>
        jQuery.noConflict();
        (function($){

    $(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: '/geografia/estado/datatable',
        i18n: {
            create: {
                button: "Novo",
                title:  "Criar Novo Registro",
                submit: "Salvar"
            },
            edit: {
                button: "Editar",
                title:  "Atualização de Registro",
                submit: "Salvar atualizações"
            },
            remove: {
                button: "Deletar",
                title:  "Deletar Registro",
                submit: "Deletar",
                confirm: {
                    _: "Você tem certeza que deseja excluir %d ?",
                    1: "Você tem certeza que deseja excluir ?"
                }
            },
            error: {
                system: "Houveram erros, por favor, tente novamente em alguns instantes."
            },
            multi: {
                title: "Multiplos Valores",
                info: "Os registros selecionados possuem valores distintos, por isso alguns estão desabilitados",
                restore: "Anular modificações"
            },
            datetime: {
                previous: 'Anterior',
                next:     'Próximo',
                months:   [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
                weekdays: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ]
            }
        },
		table: '#table-data',
		fields: [
			{
				label: "Descrição",
				name: "state.description"
			},
            {
				label: "Ativo",
                type: "radio",
				name: "state.active",
                options: [
                    { label: "SIM", value: 1 },
                    { label: "NÃO", value: 0 }
                ]
			}
		]
	} );

	var table = $('#table-data').DataTable( {
        dom: "Bfrtip",
		ajax: {
            "url": "/geografia/estado/datatable",
            "type": "POST"
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
		columns: [
			{
				title: "Id",
				data: "state.id",
                visible: false
			},
            {
				title: "Descrição",
				data: "state.description",
			},
            {
				title: "Ativo?",
				data: "state.active",
                render: function(data){
                    return (data == 1) ? 'SIM' : 'NÃO';
                }
			}
		],
		select: true,
		lengthChange: false,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor },
            'excelHtml5',
            'colvis'
        ]
	} );

	// table.buttons().container()
	// 	.appendTo( $('.col-md-6:eq(0)', table.table().container() ) );
} );

}(jQuery));
    </script>
@endsection
