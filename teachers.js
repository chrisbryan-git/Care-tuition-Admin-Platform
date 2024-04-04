$(document).ready(function () {
    $('#showActive').click(function () {
        $('.teacher-row').show(); 

        $('.inactive-checkbox').each(function () {
            if ($(this).prop('checked')) {
                $(this).closest('.teacher-row').hide();
            }
        });
    });

});

$('#showInactive').click(function () {
        $('.teacher-row').hide(); 

        $('.inactive-checkbox').each(function () {
            if ($(this).prop('checked')) {
                $(this).closest('.teacher-row').show();
            }
        });
});
