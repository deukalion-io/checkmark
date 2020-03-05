define(['jquery', 'core/ajax', 'core/notification'],
    function($, ajax, notification) {

    return {
        checkCompletion: function() {
            var bodyclasses = document.body.getAttribute('class');
            var cmid = bodyclasses.match(/cmid-(\d+)/);
            var courseid = bodyclasses.match(/course-(\d+)/);
            if (cmid && courseid) {
                var title = $('h2');
                var promises = ajax.call([{
                    methodname: 'sandbox_is_complete',
                    args: {
                        'courseid': courseid[1],
                        'cmid': cmid[1]
                    }
                }]);
                promises[0].done(function (data) {
                    $(title).append('<i class="fa fa-check ml-2 fadeIn animated" style="color: lightgreen;"></i>');
                }).fail(notification.exception);
                }
            }
        }
    }
);