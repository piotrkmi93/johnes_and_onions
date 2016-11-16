@extends('layouts.app')

@section('content')

    <div class="card-panel">
        <h4>Options</h4>

        <hr>

        <div class="row">
            <div class="col s6">

                <div class="card-panel">
                    <h5>Change password</h5>

                    <form>

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

                        <button type="submit" class="btn waves-effect">Confirm</button>

                    </form>
                </div>

            </div>

            <div class="col s6">

                <div class="card-panel">
                    <h5>Change character name</h5>

                    <form>

                        <div class="input-field">
                            <input type="text" maxlength="24" name="name" id="name" class="validate" required>
                            <label for="name">{{ getPlayer()->character->name }}</label>
                        </div>

                        <button type="submit" class="btn waves-effect">Confirm</button>

                    </form>
                </div>

            </div>
        </div>




    </div>

@endsection
