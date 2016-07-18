<html>
    <body>
        <div>
            <?php
                /* 
                 * To change this template, choose Tools | Templates
                 * and open the template in the editor.
                 */

                include_once dirname(__DIR__).DIRECTORY_SEPARATOR.'/hfbase/headflow'.DIRECTORY_SEPARATOR.'HeadFlow.php';

                $hf = new \headflow\HeadFlow();
                $hf->setDebug(true);
                $hf->initialize();

                $giz = new \headflow\core\widget\base\Image();

                $giz->setAltText('Test');
                $giz->setTitle('Test Title');
                $giz->setImagePath('sea.jpg');

                $giz3 = new \headflow\core\widget\base\Image();

                $giz3->setAltText('3');
                $giz3->setTitle('3');
                $giz3->setImagePath('Arches.jpg');

                $giz4 = new \headflow\core\widget\layout\GridLayout();
                $giz4->addChild($giz3);


                $giz2 = new \headflow\core\widget\layout\GridLayout();
                $giz2->addChild($giz);

                $giz2->addChild($giz4);

                $widgetMan =  \slinks\Slinks::getInstance()->getService('headflowWidgetRenderer');

                $widgetMan->echoTokenStream($giz2);
                echo "*******************************************************<br><br>";
                $widgetMan->echoNodes($giz2);
            ?>
        </div>
    </body>
</html>
