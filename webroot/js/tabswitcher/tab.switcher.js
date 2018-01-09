function initTabs(tab_portlet_selector) {
    let buttons = $(tab_portlet_selector + ' .m-portlet__head-tools .btn-group button');
    let sections = $(tab_portlet_selector + ' .m-portlet__body');

    sections.css('display', 'none');
    $(sections[0]).css('display', 'block');

    let key = 0;
    buttons.click((e) => {
        sections.css('display', 'none');

        buttons.each(function (index) {

            if (e.target.tagName !== 'BUTTON') {
                e.target = e.target.parentNode;
            }

            if (this == e.target) {
                key = index;
            }
        });

        $(sections[key]).css('display', 'block');
    })


}