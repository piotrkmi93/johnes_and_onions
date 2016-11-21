/**
 * Created by ckmki on 19.11.2016.
 */

(function(){
    angular
        .module('jaoApp.player')
        .controller('playerDetailsController', ['$scope', '$http', playerDetailsController]);

    function playerDetailsController($scope, $http){
        var self = this;

        self.backpack = {
            1: {
                type: "helmet",
                item_look: {
                    image_url: "images/items/example_item.png"
                }
            },
            2: {
                type: "boots",
                item_look: {
                    image_url: "images/items/example_item.png"
                }
            }
        };

        self.userId = null;
        self.canDropItem = canDropItem;
        self.dragStart = dragStart;

        function dragStart(item, ui, item) {
            self.itemDragged = item;
        }

        function canDropItem(event, ui, type){
            if (self.itemDragged.type === type){
                self.itemDragged = null;
                return Promise.resolve();
            }
            self.itemDragged = null;
            return Promise.reject();
        }

        $scope.$watch(function(){ return self.userId }, function (newValue) {
            $http.post('/api/player/get', {id: newValue})
                .then(function(response){
                    console.log(response.data);
                    self.strength_points = response.data.player.character.strength_points;
                    self.dexterity_points = response.data.player.character.dexterity_points;
                    self.intelligence_points = response.data.player.character.intelligence_points;
                    self.durability_points = response.data.player.character.durability_points;
                    self.luck_points = response.data.player.character.luck_points;
                });
        })


        console.log(self);
    }
})();
