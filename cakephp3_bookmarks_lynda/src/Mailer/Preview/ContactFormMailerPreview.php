<?php
declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/6/17
 */

namespace App\Mailer\Preview;


use DebugKit\Mailer\MailPreview;

class ContactFormMailerPreview extends MailPreview
{
    public function submission()
    {
        return $this->getMailer('ContactForm')->submission(['test' => 'foo']);
    }
}