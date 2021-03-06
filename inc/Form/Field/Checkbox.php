<?php
/**
 * Front End Accounts
 *
 * @category    WordPress
 * @package     FrontEndAccounts
 * @since       0.1
 * @author      Christopher Davis <http://christopherdavis.me>
 * @copyright   2013 Christopher Davis
 * @license     http://opensource.org/licenses/MIT MIT
 */

namespace Chrisguitarguy\FrontEndAccounts\Form\Field;

class Checkbox extends FieldBase implements FieldInterface
{
    const CHECK_ON  = 'on';

    /**
     * @see     Chrisguitarguy\FrontEndAccounts\Form\Field\FieldInterface::validate()
     */
    public function label()
    {
        // noop
    }

    /**
     * {@inheritdoc}
     * @see     Chrisguitarguy\FrontEndAccounts\Form\Field\FieldInterface::render();
     */
    public function render()
    {
        $attr = $this->getAdditionalAttributes();

        printf(
            '<label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" value="1" %2$s /> %3$s</label>',
            $this->escAttr($this->getName()),
            $this->arrayToAttr($attr),
            $this->escAttr($this->getArg('label', ''))
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getAdditionalAttributes()
    {
        $atts = parent::getAdditionalAttributes();

        if (static::CHECK_ON === $this->getValue()) {
            $atts['checked'] = 'checked';
        }

        return $atts;
    }
}
