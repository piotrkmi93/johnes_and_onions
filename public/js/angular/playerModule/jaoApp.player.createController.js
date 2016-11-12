/**
 * Created by ckmki on 06.11.2016.
 */

(function(){
    angular
        .module('jaoApp.player')
        .controller('createPlayerController', ['$http', createPlayerController]);

    function createPlayerController($http){
        var self = this;

        self.eyebrow = {};
        self.hair = {};
        self.eyesArray = {};

        self.selectedEyebrowVariant = 1;
        self.selectedHairVariant = 1;

        self.selectedHairColor = 1;

        self.selectedEyesVariant = 1;
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
            self.selectedEyebrow = self.eyebrow[self.selectedEyebrowVariant].find(variantFinder(self.selectedHairColor))
            self.selectedHair = self.hair[self.selectedHairVariant].find(variantFinder(self.selectedHairColor))
        }

        function setEyesVariants(){
            self.selectedEyes = self.eyes[self.selectedEyesVariant].find(variantFinder(self.selectedEyesColor))
        }

        function splitVariants(variants){
            var types = Enumerable.From(variants)
                .Distinct(function(x){return x.type})
                .Select(getVariantTypes)
                .ToArray();

            for(var i = 0; i < types.length; ++i){
                var type = Object.keys(types[i])[0];
                if (!types[i][type]) continue;  // TODO Wywalić
                var number = types[i][type];
                self[type] = [];
                self[type][number] = variants
                    .filter(function(variant){ return getVariantType(variant, type + '_' + number);} )
                    .sort(sortByColor);

            }

            setDefaults();
        }

        function setDefaults(){
            self.selectedEyebrow = self.eyebrow[1][0];
            self.selectedHair = self.hair[1][0];
            self.selectedEyes = self.eyes[1][0];
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

        function getVariantTypes(variant){
            var array = variant.type.split('_');
            var result = {};
            result[array[0]] = array[1];
            return result;
        }
    }
})();
