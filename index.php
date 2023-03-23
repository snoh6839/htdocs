<!DOCTYPE html>
<html>

<head>
    <title>Rock, Paper, Scissors</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Gaegu:wght@300;400;700&display=swap');
        :root {
            --background-gradient: linear-gradient(30deg, #f39c12 100%, #f1c40f);
            --gray: #34495e;
            --darkgray: #2c3e50;
        }
        *{font-family: 'Gaegu', cursive; font-size: 16px;}

        select {
            /* Reset Select */
            appearance: none;
            outline: 0;
            border: 0;
            box-shadow: none;
            /* Personalize */
            flex: 1;
            padding: 0 1em;
            color: #fff;
            font-weight: bold;
            background-color: var(--darkgray);
            background-image: none;
            cursor: pointer;
            width: 5em;
            height: 3em;
            text-align: center;
            font-size: 1.2em;

        }

        /* Remove IE arrow */
        select::-ms-expand {
            display: none;
        }

        /* Custom Select wrapper */
        .select {
            position: relative;
            display: flex;
            width: 22em;
            height: 6em;
            border-radius: .25em;
            overflow: hidden;
        }

        /* Transition */
        .select:hover::after {
            color: #f39c12;
        }

        /* Other styles*/
        body {
            color: #fff;
            background: var(--background-gradient);
            background-repeat: no-repeat;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        button {
            margin-left: 1em;
            font-weight: bold;
            color: var(--gray);
            text-decoration: none;
            padding: .25em;
            border-radius: .25em;
            background: white;

        }
        h1 {
            border-bottom: 1px solid white;
            padding-bottom: 1em;
            font-size: 3em;
        }
        form {
            margin: 1em;
            font-size: 1.5em;
            display: flex;
            align-items: center;
        }
        label {
            margin-right: 1em;
            font-size: 1em;
        }
        div {
            background-color: aliceblue;
            width: 40vw;
            height: 20vh;
            color: #2c3e50;
            padding: 1em;
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <h1>가위, 바위, 보 게임을 해봅시다</h1>
    <form method="post">
        <label>당신의 무기를 고르세요:</label>
        <select name="choice">
            <option value="rock">바위</option>
            <option value="paper">보자기</option>
            <option value="scissors">가위</option>
        </select>
        <button type="submit">싸우자!</button>
    </form>

    <?php
	$user_choice = $_POST['choice'];

	function computer_choice() {
	    $choices = array("rock", "paper", "scissors");
	    $index = rand(0, 2);
	    return $choices[$index];
	}

	function determine_winner($user_choice, $computer_choice) {
	    if ($user_choice == $computer_choice) {
	        return "비겼습니다! 조금만 더 좋은 선택을 하면 이길 수 있어요.";
	    }
	    elseif($user_choice == "rock" && $computer_choice == "scissors") {
	        return "당신이 이겼습니다.";
	    }
	    elseif($user_choice == "paper" && $computer_choice == "rock") {
	        return "이겼어요!";
	    }
	    elseif($user_choice == "scissors" && $computer_choice == "paper") {
	        return "좋은 선택이네요! 당신이 이겼어요!";
	    } else {
	        return "제가 이겼네요! 다음 기회를 노려보세요";
	    }
	}

	if (!empty($user_choice)) {
	    $computer_choice = computer_choice();
	    $result = determine_winner($user_choice, $computer_choice);

	    echo "<div>당신의 선택 $user_choice.<br>";
	    echo "컴퓨터의 선택 $computer_choice.<br>";
	    echo "$result</div>";
	}
	?>
</body>

</html>


<!-- 설명
HTML 코드는 
사용자의 선택을 입력 받는 form 태그로 이루어져 있습니다.
form 태그는 사용자의 선택을 받기 위해 select 태그와 option 태그를 포함하며,
"싸우자!" 버튼으로 제출됩니다.

PHP 코드는 사용자가 선택한 옵션을 가져와서,
사용자와 컴퓨터의 선택을 비교하고 게임 결과를 반환하는 함수를 넣었습니다.

우선, $_POST['choice']를 사용하여 사용자의 선택을 가져옵니다.
그리고 computer_choice() 함수는 $choices 배열에서 무작위로 선택한 값을 반환합니다.

determine_winner() 함수는 사용자와 컴퓨터의 선택을 비교하고,
해당 결과에 따라 적절한 문자열을 반환합니다.

그리고, 만약 사용자가 선택한 옵션이 존재한다면,
컴퓨터의 선택을 구하고 determine_winner() 함수를 호출하여 게임 결과를 표시합니다.

마지막으로 echo를 사용하여 결과값을 출력했습니다.
-->