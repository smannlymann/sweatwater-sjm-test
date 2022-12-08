<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

print '<link rel="stylesheet" href="global.css">';

$commentList = \query\SweatwaterTestQuery::getClassifiedCommentList();

print '<h1>Comment List</h1>';

print '<div>';
print '<p class="floating-row column-heading" style="width: 100px;">Order ID</p>';
print '<p class="floating-row column-heading" style="width: 500px;">Comment</p>';
print '<p class="floating-row column-heading" style="width: 100px;">Shipdate Expected</p>';
print '<p class="floating-row column-heading" style="width: 100px;">Classification</p>';
print '</div>';

/** @var \model\SweatwaterTest $comment */
foreach ($commentList as $comment) {
    print '<div>';
    print '<p class="floating-row" style="width: 100px;">' . $comment->getOrderId() . '</p>';
    print '<p class="floating-row" style="width: 500px;">' . $comment->getComments() . '</p>';
    print '<p class="floating-row" style="width: 100px;">' . $comment->getShipdateExpected() . '</p>';
    print '<p class="floating-row" style="width: 100px;">' . $comment->getClassification() . '</p>';
    print '</div>';
}