<?php
namespace App\View\Helper;

use App\Model\Entity\Bookmark;
use Cake\View\Helper;

/**
 * Bookmark helper
 *
 * @property Helper\HtmlHel per Html
 */
class BookmarkHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function url(Bookmark $bookmark)
    {
        /** @var $this->Html HtmlHelper */
        return $this->Html->link($bookmark->url, $bookmark->url, [
            'title'  => $bookmark->title,
            'target' => '_blank',
        ]);
    }
}
