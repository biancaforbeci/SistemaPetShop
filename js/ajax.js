function alterar_div() {
    $.ajax({
      type: "POST",
      url: "../views/reservas.php?acao=aumentar",
      data: {
        quantidade: $('#qtd').val()
      },
      success: function(data) {
        $('#totalItem').html(data);
      }
    });
  }