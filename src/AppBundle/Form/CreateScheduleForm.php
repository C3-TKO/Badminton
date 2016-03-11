<?php
/**
 *
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Count;

class CreateScheduleForm extends AbstractType {

    const NAME                  = 'create_schedule';
    const MIN_NUMBER_PLAYERS    = 4;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'player_list', EntityType::class, array(
                    'class'         => 'AppBundle:Player',
                    'property'      => 'name',
                    'label'         => 'Spielerauswahl',
                    'multiple'      => true,
                    'expanded'      => true,
                    'constraints'   => array(
                        new Count(array('min' => self::MIN_NUMBER_PLAYERS, 'minMessage' => 'Bitte wähle mindestens {{ limit }} Spieler aus'))
                    )
                )
            )
            ->add(
                'create_schedule', 'submit', array(
                    'label' => 'Spielplan erstellen',
                    'attr'  => array(
                        'class' => 'btn btn-primary pull-right')
                )
            );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return self::NAME;
    }
}