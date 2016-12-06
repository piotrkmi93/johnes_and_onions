/**
 * Created by ckmki on 06.12.2016.
 */

(function () {
    angular
        .module('jaoApp.ranking')
        .controller('rankingController', ['$http', rankingController]);

    function rankingController($http) {
        var self = this;

        self.setPlayerId = setPlayerId;
        self.roundHealth = Math.round;

        self.hitPoints = hitPoints;
        self.calculateStrength = calculateStrength;
        self.calculateDexterity = calculateDexterity;
        self.calculateIntelligence = calculateIntelligence;
        self.calculateDurability = calculateDurability;
        self.calculateLuck = calculateLuck;

        function setPlayerId(id) {
            self.playerId = id;
            $http.post('/api/player/get/', {id: id}).then(setPlayer)
        }

        function setPlayer(response){
            var data = response.data;
            self.player = data.player;

        }

        function hitPoints() {
            if (!self.player) return;
            return calculateDurability() * 5 * (self.player.character.level + 1);
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
            return calculate('lucky_points')
        }

        function calculate(parameter) {
            if(!self.player) return;
            var result = self.player.character[parameter];
            if (self.player.helmet)
                result += self.player.helmet[parameter];
            if (self.player.armor)
                result += self.player.armor [parameter];
            if (self.player.gloves)
                result += self.player.gloves[parameter];
            if (self.player.boots)
                result += self.player.boots[parameter];
            if (self.player.weapon)
                result += self.player.weapon[parameter];
            if (self.player.necklace)
                result += self.player.necklace[parameter];
            if (self.player.ring)
                result += self.player.ring[parameter];
            if (self.player.accessory)
                result += self.player.accessory[parameter];
            if (self.player.belt)
                result += self.player.belt[parameter];
            if (self.player.shield)
                result += self.player.shield[parameter];
            return result;
        }
    }
})();