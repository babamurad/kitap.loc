jQuery(document).ready(function($) {
    /*
     * Автоматическое создание slug при вводе name (замена кириллицы на латиницу)
     */
    $('input[name="name"]').on('input', function() {
        /* ... */
    });
    /*
     * Подключение wysiwyg-редактора для редактирования контента страницы
     */
    $('textarea[id="editor"]').summernote({
        lang: 'ru-RU',
        height: 300,
    });
});