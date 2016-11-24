$(document).ready( function () {
    
  $( "button[id^='botonFormularioActualizar']" ).each(function () {
    $(this).click(function () {
      // Extraemos el numero de la fila.
      var fila = $(this).prop("id").replace( /[^\d.]/g, '' );
      $("#formularioActualizar" + fila).css("display", "block");
    });
  });
  
  $(".botonFormularioActualizarCerrar").each(function () {
    $(this).click(function () {
      $(this).parent().parent().css("display", "none");
    });
  });
  
  $("#activarProtectorPantalla").click(function () {
    $("#protectorPantalla").css("display", "block");
  });
  
  $("#desactivarProtectorPantalla").click(function () {
    $("#protectorPantalla").css("display", "none");
  });

});