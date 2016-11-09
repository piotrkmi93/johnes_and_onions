/**
 * Created by ckmki on 06.11.2016.
 */
(function(){
    angular.module('jaoApp', [
        'jaoApp.player'
    ]).config(setInterpolation);

    function setInterpolation($interpolateProvider){
        $interpolateProvider.startSymbol('//');
        $interpolateProvider.endSymbol('//');
    }
})();