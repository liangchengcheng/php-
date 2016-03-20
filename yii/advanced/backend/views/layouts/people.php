<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>test</h1>
<ul>

    <?php foreach($people as $val) :?>
        <li>
            <?php echo $val->name;?>
        </li>
    <?php endforeach;?>
</ul>

<?= LinkPager::widget(['pagination'=>$pagination])?>