/**
 * Created by ckmki on 19.11.2016.
 */

(function(){
    angular
        .module('jaoApp.player')
        .controller('playerDetailsController', ['$http', playerDetailsController]);

    function playerDetailsController($http){
        var self = this;

        self.backpack = {
            1: {
                type: "shield",
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

        // self.canDropItem = canDropItem;
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
        console.log(self);
    }
})();
