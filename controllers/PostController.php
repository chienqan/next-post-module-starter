<?php
namespace Plugins\PostManager;

// Disable direct access
if (!defined('APP_VERSION')) {
    die("Yo, what's up?");
}

/**
 * Index Controller
 */
class PostController extends \Controller
{
    /**
     * idname of the plugin for internal use
     */
    const IDNAME = 'post-manager';


    /**
     * Process
     */
    public function process()
    {
        $AuthUser = $this->getVariable("AuthUser");
        $Route = $this->getVariable("Route");
        $this->setVariable("idname", self::IDNAME);

        // Auth
        if (!$AuthUser) {
            header("Location: ".APPURL."/login");
            exit;
        } elseif ($AuthUser->isExpired()) {
            header("Location: ".APPURL."/expired");
            exit;
        }

        $user_modules = $AuthUser->get("settings.modules");
        if (!is_array($user_modules) || !in_array(self::IDNAME, $user_modules)) {
            // Module is not accessible to this user
            header("Location: ".APPURL."/post");
            exit;
        }
        $this->setVariable("user_modules", $user_modules);
        

        // Get account
        $Account = \Controller::model("Account", $Route->params->id);
        if (!$Account->isAvailable() ||
            $Account->get("user_id") != $AuthUser->get("id")) {
            header("Location: ".APPURL."/e/".self::IDNAME);
            exit;
        }
        $this->setVariable("Account", $Account);

        // Request handling
        if (\Input::request("action") == "create") {
            $this->create();
        } elseif (\Input::post("action") == "delete") {
            $this->delete();
        }

        $this->view(PLUGINS_PATH."/".self::IDNAME."/views/post.php", null);
    }
}
