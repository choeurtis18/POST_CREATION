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

//Test function getUsers
foreach ($users as &$user) {
    print($user->getName());
}

//Test function getUserById
var_dump($getUser1->getName());

//Test function addUser
var_dump($addUser1);
var_dump($addUser2);

//Test function updateUser
//ça fonctionne

//Test function getUserPosts

foreach($user1Posts as $post) {
    var_dump($post->getTitle());
}



?>