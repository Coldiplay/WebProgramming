<?php include_once ('./templates/header.php') ?>
    <header>
        <h1>Калькулятор</h1>
    </header>

    <div class="container">
        <main>
            <div>
                <form method="post">
                    <input name="num1" type="number" required>
                    <select name="action" required>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                        <option value="√">√</option>
                        <option value="^">^</option>
                    </select>
                    <input name="num2" type="number" required>
                    <button type="submit">Рассчитать</button>
                </form>

                <?php include_once ('scripts/calculate.php')
//                if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                    $num1 = $_POST["num1"];
//                    $num2 = $_POST["num2"];
//                    $action = $_POST["action"];
//
//                    $massive = calc($num1, $num2, $action);
//                    $result = "$massive[1] = $massive[0]";
//
//                    echo "<h3>$result</h3>";
//
//                    $historyFile = "history.txt";
//                    $historyData = date('Y-m-d H:i:s') . "\t$result\n";
//                    file_put_contents($historyFile, $historyData, FILE_APPEND);
//                }
                ?>

                <?php
                if(file_exists("history.txt"))
                {
                    $history = file_get_contents("history.txt");
                    echo "<h3>История операций</h3>";
                    echo '<form method="post" action="scripts/clearHistory.php"><button type="submit">Очистить историю</button></form>';
                    echo "<pre>$history</pre>";
                }
                ?>
            </div>
        </main>

        <?php include_once('./templates/navigation.php') ?>
    </div>

<?php include_once('./templates/footer.php') ?>
