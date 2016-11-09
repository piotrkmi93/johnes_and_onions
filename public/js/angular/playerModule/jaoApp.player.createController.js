/**
 * Created by ckmki on 06.11.2016.
 */

(function(){
    angular
        .module('jaoApp.player')
        .controller('createPlayerController', ['$http', createPlayerController]);

    function createPlayerController($http){
        var self = this;

        var eyebrows = [];
        var hairs = [];
        var eyes = [];

        self.selectedEyebrowVariant = 0;
        self.selectedHairVariant = 0;

        self.selectedHairColor = 1;

        self.selectedEyesVariant = 0;
        self.selectedEyesColor = 1;

        self.nextHairColor = nextHairColor;
        self.previousHairColor = previousHairColor;

        self.nextEyesColor = nextEyesColor;
        self.previousEyesColor = previousEyesColor;

        self.reset = reset;

        $http.get('/api/player/get_look_variants')
            .then(function(response){return splitVariants(response.data.variants);});

        function nextHairColor(){
            ++self.selectedHairColor;

            if (self.selectedHairColor === 10)
                self.selectedHairColor = 1;

            setHairVariants();
        }
        function previousHairColor(){
            --self.selectedHairColor;

            if (self.selectedHairColor === 0)
                self.selectedHairColor = 9;

            setHairVariants();
        }
        function nextEyesColor(){
            ++self.selectedEyesColor;

            if (self.selectedEyesColor === 9)
                self.selectedEyesColor = 1;

            setEyesVariants();
        }
        function previousEyesColor(){
            --self.selectedEyesColor;

            if (self.selectedEyesColor === 0)
                self.selectedEyesColor = 8;

            setEyesVariants();
        }

        function setHairVariants(){
            self.eyebrow = eyebrows[self.selectedEyebrowVariant].find(variantFinder(self.selectedHairColor))
            self.hair = hairs[self.selectedHairVariant].find(variantFinder(self.selectedHairColor))
        }

        function setEyesVariants(){
            self.eyes = eyes[self.selectedEyesVariant].find(variantFinder(self.selectedEyesColor))
        }

        function splitVariants(variants){
            eyebrows.push(variants
                .filter(function(variant){ return getVariantType(variant, 'eyebrow_1');} )
                .sort(sortByColor));

            hairs.push(variants
                .filter(function(variant){ return getVariantType(variant, 'hair_1');} )
                .sort(sortByColor));

            eyes.push(variants
                .filter(function(variant){ return getVariantType(variant, 'eyes_1');} )
                .sort(sortByColor));

            setDefaults();
        }

        function setDefaults(){
            self.eyebrow = eyebrows[0][0];
            self.hair = hairs[0][0];
            self.eyes = eyes[0][0];
        }

        function reset(){
            setDefaults();
            self.name = '';
        }

        function variantFinder(colorId){
            return function (variant) {
                return variant.look_variant_color.id === colorId;
            }
        }

        function getVariantType(variant, type) {
            return variant.type === type;
        }

        function sortByColor(v1, v2){
            return v1.look_variant_color_id - v2.look_variant_color_id;
        }
    }
})();
