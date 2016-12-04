/**
 * Created by ckmki on 03.12.2016.
 */

(function () {
    angular
        .module('jaoApp.shop')
        .controller('shopController', ['$scope', '$http', navController]);

    function navController($scope, $http) {
        var self = this;

        self.armorer = [
            'sword',
            'wand',
            'shield',
        ];

        self.blacksmith = [
            'helmet',
            'armor',
            'gloves',
            'belt',
            'boots',
        ];

        self.jeweler = [
            'necklace',
            'ring',
            'accessory',
        ];

        self.init = init;
        self.dragItem = dragItem;
        self.sellItem = sellItem;
        self.buyItem = buyItem;

        function buyItem() {
            var json = {
                player_id: self.player.id,
                shop_id: self.shop.id,
                backpack_item_id: self.dragged.id
            }
            json = JSON.stringify(json);
            $http.post('/api/shop/buy/', json)
                .then(function (response) {
                    $http.post('/api/player/get', {id: self.player.id})
                        .then(function (response) {
                            $scope.$emit("goldChange", response.data.player.amount_of_gold);
                            self.player = response.data.player;
                        });
                    var json = {
                        player_id: self.player.id,
                        shop_type: self.shop.type
                    }
                    json = JSON.stringify(json);
                    $http.post('/api/shop/get', json)
                        .then(function (response) {
                            self.shop = response.data.shop;
                        });
                });
            self.dragged = null;
            return $.Deferred().reject();
        }

        function sellItem() {
            if (self[self.shop.type].indexOf(self.dragged.item.type) !== -1) {
                $scope.$apply(function () {
                    var json = {
                        player_id: self.player.id,
                        backpack_item_id: self.dragged.id
                    }
                    json = JSON.stringify(json);
                    $http.post('/api/shop/sell', json)
                        .then(function (response) {
                        var index = self.player.backpack.items.indexOf(self.dragged);
                        self.player.backpack.items.splice(index, 1);
                        $http.post('/api/player/get', {id: self.player.id})
                            .then(function (response) {
                                $scope.$emit("goldChange", response.data.player.amount_of_gold);
                            })
                    });
                });
            }
            self.dragged = null;
            return $.Deferred().reject();
        }

        function dragItem(event, ui, item) {
            self.dragged = item
        }

        function init(player, shop) {
            self.player = player;
            self.shop = shop;
        }
    };

})();