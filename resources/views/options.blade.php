@extends('layouts.app')

@section('content')

    <div class="card-panel">
        <h4>Options</h4>

        <hr>

        <div class="row">
            <div class="col s6">

                <div class="card-panel">
                    <h5><i class="fa fa-key" aria-hidden="true"></i> Change password</h5>

                    <form method="POST" action="{{ route('player.options.password') }}">

                        @if(isset($p_success) && isset($p_info))
                            @if($p_success)
                                <div class="card-panel teal lighten-2"><i class="fa fa-check" aria-hidden="true"></i> {{ $p_info }}</div>
                            @else
                                <div class="card-panel red lighten-1"><i class="fa fa-times" aria-hidden="true"></i> {{ $p_info }}</div>
                            @endif
                        @endif

                        {{ csrf_field() }}

                        <div class="input-field">
                            <input type="password" name="current_password" id="current_password" class="validate" required>
                            <label for="current_password">Enter current password</label>
                        </div>

                        <div class="input-field">
                            <input type="password" name="password" id="password" class="validate" required>
                            <label for="password">New password</label>
                        </div>

                        <div class="input-field">
                            <input type="password" name="confirm_password" id="confirm_password" class="validate" required>
                            <label for="confirm_password">Confirm new password</label>
                        </div>

                        <button type="submit" class="btn waves-effect"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>

                    </form>
                </div>

            </div>

            <div class="col s6">

                <div class="card-panel">
                    <h5><i class="fa fa-id-card-o" aria-hidden="true"></i> Change character name</h5>

                    <form method="post" action="{{ route('player.options.name') }}">

                        @if(isset($n_success) && isset($n_info))
                            @if($n_success)
                                <div class="card-panel teal lighten-2"><i class="fa fa-check" aria-hidden="true"></i> {{ $n_info }}</div>
                            @else
                                <div class="card-panel red lighten-1"><i class="fa fa-times" aria-hidden="true"></i> {{ $n_info }}</div>
                            @endif
                        @endif

                        {{ csrf_field() }}

                        <div class="input-field">
                            <input type="text" maxlength="24" name="name" id="name" class="validate" required>
                            <label for="name">{{ getPlayer()->character->name }}</label>
                        </div>

                        <button type="submit" class="btn waves-effect"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>

                    </form>
                </div>

                <div class="card-panel">
                    <h5><i class="fa fa-trash" aria-hidden="true"></i> Delete account</h5>

                    {{-- TODO --}}
                    {{--{{ route('player.options.delete') }}--}}
                    <form method="post" action="#">

                        {{ csrf_field() }}
                        <button type="submit" class="btn red waves-effect"><i class="fa fa-trash" aria-hidden="true"></i> Delete all data</button>

                    </form>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col s12">

                <div class="card-panel">
                    <h5><i class="fa fa-info" aria-hidden="true"></i> Change description</h5>

                    <form method="post" action="{{ route('player.options.description') }}">

                        @if(isset($d_success) && isset($d_info))
                            @if($d_success)
                                <div class="card-panel teal lighten-2"><i class="fa fa-check" aria-hidden="true"></i> {{ $d_info }}</div>
                            @else
                                <div class="card-panel red lighten-1"><i class="fa fa-times" aria-hidden="true"></i> {{ $d_info }}</div>
                            @endif
                        @endif

                        {{ csrf_field() }}

                        <div class="input-field">
                            <textarea maxlength="255" name="description" id="description" class="validate materialize-textarea" required>{{ getPlayer()->description }}</textarea>
                            <label for="textarea1">Description</label>
                        </div>

                        <button type="submit" class="btn waves-effect"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>

                    </form>
                </div>

            </div>

        </div>




    </div>

@endsection
