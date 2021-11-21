<?php

namespace App\Model;

use App\Model\UserManager;

class VerificationProcess extends AbstractManager
{
    public function testInputVerificationInsert()
    {
        if (!empty($_POST)) {
            $items = [
                'name' => trim($_POST['name']),
            ];

            $errors = [];

            foreach ($items as $item) {
                if (empty($item)) {
                    $errors[] = "Merci de remplir les champs manquants";
                }
            }

            if (empty($errors)) {
                $userManager = new UserManager();
                $userManager->insert($items);
                header("Location: /");
            } else {
                return $errors;
            }
        }
    }
    public function testInputVerificationUpdate()
    {
        if (!empty($_POST)) {
            $items = [
                'id' => trim($_POST['id']),
                'name' => trim($_POST['name']),
            ];

            $errors = [];

            foreach ($items as $item) {
                if (empty($item)) {
                    $errors[] = "Merci de remplir les champs manquants";
                }
            }

            if (empty($errors)) {
                $userManager = new UserManager();
                $item = array_map('trim', $_POST);
                $userManager->update($item);
                header('Location: /');
            } else {
                return $errors;
            }
        }
    }
}
