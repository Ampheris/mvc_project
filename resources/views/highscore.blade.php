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
    <h3>Dice 21 Betting</h3>
    <p class="lead"> You have betted {{$Bets['numberOfBets']}} times</p>
    <dl class="row">
        <dt class="col-sm-3">Total money bet:</dt>
        <dd class="col-sm-9">{{$Bets['totalMoney']}}</dd>

        <dt class="col-sm-3">Money won:</dt>
        <dd class="col-sm-9"><?php $Bets['totalMoney'] - $Bets['moneyLost'] ?></dd>

        <dt class="col-sm-3">Money lost:</dt>
        <dd class="col-sm-9">{{$Bets['moneyLost']}}</dd>

    </dl>
    <?php }?>
@endsection
