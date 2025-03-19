<?php

namespace OpenAIBot\Api;

class ChatGPT
{
    private $apiKey = "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"; // API anahtarını buraya ekleyin

    public function sendMessage($message)
    {
        $url = "https://api.openai.com/v1/chat/completions";

        $data = [
            "model" => "gpt-4o",
            "messages" => [
                ["role" => "system", "content" => "Sen bir forum moderatörüsün. Kibar ve bilgilendirici cevaplar ver."],
                ["role" => "user", "content" => $message]
            ],
            "temperature" => 0.7
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n" .
                            "Authorization: Bearer " . $this->apiKey . "\r\n",
                "method" => "POST",
                "content" => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }
}
