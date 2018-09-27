(function($, Micromodal) {
    $(document).ready(function() {
        console.log('launching');
        // MicroModal.init('modal-1');
        // Проверим, есть ли запись в куках о посещении посетителя
        // Если запись есть - ничего не делаем
        if (!$.cookie('was')) {
            Micromodal.show('modal-1');
        }
        // Запомним в куках, что посетитель к нам уже заходил
        $.cookie('was', true, {
            expires: 2,
            path: '/'
        });
        $('#db_popup_on_visit_accept').on('click', function() {
            console.log('Clicked accept');
            Micromodal.close('modal-1');
            Micromodal.show('modal-youtube');
        })
    })
}(jQuery, MicroModal));