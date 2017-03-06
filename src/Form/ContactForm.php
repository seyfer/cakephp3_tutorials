<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Mailer\MailerAwareTrait;
use Cake\Validation\Validator;

/**
 * Contact Form.
 */
class ContactForm extends Form
{
    use MailerAwareTrait;

    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema(Schema $schema)
    {
        $schema->addField('name', ['type' => 'string'])
               ->addField('email', ['type' => 'string']);

        return $schema;
    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        $validator->notEmpty('name')
                  ->email('email')
                  ->notEmpty('email');

        return $validator;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {
//        $email = new Email();
//
//        $email->setFrom('app@domain.com', 'Bookmarks')
//              ->setTo('me@domain.com', 'Me')
//              ->setTemplate('default', 'default')
//              ->setViewVars(['data' => $data])
//              ->send();

        $this->getMailer('ContactForm')->send('submission', [$data]);

        return true;
    }
}
