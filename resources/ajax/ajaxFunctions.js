$(document).ready(function(){
    /* PDDIRWEB DATA CHARGING */
    
    /* Listar Datos Reservacion */
    $('#btn-get-reservas').click(function(){
        //alert("procesado...")
        //var rows = $("#tipoLocal").val();
        var start = $("#startDateConsulta").val()
        alert(start)
        var end = $("#endDateConsulta").val();
        alert(end)
        var tipo = $("#tipoLocal").val();
        var $loading = $('#lista-reservas').html("<div class='progress progress-striped active'><div class='bar' style='width: 100%;'>Ejecutandose </div></div>");
        //alert("inicio "+start+" fin: "+end+" Cant: "+rows)
         $.ajax({
            type: "POST",
            url: "../../actions/listaReservas.php",
            data: {
                start:start,
                end:end,
                tipo:tipo
            }
            }).done(function( data ) {
                $loading.html(data);

         });
        
    })
    /* Fin datos reservacion */
    
    $(".alert-msg-show").delay(4000).hide("fade",3000)
    $("#error-panel").delay(4000).hide("fade",3000)
    
    $("#btn-edit-user-data").click(function(){
            var ci = $("#ci-info").val();
            
            var numeroDeCasa = $("#numero-de-la-casa").val();
            var barrio = $("#nombre-del-barrio").val();
            var ciudad = $("#nombre-de-la-ciudad").val();
            var calle = $("#nombre-de-la-calle").val();
            var localidad = $("#nombre-de-localidad").val();
            var celular1 = $("#celular-1").val();
            var celular2 = $("#celular-2").val();
            var lineaBaja1 = $("#linea-baja-1").val();
            var lineaBaja2 = $("#linea-baja-2").val();
            var email = $("#e-mail").val();
            $.ajax({
                    type: "POST",
                    url: "./actions/edit-user-data-action.php",
                    data: {ci:ci,numeroDeCasa:numeroDeCasa,barrio:barrio,ciudad:ciudad,calle:calle,localidad:localidad,celular1:celular1,celular2:celular2,lineaBaja1:lineaBaja1,lineaBaja2:lineaBaja2,email:email},
                    success: function(){
                        $("#modalUserData").modal("hide");
                        url = "http://localhost";
                        $(location).attr('href',url);
                  }
            });
            
            
        });  
        
});