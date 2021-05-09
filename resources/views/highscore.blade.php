{{--Page for the highscores, has no specific controller connected
to it but a direct connection to a database table--}}
@extends('base')

@section('title', 'Highscore')

@section('content')
    <h1>Highscore</h1>
    <p>
        <?php if ($Dice21['score'] != 0) {?>
        You have won {{$Dice21['score']}} times on Dice 21!
        <?php } else { ?>
        No highscores yet on Dice 21!
        <?php }?>
    </p>
@endsection
