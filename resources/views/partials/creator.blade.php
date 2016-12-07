<div class="col s10 offset-s1">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="creator-title">
                <h3 class="text-center">Welcome to J&O, You have to create your character.</h3>
            </div>
            <form method="POST" action="{{ route('player.create') }}" ng-controller="createPlayerController as player">
                {{ csrf_field() }}

                <div class="input-field col s6 offset-s3">
                    <input ng-model="player.name" type="text" name="name" id="name" maxlength="24" class="validate" required>
                    <label for="name">Character name</label>
                </div>

                <div class="input-field col s12">

                    <div class="character-creator">
                        <div class="character-creator-preview col s6">
                            <img ng-src="//player.selectedBody.image_url//">
                            <img ng-src="//player.selectedHead.image_url//">
                            <img ng-src="//player.selectedEyebrow.image_url//" >
                            <img ng-src="//player.selectedEyes.image_url//">
                            <img ng-src="//player.selectedHair.image_url//">
                            <img ng-src="//player.selectedNose.image_url//">
                            <img ng-src="//player.selectedMouth.image_url//">
                        </div>
                        <div class="character-creator-pickers col s6">

                            {{-- variants --}}
                            <h5><button type="button" ng-click="player.previousEyebrowVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Eyebrow <button type="button" ng-click="player.nextEyebrowVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                            <h5><button type="button" ng-click="player.previousHeadVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Head <button type="button" ng-click="player.nextHeadVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                            <h5><button type="button" ng-click="player.previousEyesVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Eyes <button type="button" ng-click="player.nextEyesVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                            <h5><button type="button" ng-click="player.previousHairVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Hair <button type="button" ng-click="player.nextHairVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                            <h5><button type="button" ng-click="player.previousNoseVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Nose <button type="button" ng-click="player.nextNoseVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                            <h5><button type="button" ng-click="player.previousMouthVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Mouth <button type="button" ng-click="player.nextMouthVariant()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>

                            <br>

                            {{-- colors --}}
                            <h5><button type="button" ng-click="player.previousBodyColor()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Body color <button type="button" ng-click="player.nextBodyColor()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                            <h5><button type="button" ng-click="player.previousHairColor()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Hair color <button type="button" ng-click="player.nextHairColor()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                            <h5><button type="button" ng-click="player.previousEyesColor()" class="waves-effect waves-light btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> Eyes color <button type="button" ng-click="player.nextEyesColor()" class="waves-effect waves-light btn"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></h5>
                        </div>
                    </div>
                </div>

                {{-- tymczasowo na sztywno --}}
                <input type="hidden" name="body_id" value="//player.selectedBody.id//">
                <input type="hidden" name="eyebrow_id" value="//player.selectedEyebrow.id//">
                <input type="hidden" name="head_id" value="//player.selectedHead.id//">
                <input type="hidden" name="eyes_id" value="//player.selectedEyes.id//">
                <input type="hidden" name="hair_id" value="//player.selectedHair.id//">
                <input type="hidden" name="nose_id" value="//player.selectedNose.id//">
                <input type="hidden" name="mouth_id" value="//player.selectedMouth.id//">

                <br style="clear: both;">

                <div class="col s6 offset-s3 character-creator-pickers">
                    <br>
                    <hr>
                    <button class="waves-effect waves-light btn" type="submit">Start adventure!</button>
                    <button class="waves-effect waves-light btn" type="button" ng-click="player.reset()">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>