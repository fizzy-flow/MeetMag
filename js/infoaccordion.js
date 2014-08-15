$(function() {
  /* accordion button action */
  $('div.infoaccordionButton').click(function() {
    /* make the accordion close on the second click */
    if ($('div.infoaccordionContent').hasClass('openDiv')) {
      $('div.infoaccordionContent').slideUp('normal');
      $(this).next().removeClass('openDiv');
    }
    else {
      $('div.infoaccordionContent').slideUp('normal');
      $(this).next().slideDown('normal');
      $(this).next().addClass('openDiv');
    }
  });

  /* hide the divs on page load */
  $("div.infoaccordionContent").hide();
});
