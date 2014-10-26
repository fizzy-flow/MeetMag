var i = 1;
var createPoll = true;


//Adds and remove new div
$(function() {
    var pollDiv = $('#addPollDiv');
    var u = $('#p_div div').size();

    $(document.body).on('click', '#addPollDiv', function(){
        if (createPoll) {
            var htmlCode = '<h2 id="voteLink"><a id="addScnt">Add Voting Options</a></h2><div id="p_div"><form class="cbp-mc-form" id="test" method="post" action="inc/php/process.php"><p><input type="text" name="q_Title" id="q_title" placeholder="Question Title" size="20"></p><p><label for="p_scnts"><div id="addOpt"><input type="text" id="p_scnt" size="20" name="p_opt[]" value="" placeholder="Option 1" /></label></p></div><input id="removePoll" class="button" type="submit" value="Submit"></form></input><input id="removePoll" type="button" value="Remove Poll"></input></div>';
            $(htmlCode).hide().appendTo("#createPoll").fadeIn("slow");
            /*$('#test').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); */
    var options = { 
        target:        '#success_div',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
    }; 
    // pre-submit callback 

$('#test').submit(function() { 
    // submit the form 
    $(this).ajaxSubmit(options); 
    // return false to prevent normal browser submit and page navigation 

    return false;
});

createPoll = false;
};
});

$(document.body).on('click', '#removePoll', function(){ 
    $("#p_div").fadeOut(300, function(){ 
        $(this).remove();
    });
    $("#voteLink").fadeOut(300, function(){ 
        $(this).remove();
    });
    i = 2;
    createPoll = true;

});

});

//Adds and remove new option
$(function() {
    i = $('#p_scents p').size() + 2;
    
    $(document.body).on('click', '#addScnt', function(){
        var htmlCode = '<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_opt[]" value="" placeholder="Option '+i+'" /></input><a id="remScnt"><span class="icon-circle-minus"></span></a></label></p>';
        $(htmlCode).hide().appendTo("#addOpt").fadeIn("slow");
        i++;
    });
    
    $(document.body).on('click', '#remScnt', function(){ 
        if( i > 2 ) {
            $(this).parents('p').fadeOut(200, function(){ 
                $(this).remove();
                i--;
            });
        }

    });
});

/*$(function() {
    var dataString;
    $(".button").click(function() {
        var inputs = formNum["p_opt[]"];
        for (var i = 0; i < inputs.length; i++) {
            dataString += inputs[i].value;
        }
        dataString = 'name='+ name + '&email=' + email + '&phone=' + phone;
  //alert (dataString);return false;
  $.ajax({
    type: "POST",
    url: "inc/php/process.php",
    data: dataString,
    success: function() {
      $('#success_div').html("<div id='message'></div>");
      $('#message').html("<h2>Poll Form Submitted!</h2>")
      .append("<p>We will be in touch soon.</p>")
      .hide()
      .fadeIn(1500, function() {
        $('#message').append("<img id='checkmark' src='images/check.png'/>");
    });
  }
});
  return false;
});
});*/

/*
//Adds and remove new option
 $(function() {
    $('#divToRefresh').load('thephpfile.php');
    var refreshId = setInterval(function() {
        $('#divToRefresh').fadeOut(“slow”).load('thephpfile.php').fadeIn(“slow”);
    }, 5000);
    $.ajaxSetup({ cache: false });
});*/

    function showRequest(formData, jqForm, options) { 
        var queryString = $.param(formData); 
        alert('About to submit: \n\n' + queryString); 
        return true; 
    } 
    
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.'); 
} 