<h1>Welcome IN VVS Club</h1>

<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */


foreach ($posts as &$post) {
    print($post->getTitle());
    print($post->getContent());
}

?>