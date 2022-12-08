<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

print '<link rel="stylesheet" href="global.css">';

$commentList = \query\SweatwaterTestQuery::getCommentList();

/** @var \model\SweatwaterTest $comment */
foreach ($commentList as $comment) {
    print '<div>';
    print '<p class="floating-row">' . $comment->getOrderId() . '</p>';
    print '<p class="floating-row">' . $comment->getComments() . '</p>';
    print '<p class="floating-row">' . $comment->getShipdateExpected() . '</p>';
    print '</div>';
}