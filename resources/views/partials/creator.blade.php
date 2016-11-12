<script src="/js/angular/playerModule/jaoApp.player.js"></script>
<script src="/js/angular/playerModule/jaoApp.player.createController.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="text-center">Welcome to J&O, You have to create your character.</h1>
                    <hr>
                    <form method="POST" action="{{ route('player.create') }}" ng-controller="createPlayerController as player">
                        {{ csrf_field() }}

                        <input class="form-control" ng-model="player.name" name="name" id="name" maxlength="255" placeholder="Type your character name" required>
                        <div class="character-creator">
                            <div class="character-creator-preview">
                                <img src="{{ asset('images/body1.png') }}">
                                <img src="{{ asset('images/head1.png') }}">
                                <img ng-src="//player.selectedEyebrow.image_url//" >
                                <img ng-src="//player.selectedEyes.image_url//">
                                <img ng-src="//player.selectedHair.image_url//">
                                <img src="{{ asset('images/nose1.png') }}">
                                <img src="{{ asset('images/mouth1.png') }}">
                            </div>
                            <div class="character-creator-pickers text-center">
                                {{-- variants --}}
                                <h3><i class="fa fa-arrow-left" aria-hidden="true"></i> Head <i class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                                <h3><i class="fa fa-arrow-left" aria-hidden="true"></i> Eyebrow <i class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                                <h3><i class="fa fa-arrow-left" aria-hidden="true"></i> Eyes <i class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                                <h3><i class="fa fa-arrow-left" aria-hidden="true"></i> Hair <i class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                                <h3><i class="fa fa-arrow-left" aria-hidden="true"></i> Nose <i class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                                <h3><i class="fa fa-arrow-left" aria-hidden="true"></i> Mouth <i class="fa fa-arrow-right" aria-hidden="true"></i></h3>

                                <hr>

                                {{-- colors --}}
                                <h3><i class="fa fa-arrow-left" aria-hidden="true"></i> Body color <i class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                                <h3><i ng-click="player.previousHairColor()" class="fa fa-arrow-left" aria-hidden="true"></i> Hair color <i ng-click="player.nextHairColor()" class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                                <h3><i ng-click="player.previousEyesColor()" class="fa fa-arrow-left" aria-hidden="true"></i> Eyes color <i ng-click="player.nextEyesColor()" class="fa fa-arrow-right" aria-hidden="true"></i></h3>
                            </div>
                        </div>

                        {{-- tymczasowo na sztywno --}}
                        <input type="hidden" name="body_id" value="1">
                        <input type="hidden" name="eyebrow_id" value="//player.selectedEyebrow.id//">
                        <input type="hidden" name="head_id" value="5">
                        <input type="hidden" name="eyes_id" value="//player.selectedEyes.id//">
                        <input type="hidden" name="hair_id" value="//player.selectedHair.id//">
                        <input type="hidden" name="nose_id" value="8">
                        <input type="hidden" name="mouth_id" value="7">

                        <hr style="clear: both;">
                        <div class="text-center">
                            <button class="btn btn-success btn-lg" type="submit">Start adventure!</button>
                            <button class="btn btn-danger btn-lg" type="button" ng-click="player.reset()">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>