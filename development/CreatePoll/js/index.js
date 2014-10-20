$.fn.csAccordion = function (args) {
        var defaults = {
            accordionTitle: false,
            backgroundColour: false,
            titleColour: false,
            titleTextColour: false
        };

        var args = $.extend({}, defaults, args);

        //Globals
        var ctx = $(this).attr('id');

        /*********************************************
			Initialise CS Accordion
			**********************************************/

        var $this = this;

      //Initialize styling for accordion title
        if (args.accordionTitle) {
            $(this).prepend('<div class="csAccordion__title">' + args.accordionTitle + '</div>');
        }

        $(this).find('ul').wrap('<div class="wrapper"></div>');


        //Defines data title and data featured and adds classes to them
            $(this).find('li').each(function () {
                var content = $(this).html();

                if (args.highlightFeatured && $(this).data('featured') == true) {
                    $(this).addClass('featured');
                }


                var html = '';
                    html += '<div class="col heading">';
                if ($(this).data('title')) {
                    html += '<p class="h3">' + $(this).data('title') + '</p><div class="expand"></div>';
                }

                    html += '</div><div class="col content"><div class="inner_content">' + content + '</div>';

                $(this).empty().append(html);
            });


        /*********************************************
			Configure CS Ticker
			**********************************************/

        $(this).addClass('csAccordion');

 /*********************************************
			Setup Functions 
			**********************************************/

        return this.each(function () {
            var $this = $(this);

            //helper function for collapse and expand
            $(this).find('li .col.heading').click(function () {
               $($this).find('.collapse').removeClass('collapse');
               $($this).find('li .col.content').removeClass('displayContent').css('height', 0).parent().removeClass('show');
               $(this).parent().addClass('show').find('.col.content').addClass('displayContent').css('height', $(this).parent().find('.inner_content').height());
               $(this).parent().find('.expand').addClass('collapse');
            });
            if ($(this).find('.expand')) {
                }

            
            //Helps with screen resizing
         $(window).resize(function(){
            $($this).find('.displayContent').css('height', $($this).find('.show').find('.inner_content').outerHeight());
        });
        
        });
    };

    //Activates accordion menu and initiates title
    $(document).ready(function()
                  {
                    $('.demo').csAccordion({ 'accordionTitle': 'Cream Soda jQuery Accordion'}); 
                  });
		