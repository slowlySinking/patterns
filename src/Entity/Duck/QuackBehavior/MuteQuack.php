<?php

class MuteQuack implements QuackBehaviorInterface
{
    public function quack()
    {
        return 'I can\'t quack. Just keep silent!';
    }
}