<?php

/**
 * Created by PhpStorm.
 * User: benja
 * Date: 09/11/15
 * Time: 22:33
 */

namespace MicroCMS\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('content', 'textarea');
    }

    public function getName() {
        return 'comment';
    }
}