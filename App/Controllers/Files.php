<?php
namespace App\Controllers;

use App\Models\File;

class Files extends BaseControllers
{
    public function index()
    {
        if ($this->session->isGuest()) {
            $this->redirect("/login");
        }

        $user = File::all();
        if (!isset($user)) {
            throw new \InvalidArgumentException("No users");
        }

        $files = File::where("user_id", $this->session->getUserId())
            ->get()
            ->toArray();

        $this->view->render(
            "userFilse",
            [
                "user" => $this->session->getUserId(),
                "data" => $files,
            ]
        );
    }
}
