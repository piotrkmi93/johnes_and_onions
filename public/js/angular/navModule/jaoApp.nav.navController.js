/**
 * Created by ckmki on 23.11.2016.
 */

(function(){
    angular
        .module('jaoApp.nav')
        .controller('navController', ['$scope', '$rootScope', '$timeout', navController]);

    function navController($scope, $rootScope, $timeout){
        var self = this;

        self.gold = 0;

        $rootScope.$on('goldChange', goldChange)

        function goldChange(event, gold) {
            $timeout(function() {
                $scope.$apply(function () {
                    self.gold = gold;
                });
            });
        }
    };

})();