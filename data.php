<?php
$posts = [
    [
        "id" => 1301,
        "title" => "First Blog Post", 
        "content" => "Content of the first blog post"
    ],
    [
        "id" => 1302, 
        "title" => "Second Blog Post", 
        "content" => "Content of the second blog post"
    ],
    [
        "id" => 1303, 
        "title" => "Third Blog Post", 
        "content" => "Content of the third blog post"
    ],
    [
        "id" => 1304, 
        "title" => "Fourth Blog Post", 
        "content" => "Content of the fourth blog post"
    ],
];

// some comment

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    
    if ($type === 'blog') {
        echo json_encode($posts);
        
    } elseif ($type === 'blogpost' && isset($_GET['nid'])) {
        $nid = (int)$_GET['nid'];
        $post = array_filter($posts, function ($p) use ($nid) {
            return $p['id'] === $nid;
        });
        
        if (!empty($post)) {
            echo json_encode(array_values($post)[0]);
        } else {
            echo json_encode(["error" => "Post not found"]);
        }
        
    } else {
        echo json_encode(["error" => "Invalid type parameter."]);
    }
    
} else {
    echo json_encode(["error" => "Invalid URL"]);
}
