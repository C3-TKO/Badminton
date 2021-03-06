<?php
/**
 *
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                    'label'         => 'Spielerauswahl',
                    'multiple'      => true,
                    'expanded'      => true,
                    'constraints'   => array(
                        new Count(array('min' => self::MIN_NUMBER_PLAYERS, 'minMessage' => 'Bitte wähle mindestens {{ limit }} Spieler aus'))
                    ),
                    'choice_label' => function ($player) {
                        return $player->getName();
                    }
                )
            )
            ->add('save', SubmitType::class, array(
                'label' => 'Spielplan erstellen',
                'attr'  => array('class' => 'btn btn-primary pull-right')
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