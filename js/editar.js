$("#consulta").click(function(){
      var nombre= $("#nombre").val();
      var numid= $("#numid").val();
      var curso= $("#curso").val();
      var apellido= $("#apellido").val();
      console.log(nombre)
      console.log(numid)

      $.ajax({
        url: '../actualizar.php?id="1002058291"',
        method:'GET',
        data: {

            nombre:nombre,
            numid:numid,
            curso:curso,
            apellido:apellido,


        },
        success: function(respuesta) {
          console.log(respuesta);
          $("#g").html(respuesta);
        },
        error: function() {
              console.log("No se ha podido obtener la información");
          }
      });
    });