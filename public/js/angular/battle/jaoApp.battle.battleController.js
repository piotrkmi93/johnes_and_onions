/**
 * Created by ckmki on 30.11.2016.
 */

(function () {
    angular
        .module('jaoApp.battle')
        .controller('battleController', ['$scope', '$http', '$timeout', battleController]);

    function battleController($scope, $http, $timeout) {
        var self = this;

        self.init = init;
        self.init2 = init2;
        self.roundHealth = Math.round;

        // self.time = 500;

        function battle() {
            for (var i = 0; i < self.stages.length; ++i) {
                $timeout(function (i) {
                    var stage = self.stages[i];
                    if (stage.defender === self.player1.character.name) {
                        $scope.$apply(function () {
                            self.player1.health -= stage.attack_value;
                            if (self.player1.health < 0)
                                self.player1.health = 0;
                        });
                    } else {
                        $scope.$apply(function () {
                            self.player2.health -= stage.attack_value;
                            if (self.player2.health < 0)
                                self.player2.health = 0;
                        });
                    }
                }, 10 * (i + 1), false, i);
            }
        }

        function init2(hp1, hp2) {
            self.player1 = {
                health: hp1
            };

            if (hp2)
                self.player2 = {
                    health: hp2
                };
        }

        function init(stages, player1, player2, userId) {
            self.player1 = player1;
            self.player2 = player2;

            self.player1.health = calculateDurability(player1) * 5 * (self.player1.character.level + 1);
            self.player2.health = calculateDurability(player2) * 5 * (self.player2.character.level + 1);

            self.stages = stages;

            battle();

            var json = {
                user_id: userId
            };
            json = JSON.stringify(json);
            $http.post('/api/player/quest/delete', json);
        }

        function calculateDurability(player) {
            return calculate('durability_points', player)
        }

        function calculate(parameter, player) {
            var result = player.character[parameter];
            if (player.helmet)
                result += player.helmet[parameter];
            if (player.armor)
                result += player.armor [parameter];
            if (player.gloves)
                result += player.gloves[parameter];
            if (player.boots)
                result += player.boots[parameter];
            if (player.weapon)
                result += player.weapon[parameter];
            if (player.necklace)
                result += player.necklace[parameter];
            if (player.ring)
                result += player.ring[parameter];
            if (player.accessory)
                result += player.accessory[parameter];
            if (player.belt)
                result += player.belt[parameter];
            if (player.shield)
                result += player.shield[parameter];
            return result;
        }

        console.log(self);
    };

})();