
$(document).ready(function () {
    openActiveBlock(this, 'from-country-info', 'from-country-name', 'from-country-city', 'active-catalog')

    $('.country-city-min').on('click', function () {
        changeCatalogActive(this, 'from-country-name', 'active-catalog', 'country-city-min')
        openActiveBlock(this, 'from-country-info', 'from-country-name', 'from-country-city', 'active-catalog')

    })


    function changeCatalogActive($this, parent_menu, active_class, menu_link) {
        var prt = $($this).parents('.' + parent_menu);
        var child = $(prt).find('.' + menu_link);
        $(child).each(function () {
            if ($(this).hasClass(active_class)) {
                $(this).removeClass(active_class);
            }
        })
        $($this).addClass(active_class)
    }

    function openActiveBlock($this, parent_block, menu_link, menu_block, active_class) {

        var prt = $('.' + parent_block);
        var menu_child_ul = $(prt).find('.' + menu_link).children();
        var children = $(menu_child_ul).children()
        var menu_cnt = $(prt).find('.' + menu_block).children();
        if ($($this).attr('data-catalog')) {
            var this_attr_click = $($this).attr('data-catalog');
            $(menu_cnt).each(function () {
                $(this).css({display:'none'});
                if(this_attr_click== $(this).attr('data-catalog')){
                    $(this).fadeIn()
                }
            })
        } else {
            $(children).each(function () {
                if ($(this).hasClass(active_class)) {
                    var this_arrt = $(this).attr('data-catalog');
                    console.log(this_arrt)
                    $(menu_cnt).each(function () {
                        if (this_arrt == $(this).attr('data-catalog')) {
                            $(this).fadeIn();
                        }
                    })
                }
            })
        }


    }
})
