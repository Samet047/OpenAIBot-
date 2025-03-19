<?php

namespace OpenAIBot;

use XF\Entity\Thread;
use XF\Entity\Post;
use XF\Mvc\Entity\Entity;
use OpenAIBot\Api\ChatGPT;

class Listener
{
    public static function onNewThread(Entity $thread)
    {
        // Konunun gerçekten yeni olup olmadığını kontrol et
        if (!($thread instanceof Thread) || $thread->isInsert() === false) {
            return;
        }

        // ChatGPT API çağrısı
        $chatGPT = new ChatGPT();
        $response = $chatGPT->sendMessage($thread->title);

        if (!empty($response['choices'][0]['message']['content'])) {
            $replyContent = $response['choices'][0]['message']['content'];

            // Yeni bir yanıt (post) oluştur
            $post = $thread->getFirstPost();
            $postReply = $thread->getNewPost();
            $postReply->message = $replyContent;
            $postReply->user_id = 1; // Admin veya botun kullanıcı ID'si
            $postReply->save();
        }
    }
}
