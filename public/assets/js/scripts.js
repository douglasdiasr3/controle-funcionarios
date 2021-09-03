function excluirRegistro(assunto, rota,direciona) {
  Swal.fire({
    title: 'Confirmação',
    text: "Que deseja excluir " + assunto + ' ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, deletar!',
  }).then((result) => {
    if (result.isConfirmed) {

      $.ajax({
        url: $('#url').val() + "/" + rota, success: function (result) {
        }
      });

      Swal.fire(
        'Deletado!',
        'O registro foi deletado com sucesso.',
        'success'
      )

      $(".swal2-confirm").on("click", function () {
        window.location.href = $('#url').val() + "/"+direciona;
      });



    }
  })
}





$(function () {
  $(".formularios").on("submit", function () {
    $(".botaoSalvarEditar").hide();
    $(".botaoCarregando").show();
  });
});