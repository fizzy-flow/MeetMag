(function() {
	var test = angular.module('test', ['ui.bootstrap']);
	test.controller('testCtrl', function($scope) {
		$scope.Meetings = [
			"Meeting 1",
			"Meeting 2",
			"Meeting 3",
			"Meeting 4",
			"Meeting 5",
			"Meeting 6"
		];
	});
})();