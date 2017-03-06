<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * ContactForm mailer.
 */
class ContactFormMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'ContactForm';

    public function submission(array $data)
    {
        return $this->from('app@domain.com', 'Bookmarks')
                    ->setTo('me@domain.com', 'Me')
                    ->setLayout('contact_form')
                    ->setTemplate('default')
//                    ->message('Test !!!')
                    ->set(['data' => $data]);
    }
}
