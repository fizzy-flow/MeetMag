(function() {
    var lol = angular.module('memberssss', []);
    lol.controller('numMembers', function($scope) {
        $scope.members;
        $scope.agendas = [
            {
                name: "Agenda 1",
                importance: "Very"
            },
            {
                name: "Agenda 2",
                importance: "Meh"
            },
            {
                name: "Agenda 3",
                importance: "Life or Death"
            }
        ];
        $scope.numMembers = 0;
        $scope.populate = function() {
            $scope.members = new Array(numMembers);
            for (var i=0; i<members.length; i++) {
                $scope.members[i] = "Member " + i;
            }
        };
    });
})();