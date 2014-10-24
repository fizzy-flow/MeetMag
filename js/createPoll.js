var i = 1;
var createPoll = true;


//Adds and remove new div
$(function() {


        var pollDiv = $('#addPollDiv');
        var u = $('#p_div div').size();

        $(document.body).on('click', '#addPollDiv', function(){
                if (createPoll) {
                        var htmlCode = '<h2 id="voteLink"><a id="addScnt">Add Voting Options</a></h2><div id="p_div"><form class="cbp-mc-form" id="test" action=""><p><input type="text" id="q_title" placeholder="Question Title" size="20"></p><p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt" value="" placeholder="Option 1" /></label></p></form><input id="removePoll" type="submit" value="Submit"></input><input id="removePoll" type="button" value="Remove Poll"></input></div>';
                        $(htmlCode).hide().appendTo("#createPoll").fadeIn("slow");

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
        var scntDiv = $('#p_div');
        i = $('#p_scents p').size() + 2;
        
        $(document.body).on('click', '#addScnt', function(){
                var htmlCode = '<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Option '+i+'" /></input><a id="remScnt"><span class="icon-circle-minus"></span></a></label></p>';
                $(htmlCode).hide().appendTo("#test").fadeIn("slow");
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

/*
//Adds and remove new option
 $(function() {
    $('#divToRefresh').load('thephpfile.php');
    var refreshId = setInterval(function() {
        $('#divToRefresh').fadeOut(“slow”).load('thephpfile.php').fadeIn(“slow”);
    }, 5000);
    $.ajaxSetup({ cache: false });
});*/