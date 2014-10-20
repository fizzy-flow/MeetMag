var i = 1;

//Adds and remove new div
$(function() {
        var pollDiv = $('#addPollDiv');
        var u = $('#p_div div').size();
        
        $(document.body).on('click', '#addPollDiv', function(){
                $('<h2 id="voteLink"><a href="#" id="addScnt">Click here to add Voting Options</a></h2><div id="p_div"><form id="test" action=""><p>Question Title: <input type="text" id="q_title" size="20"></p><p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt" value="" placeholder="Option 1" /></label></p></form><input type="submit" value="Submit"><a href="#" id="removePoll">Remove Poll </a></div>').appendTo("body");
                return false;
        });
        
        $(document.body).on('click', '#removePoll', function(){ 
                $("#p_div").remove();
                $("#voteLink").remove();
                i = 2;
                return false;
        });
});

//Adds and remove new option
$(function() {
        var scntDiv = $('#p_div');
        i = $('#p_scents p').size() + 2;
        
        $(document.body).on('click', '#addScnt', function(){
                $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Option '+i+'" /></label> <a href="#" id="remScnt">Remove</a></p>').appendTo("#test");
                i++;
                return false;
        });
        
        $(document.body).on('click', '#remScnt', function(){ 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});