<?php

$Videos = [
    '<iframe width="560" height="315" src="https://www.youtube.com/embed/kQgXAn5J7is?si=C7VCR5kz10-U2JMk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
    '<iframe width="560" height="315" src="https://www.youtube.com/embed/kava5Utm9mU?si=oY_r4TbXlRoLgKCc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',

    ];
function RandomVideo(array $Videos):string
{
    $number = rand(0, count($Videos)-1);
    return $Videos[$number];
}


function VideoByID (int $id, array $Videos):string
{
    return $Videos[$id];
}