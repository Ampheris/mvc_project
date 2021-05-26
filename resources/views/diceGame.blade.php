@extends('base')

<?php
namespace Ampheris\Dice;

use function Ampheris\Functions\generateHTML;

// Session values
$userInit = new DiceHand();
$computer = new DiceHand();


if (session()->missing('gameUser')) {
    session(['gameIsInitiated' => false]);
    session(['gameUser' => $userInit]);
    session(['gameUserScore' => 0]);
    session(['gameWinner' => 'None']);
    session(['gameComputer' => $computer]);
    session(['gameIsInitiated' => false]);
    session(['gameGameRounds' => 0]);
    session(['gameDiceThrown' => false]);
    session(['gameComputerScore' => 0]);
    session(['gameHighscore' => 0]);
    session(['gameBetOn' => '']);
}

/**
 * @param DiceHand $user
 */
$user = session()->get('gameUser');

?>
@section('content')
    <h1>Dice 21 Game, round <?= session()->get('gameGameRounds'); ?></h1>
    <?php if (session()->get('gameIsInitiated') == false and session()->get('gameBetOn') == '') { ?>
    <h2>Bet $5! Who will win?</h2>
    <button class="betting btn btn-outline-warning" value="0">You</button>
    <button class="betting btn btn-outline-warning" value="1">No one</button>
    <button class="betting btn btn-outline-warning" value="2">Computer</button>
    <h2>Choose 1 or 2 dices</h2>
    <button class="num-dices btn btn-outline-warning" value="1">One dice</button>
    <button class="num-dices btn btn-outline-warning" value="2">Two dices</button>
    <?php } ?>

    <?php if (session()->get('gameWinner') == 'None' && session()->get('gameIsInitiated') == true) { ?>
    <h2>Throw your dice/dices!</h2>
    <?php if (session()->get('gameDiceThrown') == true) { ?>
    <p>Dice(s) thrown:</p>
    <p>
        <?= generateHTML($user); ?>
    </p>
    <?php } ?>
    <p>Your current score: <?= session()->get('gameUserScore'); ?></p>
    <button id="throw-dices" class="btn btn-outline-warning">Throw dice/dices</button>
    <button id="stop" class="btn btn-outline-warning">Stop</button>
    <?php } ?>

    <?php if (session()->get('gameWinner') != 'None') { ?>
    <h2>Game completed!</h2>
    <p>Your score: <?= session()->get('gameUserScore') ?></p>
    <p>Computers score: <?= session()->get('gameComputerScore') ?></p>
    <?php if (session()->get('gameWinner') == 'User') { ?>
    <p>Congratulations, you have won the round!</p>
    <?php } elseif (session()->get('gameWinner') == 'Computer') { ?>
    <p>Sorry, the computer have won the round!</p>
    <?php } elseif (session()->get('gameWinner') == 'NoWinner') { ?>
    <p>Sorry, no one has won the round!</p>
    <?php } ?>
    <button id="restart" class="btn btn-outline-warning">Restart</button>
    <?php } ?>

    <script type="text/javascript">
        $('.num-dices').click(function () {
            const num = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{url('/diceGame/updateSession')}}',
                data: {'command': 'setDices', 'number': parseInt(num)},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function () {
                    location.reload();
                }
            });
        });

        $('.betting').click(function () {
            const num = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{url('/diceGame/updateSession')}}',
                data: {'command': 'betting', 'number': parseInt(num)},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function () {
                    location.reload();
                }
            });
        });

        $('#throw-dices').click(() => {
            $.ajax({
                type: 'POST',
                url: '{{url('/diceGame/updateSession')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'command': 'throw'},
                success: function () {
                    location.reload();
                }
            });
        });

        $('#stop').click(() => {
            $.ajax({
                type: 'POST',
                url: '{{url('/diceGame/updateSession')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'command': 'stop'},
                success: function () {
                    location.reload();
                }
            });
        });

        $('#restart').click(() => {
            $.ajax({
                type: 'POST',
                url: '{{url('/diceGame/updateSession')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'command': 'restart'},
                success: function () {
                    location.reload();
                }
            });
        });
    </script>
@endsection
