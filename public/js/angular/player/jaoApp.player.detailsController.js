/**
 * Created by ckmki on 19.11.2016.
 */

(function () {
    angular
        .module('jaoApp.player')
        .controller('playerDetailsController', ['$scope', '$rootScope', '$http', playerDetailsController]);

    function playerDetailsController($scope, $rootScope, $http) {
        var self = this;

        self.userId = null;
        self.canDropItem = canDropItem;
        self.dragStart = dragStart;
        self.drop = drop;

        self.abilityToEvade = abilityToEvade;
        self.magicResistance = magicResistance;
        self.hitPoints = hitPoints;
        self.criticalChance = criticalChance;

        self.increase = increase;

        self.minDamage = sumMinDamage;
        self.maxDamage = sumMaxDamage;

        self.fromBackpack = null;
        self.toBackpack = null;

        function drop(event, ui, toBackpack, backpackPosition) {
            if (self.fromBackpack === toBackpack) {
                $http.post('/api/player/get', {id: self.userId})
                    .then(refreshValues);

                self.fromBackpack = null;
                self.toBackpack = null;
                self.itemDragged = null;
                return;
            }

            var backpackJson = null;
            var slotJson = null;

            var scope = ui.draggable.scope();
            if (self.fromBackpack) {
                var parameters = {
                    user_id: self.id,
                    backpack_item_id: self.backpackId
                };

                backpackJson = JSON.stringify(parameters);
                if (scope.dndDropItem){
                    var parameters = {
                        user_id: self.id,
                        item_id: scope.dndDropItem.id
                    };

                    slotJson = JSON.stringify(parameters);
                }
            } else {
                var parameters = {
                    user_id: self.id,
                    item_id: self.itemDragged.id
                };

                slotJson = JSON.stringify(parameters);
                if (scope.dndDropItem){

                    var parameters = {
                        user_id: self.id,
                        backpack_item_id: self.backpack.items[backpackPosition].id
                    };

                    backpackJson = JSON.stringify(parameters);
                }
            }
            if (slotJson)
                $http.post('/api/player/put', slotJson)
                    .then(function (response) {
                        if (backpackJson)
                            $http.post('/api/player/set', backpackJson)
                                .then(refreshValues);
                        else
                            refreshValues(response);
                    });
            else
                $http.post('/api/player/set', backpackJson)
                    .then(refreshValues);

            self.fromBackpack = null;
            self.toBackpack = null;
            self.itemDragged = null;
        }

        function increase(type) {
            var parameters = {
                user_id: self.id,
                attribute: type
            };
            var json = JSON.stringify(parameters);
            $http.post('/api/player/increment', json)
                .then(refreshValues)
        }

        function refreshValues(response) {
            self.level = response.data.player.character.level;
            self.strength_points = response.data.player.character.strength_points;
            self.dexterity_points = response.data.player.character.dexterity_points;
            self.intelligence_points = response.data.player.character.intelligence_points;
            self.durability_points = response.data.player.character.durability_points;
            self.luck_points = response.data.player.character.luck_points;

            self.helmet  = response.data.player.helmet;
            self.armor  = response.data.player.armor;
            self.gloves  = response.data.player.gloves;
            self.boots  = response.data.player.boots;
            self.weapon = response.data.player.weapon;
            self.necklace  = response.data.player.necklace;
            self.ring  = response.data.player.ring;
            self.accessory  = response.data.player.accessory;
            self.belt  = response.data.player.belt;
            self.shield  = response.data.player.shield;

            self.backpack = response.data.player.backpack;

            $scope.$emit("goldChange", response.data.player.amount_of_gold)
        }

        function abilityToEvade() {
            return calculateDexterity() / 2;
        }

        function magicResistance() {
            return calculateIntelligence() / 2;
        }

        function hitPoints() {
            return calculateDurability() * 5 * (self.level + 1);
        }

        function criticalChance() {
            return Math.round(calculateLuck() * 5 / (self.level * 2));
        }

        function calculateStrength() {
            return calculate('strength_points')
        }

        function calculateDexterity() {
            return calculate('dexterity_points')
        }

        function calculateIntelligence() {
            return calculate('intelligence_points')
        }

        function calculateDurability() {
            return calculate('durability_points')
        }

        function calculateLuck() {
            return calculate('luck_points')
        }

        function calculate(parameter) {
            var result = self[parameter];
            if (self.helmet)
                result += self.helmet[parameter];
            if (self.armor)
                result += self.armor [parameter];
            if (self.gloves)
                result += self.gloves[parameter];
            if (self.boots)
                result += self.boots[parameter];
            if (self.weapon)
                result += self.weapon[parameter];
            if (self.necklace)
                result += self.necklace[parameter];
            if (self.ring)
                result += self.ring[parameter];
            if (self.accessory)
                result += self.accessory[parameter];
            if (self.belt)
                result += self.belt[parameter];
            if (self.shield)
                result += self.shield[parameter];
            return result;
        }

        function sumMinDamage() {
            return Math.round(sumDamage('damage_min_points'));
        }

        function sumMaxDamage() {
            return Math.round(sumDamage('damage_max_points'));
        }

        function sumDamage(parameter) {
            return self.weapon ?
            self.weapon[parameter] * sum() :
                0;
        }

        function dragStart(event, ui, item, fromBackpack) {
            if (fromBackpack) {
                self.backpackId = Enumerable.From(self.backpack.items)
                    .Where(function (x) {
                        return x.item.id === item.id
                    })
                    .FirstOrDefault().id;
            }
            self.fromBackpack = fromBackpack;
            self.itemDragged = item;
        }

        function canDropItem(event, ui, type) {
            if (type.includes(self.itemDragged.type)) {
                return Promise.resolve();
            }
            return Promise.reject();
        }

        function sum() {
            if (!self.weapon)
                return 1;
            return self.weapon.type === 'sword' ?
            1 + calculateStrength() / 10 :
            1 + self.intelligence_points / 10;
        }

        $scope.$watch(function () {
            return self.userId
        }, function (newValue) {
            $http.post('/api/player/get', {id: newValue})
                .then(refreshValues);
        });

        window.self = self;
    }
})();
