// Loader activer au chargement de la page
window.addEventListener('load', () => {
    // setTimeout({

    // }, 3000);
});

// Vérification des champs remplis 

$(function() {

    // toggle show nav menu
    $('#toggleNavList, #bgToggleNavList').click(function() {
        if ($('.navbar__list') && $('#bgToggleNavList')) {
            $('.navbar__list, #bgToggleNavList').toggleClass('show');
        }
    });

    // New rapport container
    $('#new-rapport').hide();

    // Open new rapport btn
    $('#btn-newRapport').click(function() {
        $('#display-data-rapport').hide();
        $('#new-rapport').show();
    });

    // Add new offert
    let tabOffert = [];

    $('.btn_add_offer').click(function() {

        if ($('#choose-med').val() >= 0 && $('#qtity-med').val() > 0 && $('#qtity-med').val() <= 100) {
            $('#offert-list').append('<li class="offert-item"><div class="med-name">' + $('#choose-med option:selected').text() + '</div><div class="qtity">' + $('#qtity-med').val() + '</div></li>');

            tabOffert.push([$('#choose-med option:selected').text(), Number($('#qtity-med').val())]);

            $('#choose-med').val() == 0;
            $('#qtity-med').val() == 0;
        }
    });

    // Save new rapport btn
    $('#saveNewRapport').click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                "praticienNum": $('#choicePraticienNewRapport').val(),
                "dateRapport": $('#dateNewRapport').val(),
                "motifRapport": $('#MotifNewRapport').val(),
                "bilanRapport": $('#BilanNewRapport').val(),
                "tabOffert": tabOffert
            },
            dataType: "json",
            success: function(response) {
                console.log(response);

                // location.reload();

                $('#new-rapport').hide();
                $('#display-data-rapport').show();
            },
            error: function() {
                console.log('ERROR');
            },
            complete: function() {
                console.log('COMPLETE')
            }
        });

    });

    // Close New rapport btn
    $('#ExitNewRapport').click(function(e) {
        e.preventDefault();

        $('#alert-').hide();
        $('.alert-msg').html()
        $('.alert-btn-annuler').click(function() {

        });
        $('.alert-btn-quitter').click(function() {

        });

        $('#new-rapport').hide();
        $('#display-data-rapport').show();
    });

});