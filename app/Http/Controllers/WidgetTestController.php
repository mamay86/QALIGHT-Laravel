<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Widgets\Widget;
class WidgetTestController extends Controller
{
//     public function index(Widget $customServiceInstance)
//     {
//         dump($customServiceInstance->show());
//     }
//    public function index(Widget $customServiceInstance)
//    {
////         dump($customServiceInstance->show('tags'));
//        dump($customServiceInstance->show('categories'));
//    }
    public function index()
    {
        $post = \App\Post::find(1);

        foreach ($post->comments as $comment) {
            dump($comment->body);
        }
    }

}