<?php
it('loads the main page', function (){
    $response = $this->get(route('posts.index'));

    $response->assertSuccessful();
    $response->assertSee('posts');
});

it('add new post', function (){
    $response = $this->get(route('posts.index'));

    $response->assertSuccessful();
    $response->assertSee('posts');
});


