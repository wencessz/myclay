jQuery.noConflict();

(function($) {
    $(document).ready(function() {
    if ($('#door-list').length) {
      $('#door-list a.open-door').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var element = $(this);
            HoldOn.open({
                theme:"sk-bounce",//If not given or inexistent theme throws default theme sk-rect
                message: "<h4> CHECKING ACCESS </h4>",
                content:"Your HTML Content", // If theme is set to "custom", this property is available
                                             // this will replace the theme by something customized.
                backgroundColor:"#006838",//Change the background color of holdon with javascript
                                       // Keep in mind is necessary the .css file too.
                textColor:"white" // Change the font color of the message
            });
            $.ajax($basePath+url)
                .done(function (response) {
                    element.parent().find('.response').addClass(response);
                    element.remove();
                })
                .fail (function (xhr) {
                    alert('Error: ' + xhr.responseText);
                });
                HoldOn.close();
        });
    }
});
}(jQuery));