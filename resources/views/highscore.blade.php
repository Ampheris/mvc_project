{{--Page for the highscores, has no specific controller connected
to it but a direct connection to a database table--}}
@extends('base')

@section('title', 'Highscore')

@section('content')
    <h1>Highscore</h1>
    <p>
        <?php if ($Dice21['score'] != 0) {?>
        You have won {{$Dice21['score']}} out of {{$Dice21['played']}} times on Dice 21.
        <?php } else { ?>
        No highscores yet on Dice 21!
        <?php }?>
    </p>

    <?php if ($Dice21['score'] != 0) {?>
    <br>
    <h3>Dice 21 Betting</h3>
    <p class="lead"> You have betted {{$Bets['numberOfBets']}} times</p>
    <div class="card-body d-flex justify-content-around flex-wrap">
        <div>
            <h2 class="display-3">${{$Dice21['score'] * 10}}</h2>
            <p class="p-0">Money won</p>
        </div>

        <div>
            <h2 class="display-3">${{$Bets['money']}}</h2>
            <p class="p-0">Current money</p>
        </div>

        <div>
            <h2 class="display-3">${{$Bets['moneyLost']}}</h2>
            <p class="p-0">Money lost</p>
        </div>
    </div>
    <?php }?>
@endsection
