<?php

namespace OpenAIBot;

use XF\AddOn\AbstractSetup;
use XF\Db\Schema\Create;

class Setup extends AbstractSetup
{
    public function install(array $stepParams = [])
    {
        // Eklenti kurulduğunda yapılacak işlemler buraya yazılır.
    }

    public function upgrade(array $stepParams = [])
    {
        // Eğer bir güncelleme gelirse, veritabanı değişiklikleri buraya eklenir.
    }

    public function uninstall(array $stepParams = [])
    {
        // Eklenti kaldırıldığında yapılacak işlemler buraya yazılır.
    }
}
