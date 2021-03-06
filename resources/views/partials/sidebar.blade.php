<div class="card-panel sidebar">
    <h4>Menu</h4>

    <a href="{{ route('player.pub') }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-beer" aria-hidden="true"></i> Pub</a>
    <a href="{{ route('player.arena') }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-bomb" aria-hidden="true"></i> Arena</a>
    <a href="{{ route('player.character') }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-user" aria-hidden="true"></i> Character</a>
    <a href="{{ route('player.work') }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-suitcase" aria-hidden="true"></i> Work</a>
    <a href="{{ route('player.shop', ['shopType' => 'armorer']) }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-shield" aria-hidden="true"></i> Armorer</a>
    <a href="{{ route('player.shop', ['shopType' => 'blacksmith']) }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-gavel" aria-hidden="true"></i> Blacksmith</a>
    <a href="{{ route('player.shop', ['shopType' => 'jeweler']) }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-diamond" aria-hidden="true"></i> Jeweler</a>
    <a href="{{ route('player.ranking') }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-line-chart" aria-hidden="true"></i> Ranking</a>
    <a href="{{ route('player.options') }}" class="waves-effect waves-light btn btn-lg"><i class="fa fa-cogs" aria-hidden="true"></i> Options</a>
</div>