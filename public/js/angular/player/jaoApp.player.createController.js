/**
 * Created by ckmki on 06.11.2016.
 */

(function(){
    angular
        .module('jaoApp.player')
        .controller('createPlayerController', ['$http', createPlayerController]);

    function createPlayerController($http){
        var self = this;

        self.head = {};
        self.eyebrow = {};
        self.hair = {};
        self.eyes = {};
        self.nose = {};

        self.selectedHeadVariant = 1;

        self.selectedBodyColor = 1;

        self.selectedEyebrowVariant = 1;
        self.selectedHairVariant = 1;

        self.selectedHairColor = 1;

        self.selectedEyesVariant = 1;
        self.selectedEyesColor = 1;

        self.selectedNoseVariant = 1;

        self.nextEyebrowVariant = nextEyebrowVariant;
        self.previousEyebrowVariant = previousEyebrowVariant;

        self.nextHeadVariant = nextHeadVariant;
        self.previousHeadVariant = previousHeadVariant;

        self.nextEyesVariant = nextEyesVariant;
        self.previousEyesVariant = previousEyesVariant;

        self.nextNoseVariant = nextNoseVariant;
        self.previousNoseVariant = previousNoseVariant;

        self.nextBodyColor = nextBodyColor;
        self.previousBodyColor = previousBodyColor;

        self.nextHairColor = nextHairColor;
        self.previousHairColor = previousHairColor;

        self.nextEyesColor = nextEyesColor;
        self.previousEyesColor = previousEyesColor;

        self.reset = reset;

        $http.get('/api/player/get_look_variants')
            .then(function(response){return splitVariants(response.data.variants);});

        function nextNoseVariant(){
            ++self.selectedNoseVariant;

            if (self.selectedNoseVariant === 3)
                self.selectedNoseVariant = 1;

            setBodyVariants();
        }
        function previousNoseVariant(){
            --self.selectedNoseVariant;

            if (self.selectedNoseVariant === 0)
                self.selectedNoseVariant = 2;

            setBodyVariants();
        }
        function nextHeadVariant(){
            ++self.selectedHeadVariant;

            if (self.selectedHeadVariant === 3)
                self.selectedHeadVariant = 1;

            setBodyVariants();
        }
        function previousHeadVariant(){
            --self.selectedHeadVariant;

            if (self.selectedHeadVariant === 0)
                self.selectedHeadVariant = 2;

            setBodyVariants();
        }
        function nextBodyColor(){
            ++self.selectedBodyColor;

            if (self.selectedBodyColor === 10)
                self.selectedBodyColor = 1;

            setBodyVariants();
        }
        function previousBodyColor(){
            --self.selectedBodyColor;

            if (self.selectedBodyColor === 0)
                self.selectedBodyColor = 9;

            setBodyVariants();
        }
        function nextEyebrowVariant(){
            ++self.selectedEyebrowVariant;

            if (self.selectedEyebrowVariant === 3)
                self.selectedEyebrowVariant = 1;

            setHairVariants();
        }
        function previousEyebrowVariant(){
            --self.selectedEyebrowVariant;

            if (self.selectedEyebrowVariant === 0)
                self.selectedEyebrowVariant = 2;

            setHairVariants();
        }
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
        function nextEyesVariant(){
            ++self.selectedEyesVariant;

            if (self.selectedEyesVariant === 3)
                self.selectedEyesVariant = 1;

            setEyesVariants();
        }
        function previousEyesVariant(){
            --self.selectedEyesVariant;

            if (self.selectedEyesVariant === 0)
                self.selectedEyesVariant = 1;

            setEyesVariants();
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

        function setBodyVariants(){
            self.selectedHead = self.head[self.selectedHeadVariant].find(variantFinder(self.selectedBodyColor))
            self.selectedNose = self.nose[self.selectedNoseVariant][0];
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
                if (!types[i][type]) continue;
                var number = types[i][type];
                self[type][number] = variants
                    .filter(function(variant){ return getVariantType(variant, type + '_' + number);} )
                    .sort(sortByColor);
            }

            setDefaults();
        }

        function setDefaults(){
            self.selectedHead = self.head[1][0];
            self.selectedEyebrow = self.eyebrow[1][0];
            self.selectedHair = self.hair[1][0];
            self.selectedEyes = self.eyes[1][0];
            self.selectedNose = self.nose[1][0];
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
