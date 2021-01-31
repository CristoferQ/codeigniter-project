(function($){    
    $(document).ready(function(){
        $('#tabla').attr('hidden', true);  
        $('#wait').attr('hidden', false); 
        $.ajax({
            url: "mantenedor/read",
            type: 'GET',
            success: function(data){
                var json = JSON.parse(data)
                $('#tabla').attr('hidden', false);  
                $('#wait').attr('hidden', true); 
                var example = $('#example').DataTable( {
                    "aaData": json,
                    "bDestroy": true,
                    "columns": [
                        { "data": "id" },
                        { "data": "fecha" },
                        { "data": "valor" },
                        { "defaultContent": "<button id='b_editar' data-bs-toggle='modal' data-bs-target='#exampleModal2' type='button' class='btn btn-warning'><i class='fa fa-file'></i></button>"},
                        { "defaultContent": "<button id='b_eliminar' data-bs-toggle='modal' data-bs-target='#exampleModal3' type='button' class='btn btn-danger'><i class='fa fa-file'></i></button>"},
                    ],
                    "scrollX": true,
                })
                $('#example').DataTable().columns.adjust()
                getSecForDetail("#example tbody", example);
            },
            error: function(){
                console.log("Error")
           },
        });
        $("#btn_añadir").click(function() {
            if ($("#añadir_fecha").val() != '' && $("#añadir_valor").val() != ''){
                fecha_val = $("#añadir_fecha").val();
                valor_val = $("#añadir_valor").val();
                $.ajax({
                    url: "mantenedor/create/"+fecha_val+"/"+valor_val,
                    type: 'POST',
                    success: function(data){
                        $('#exampleModal').modal('toggle');
                        $('#tabla').attr('hidden', true);  
                        $('#wait').attr('hidden', false); 
                        $.ajax({
                            url: "mantenedor/read",
                            type: 'GET',
                            success: function(data){
                                var json = JSON.parse(data)
                                $('#tabla').attr('hidden', false);  
                                $('#wait').attr('hidden', true); 
                                var example = $('#example').DataTable( {
                                    "aaData": json,
                                    "bDestroy": true,
                                    "columns": [
                                        { "data": "id" },
                                        { "data": "fecha" },
                                        { "data": "valor" },
                                        { "defaultContent": "<button id='b_editar' data-bs-toggle='modal' data-bs-target='#exampleModal2' type='button' class='btn btn-warning'><i class='fa fa-file'></i></button>"},
                                        { "defaultContent": "<button id='b_eliminar' data-bs-toggle='modal' data-bs-target='#exampleModal3' type='button' class='btn btn-danger'><i class='fa fa-file'></i></button>"},
                                    ],
                                    "scrollX": true,
                                })
                                $('#example').DataTable().columns.adjust()
                                getSecForDetail("#example tbody", example);
                            },
                            error: function(){
                                console.log("Error")
                           },
                        });
                    },
                    error: function(){
                        console.log("error")
                    },
                });
            } 
        });
        var getSecForDetail = function(tbody, table){
            $(tbody).on("click", "#b_editar", function(){
                var data = table.row( $(this).parents("tr") ).data();		
                if (data != undefined){
                    $("#fecha_antigua").html("<b>"+data.fecha+"</b>")
                    $("#valor_antiguo").html("<b>"+data.valor+"</b>")
                    $("#btn_editar").click(function() {
                        $.ajax({
                            url: "mantenedor/update/"+data.id+"/"+$("#fecha_nueva").val()+"/"+$("#valor_nuevo").val(),
                            type: 'POST',
                            success: function(data){
                                $('#exampleModal2').modal('toggle');
                                $('#tabla').attr('hidden', true);  
                                $('#wait').attr('hidden', false); 
                                $.ajax({
                                    url: "mantenedor/read",
                                    type: 'GET',
                                    success: function(data){
                                        var json = JSON.parse(data)
                                        $('#tabla').attr('hidden', false);  
                                        $('#wait').attr('hidden', true); 
                                        var example = $('#example').DataTable( {
                                            "aaData": json,
                                            "bDestroy": true,
                                            "columns": [
                                                { "data": "id" },
                                                { "data": "fecha" },
                                                { "data": "valor" },
                                                { "defaultContent": "<button id='b_editar' data-bs-toggle='modal' data-bs-target='#exampleModal2' type='button' class='btn btn-warning'><i class='fa fa-file'></i></button>"},
                                                { "defaultContent": "<button id='b_eliminar' data-bs-toggle='modal' data-bs-target='#exampleModal3' type='button' class='btn btn-danger'><i class='fa fa-file'></i></button>"},
                                            ],
                                            "scrollX": true,
                                        })
                                        $('#example').DataTable().columns.adjust()
                                        getSecForDetail("#example tbody", example);
                                    },
                                    error: function(){
                                        console.log("Error")
                                   },
                                });
                            },
                            error: function(){
                                console.log("error")
                            },
                        });
                    });
                }
            });
            $(tbody).on("click", "#b_eliminar", function(){
                var data = table.row( $(this).parents("tr") ).data();		
                if (data != undefined){
                    $("#btn_eliminar").click(function() {
                        $.ajax({
                            url: "mantenedor/delete/"+data.id,
                            type: 'POST',
                            success: function(data){
                                $('#exampleModal3').modal('toggle');
                                $('#tabla').attr('hidden', true);  
                                $('#wait').attr('hidden', false);
                                $.ajax({
                                    url: "mantenedor/read",
                                    type: 'GET',
                                    success: function(data){
                                        var json = JSON.parse(data)
                                        $('#tabla').attr('hidden', false);  
                                        $('#wait').attr('hidden', true); 
                                        var example = $('#example').DataTable( {
                                            "aaData": json,
                                            "bDestroy": true,
                                            "columns": [
                                                { "data": "id" },
                                                { "data": "fecha" },
                                                { "data": "valor" },
                                                { "defaultContent": "<button id='b_editar' data-bs-toggle='modal' data-bs-target='#exampleModal2' type='button' class='btn btn-warning'><i class='fa fa-file'></i></button>"},
                                                { "defaultContent": "<button id='b_eliminar' data-bs-toggle='modal' data-bs-target='#exampleModal3' type='button' class='btn btn-danger'><i class='fa fa-file'></i></button>"},
                                            ],
                                            "scrollX": true,
                                        })
                                        $('#example').DataTable().columns.adjust()
                                        getSecForDetail("#example tbody", example);
                                    },
                                    error: function(){
                                        console.log("Error")
                                   },
                                });
                            },
                            error: function(){
                                console.log("error")
                            },
                        });
                    });
                }
            });
        }

    });
})(jQuery)