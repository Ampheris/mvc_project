<?php

declare(strict_types=1);

namespace Ampheris\Functions;

use Ampheris\Dice\DiceHand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Functions.
 * @param string $command
 * @param Request $request
 */
function commandCheck(string $command, Request $request)
{

    /** @var DiceHand $user */
    $user = session()->get('gameUser');

    /** @var DiceHand $computer */
    $computer = session()->get('gameComputer');

    switch ($command) {
        case 'setDices':
            $number = intval($request->input('number'));
            updateUserDices($number, $user);
            break;
        case 'betting':
            $number = intval($request->input('number'));
            updateBetting($number);
            break;
        case 'throw':
            throwYourDices($user);
            break;
        case 'stop':
            computersTurn($computer);
            checkScore();
            break;
        case 'restart':
            resetGame();
            session(['gameUser' => new DiceHand()]);
            session(['gameComputer' => new DiceHand()]);
            break;
    }
}

/**
 * @param int $number
 * @param DiceHand $user
 */
function updateUserDices(int $number, DiceHand $user)
{
    session(['gameIsInitiated' => true]);
    $user->initDices(intval($number));
}

/**
 * @param int $number
 * @param DiceHand $user
 */
function updateBetting(int $number)
{
    // Sets the value of the one being bet on.
    // 0 = you, 1 = no one, 2 = computer.
    session(['gameBetOn' => $number]);

    // Adding +1 to number of bets places and +5 $ to total money betted.
    $updating = [
        'numberOfBets' => DB::raw(('numberOfBets + 1')),
        'totalMoney' => DB::raw(('totalMoney + 5'))
    ];

    // Updates the database table bets.
    DB::table('bets')
        ->where('id', 1)
        ->update($updating);
}

/**
 * @param DiceHand $user
 */
function throwYourDices(DiceHand $user)
{
    session(['gameDiceThrown' => true]);
    $user->rollAllDices();
    $user_score = session()->get('gameUserScore');
    session(['gameUserScore' => $user_score + $user->getAllRolledValues()]);
}

/**
 * @param DiceHand $user
 */

function generateHTML(DiceHand $user): string
{
    $arrList = $user->getGraphicDices();
    $result = '';

    foreach ($arrList as $dice) {
        $result .= '<i class="dice-sprite ' . $dice . '"></i>';
    }
    return $result;
}

function checkScore()
{
    $userScore = session()->get('gameUserScore');
    $computerScore = session()->get('gameComputerScore');

    if ($userScore == 21 or ($userScore < 21 and $computerScore > 21)) {
        session(['gameWinner' => 'User']);
        if ($userScore == 21) {
            // Updates the database table highscores Dice 21 score highscore aka number of wins.
            DB::table('highscores')
                ->where('id', 1)
                ->update([
                    'score' => DB::raw(('score + 1')),
                    'won' => DB::raw(('won + 1')),
                    'played' => DB::raw(('played + 1'))
                    ]);
            checkBet(0);
        }
    }

    // If computer has score 21 it wins, even if user got 21 in score.
    if ($computerScore == 21) {
        session(['gameWinner' => 'Computer']);
        checkBet(2);
    }

    if ($computerScore > 21 and $userScore > 21) {
        session(['gameWinner' => 'NoWinner']);
        checkBet(1);
    }
}

/**
 * @param int $num
 * Checks if the bet is won or not and updates the database with correct values.
 */
function checkBet(int $num) {
    $bettedOn = session()->get('gameBetOn');

    if ($bettedOn == $num) {
        DB::table('bets')
            ->where('id', 1)
            ->update([
                'money' => DB::raw(('money + 5'))
            ]);
        // if bet is lost
    } else {
        DB::table('bets')
            ->where('id', 1)
            ->update([
                'money' => DB::raw(('money - 5')),
                'moneyLost' => DB::raw('moneyLost - 5')
            ]);
    }
}

function resetGame()
{
    session()->increment('gameGameRounds');
    session(['gameUserScore' => 0]);
    session(['gameComputerScore' => 0]);
    session(['gameIsInitiated' => false]);
    session(['gameWinner' => 'None']);
    session(['gameDiceThrown' => false]);

}

/**
 * @param DiceHand $computer
 */
function computersTurn(DiceHand $computer)
{

    //Init computer with 1 dice
    $computer->initDices(1);

    // Run while computer is not stopped.
    while (true) {
        $computerScore = session()->get('gameComputerScore');

        if ($computerScore < 21) {
            $computer->rollAllDices();
            session(['gameComputerScore' => $computerScore + $computer->getAllRolledValues()]);
        }

        if ($computerScore > 21 or $computerScore == 21) {
            break;
        }
    }
}
