
$('#submitForm').on('click', function (e) {
    e.preventDefault();
    var form = $(this).parents('form');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Etes vous sur ??',
        text: "Vous ne pourrez pas faire marche arriere !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Non, annuler !',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {

            form.submit();
        }
    });
});



