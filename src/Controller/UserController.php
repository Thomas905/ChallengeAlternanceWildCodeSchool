<?php

namespace App\Controller;

use App\Model\UserManager;
use App\Model\VerificationProcess;

class UserController extends AbstractController
{
    public function index()
    {
        $userManager = new UserManager();
        $user = $userManager->selectAll();
        $errors = [];
        if (!empty($_POST)) {
            $verificationProcess = new VerificationProcess();
            $errors = $verificationProcess->testInputVerificationInsert();
        }

        return $this->twig->render('Home/index.html.twig', ['users' => $user, 'errors' => $errors]);
    }

    public function delete()
    {
        $userManager = new UserManager();
        $id = trim($_GET['id']);

        if (false == $id) {
            header("Location: /");
            return "";
        }
        $userManager->delete(intval($id));
        header("Location: /");
        return $this->twig->render('Delete/index.html.twig');
    }


    public function edit(int $id = 0): string
    {
        $userManager = new UserManager();
        $user = $userManager->selectOneById($id);

        if (false === $user) {
            header("Location: /");
            return "";
        }

        $errors = [];
        if (!empty($_POST)) {
            $verificationProcess = new VerificationProcess();
            $errors = $verificationProcess->testInputVerificationUpdate();
        }

        return $this->twig->render('edit/index.html.twig', ['user' => $user, 'errors' => $errors]);
    }


    public function searchbar(string $name = "")
    {
        $userManager = new UserManager();
        $users = $userManager->selectByUnCompleteUser($name);
        return $this->twig->render('Home/_argo.html.twig', ['users' => $users,]);
    }
}
