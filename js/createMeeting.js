var i = 1;
var u = 1;
//Adds and remove Agenda
$(function() {

        u = $('#p_agendas p').size() + 2;

        $(document.body).on('click', '#addAgendaSec', function(){

                        var htmlCode = '<p><label for="p_agendas"><input type="text" id="AgendaTitle'+u+'" name="agendaTitle[agendaTitle'+u+']" placeholder="Agenda Title '+u+'"></input><input type="text" id="AgendaDescp'+u+'" name="agendaDesc[agendaDesc'+u+']" placeholder="Agenda Description '+u+'" ></input><input type="number" placeholder="Agenda Time (Mins)" name="agendaTime[agendaTime'+u+']" min=0 max=59></input></label><a id="removeAgendaSec"><span class="icon-minus"></span></a></p>';
                        $(htmlCode).hide().appendTo('#agendasDiv').fadeIn("slow");
                        u++;
        });
        
        $(document.body).on('click', '#removeAgendaSec', function(){ 
                if( u > 2 ) {
                        $(this).parents('p').fadeOut(200, function(){ 
                                $(this).remove();
                                u--;
                        });
                }
        });

});


//Adds and remove new Member
$(function() {
        i = $('#p_members p').size() + 2;
        
        $(document.body).on('click', '#addMember', function(){
            console.log ( '#someButton was clicked' );
                var htmlCode = '<p><label for="p_members"><input type="text" id="MemberInput'+i+'" name="member[member'+i+']" placeholder="Member '+i+'"/></label><a id="remoMember"><span class="icon-minus"></span></a></p>';
                $(htmlCode).hide().appendTo("#membersDiv").fadeIn("slow");
                i++;
        });
        
        $(document.body).on('click', '#remoMember', function(){ 
                if( i > 2 ) {
                        $(this).parents('p').fadeOut(200, function(){ 
                                $(this).remove();
                                i--;
                        });
                }

        });
});
