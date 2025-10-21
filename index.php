<?php

use App\Controllers\ArticlesController;
use App\Model\Articles;
use App\Views\ArticlesView;


require __DIR__.'/vendor/autoload.php';
require_once './config/settings.php';

$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//    error_reporting(E_ALL);
//    ini_set('display_errors', 'on');

    $articles = new Articles();
    $articles_view = new ArticlesView();
    $articles_controller = new ArticlesController($articles, $articles_view);

    $uri = $_SERVER['REQUEST_URI'];
    switch ($uri)
    {
        case "/":
            $articles_controller->showArticlesList();
            break;

        default:
            echo $uri;
            break;
    }
?>


<?php //include_once('./templates/header.php') ?>
<!--        <header>-->
<!--            <h1>Элементарные частицы</h1>-->
<!--        </header>-->
<!---->
<!--        <div class="container">-->
<!--            <main>-->
<!--                <article>-->
<!--                    <p>Элемента́рная части́ца — собирательный термин, относящийся к микрообъектам в субъядерном масштабе, которые на данный момент на практике невозможно расщепить на составные части.</p>-->
<!--                    <img src="Standard_Model_of_Elementary_Particles_ru.png">-->
<!--                    <p>Следует иметь в виду, что некоторые элементарные частицы (электрон, нейтрино, кварки и т. д.) на данный момент считаются бесструктурными и рассматриваются как первичные фундаментальные частицы. Другие элементарные частицы (так называемые составные частицы, в том числе частицы, составляющие ядро атома — протоны и нейтроны) имеют сложную внутреннюю структуру, но тем не менее, по современным представлениям, разделить их на части невозможно по причине эффекта конфайнмента.</p>-->
<!--                    <p>Всего вместе с античастицами открыто более 350 элементарных частиц. Из них стабильны фотон, электронное и мюонное нейтрино, электрон, протон и их античастицы. Остальные элементарные частицы самопроизвольно распадаются по экспоненциальному закону с постоянной времени от приблизительно 880 секунд (для свободного нейтрона) до ничтожно малой доли секунды (от 10<sup>-24</sup> до 10<sup>-22</sup> с для резонансов).</p>-->
<!--                    <p>Строение и поведение элементарных частиц изучается физикой элементарных частиц. </p>-->
<!--                </article>-->
<!--            </main>-->
<!---->
<!--            --><?php //include_once('./templates/navigation.php') ?>
<!--        </div>-->
<?php //include_once('./templates/footer.php') ?>