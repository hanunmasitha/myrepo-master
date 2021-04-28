<?php

use yii\bootstrap\Carousel;
use yii\bootstrap\Collapse;
$this->title = 'Demo Widget - Carousel & Collapse';

?>

<h1>Demo Widget</h1>

<p>Berikut ini contoh penggunaan <i>widget</i> Carousel di Yii2:</p>

<?php

echo Carousel::widget([
    'items' => [
        [
            'content' => 'Ini adalah slider - 1',
            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
        ],
        [
            'content' => 'Ini adalah slider - 2',
            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
        ],
        [
            'content' => 'Ini adalah slider - 3',
            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
        ],
    ]
]);

?>

<br />
<br />

<p>Berikut ini contoh penggunaan <i>widget</i> Collase di Yii2:</p>

<?php

echo Collapse::widget([
    'items' => [
        [
            'label' => 'Item #1',
            'content' => 'Lorem ipsum sit dolor amet - 1...',
        ],
        [
            'label' => 'Item #2',
            'content' => 'Lorem ipsum sit dolor amet - 2...',
        ],
        [
            'label' => 'Item #3',
            'content' => 'Lorem ipsum sit dolor amet - 3...',
        ]
    ]
]);

?>