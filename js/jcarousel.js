(function($) {
    $(function() {
        var jcarousel = $('#new-arrivals');
        var width = jcarousel.innerWidth();
        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                        width = width / 3;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });
        var jcarousel = $('#sale');
        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    //var width = jcarousel.innerWidth();
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                        width = width / 3;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });
        var jcarousel = $('#best-sellers');

        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    //var width = jcarousel.innerWidth();
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                    width = width / 2;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });
				
//new code for new-arrivals 
        var jcarousel = $('#coffee_tab');
        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    //var width = jcarousel.innerWidth();
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                        width = width / 3;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });
				
        var jcarousel = $('#tea_tab');
        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    //var width = jcarousel.innerWidth();
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                        width = width / 3;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });

        var jcarousel = $('#cocoa_tab');
        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    //var width = jcarousel.innerWidth();
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                        width = width / 3;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });

        var jcarousel = $('#chai_tab');
        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    //var width = jcarousel.innerWidth();
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                        width = width / 3;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });

        var jcarousel = $('#cider_tab');
        jcarousel
                .on('jcarousel:reload jcarousel:create', function() {
                    //var width = jcarousel.innerWidth();
                    //alert(jcarousel.parent().parent().parent().attr('id')+' '+width);
                    if (width >= 600) {
                        width = width / 3;
                    } else if (width >= 350) {
                        width = width / 3;
                    }
                    
                    jcarousel.jcarousel('items').css('width', width + 'px');
                })
                .jcarousel({
                    wrap: 'circular'
                    
                    

                });				
				
				

        $('.jcarousel-control-prev')
                .jcarouselControl({
                    target: '-=1'
                });

        $('.jcarousel-control-next')
                .jcarouselControl({
                    target: '+=1'
                });

        $('.jcarousel-pagination')
                .on('jcarouselpagination:active', 'a', function() {
                    $(this).addClass('active');
                })
                .on('jcarouselpagination:inactive', 'a', function() {
                    $(this).removeClass('active');
                })
                .on('click', function(e) {
                    e.preventDefault();
                })
                .jcarouselPagination({
                    perPage: 1,
                    item: function(page) {
                        return '<a href="#' + page + '">' + page + '</a>';
                    }
                });
    });
})(jQuery);
