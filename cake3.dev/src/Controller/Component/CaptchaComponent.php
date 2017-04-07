<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class CaptchaComponent extends Component
{

    public function getCaptchaImage()
    {
        // get access to the current controller
        $controller = $this->_registry->getController();

        // get session handler
        $session = $controller->request->session();

        // generate a random captcha number
        $num = rand('100', '999');

        // save captcha number to session
        $session->write('captcha', $num);

        // create captcha image
        $img   = imagecreate('50', '15');
        $back  = imagecolorallocate($img, 247, 247, 239);
        $black = imagecolorallocate($img, 139, 69, 19);
        imagestring($img, 35, 15, 0, $num, $black);

        Header("Content-type: image/png");
        imagepng($img);
        imageDestroy($img);
    }

}
