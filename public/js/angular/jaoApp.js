/**
 * Created by ckmki on 06.11.2016.
 */
(function(){
    angular.module('jaoApp', [
        'ngDragDrop',

        'jaoApp.player',
        'jaoApp.nav',
        'jaoApp.battle',
        'jaoApp.shop'
    ]).config(setInterpolation);

    function setInterpolation($interpolateProvider){
        $interpolateProvider.startSymbol('//');
        $interpolateProvider.endSymbol('//');
    }
})();