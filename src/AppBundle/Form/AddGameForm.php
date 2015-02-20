<?php
/**
 *
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

const NAME = 'create_schedule';
const MIN_NUMBER_PLAYERS = 4;

class AddGameForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'pata', 'entity', array(
                    'class'         => 'AppBundle:Player',
                    'property'      => 'name',
                    'label'         => 'Spieler 1 Team 1'
                )
            )
            ->add(
                'pbta', 'entity', array(
                    'class'         => 'AppBundle:Player',
                    'property'      => 'name',
                    'label'         => 'Spieler 2 Team 1'
                )
            )
            ->add(
                'patb', 'entity', array(
                    'class'         => 'AppBundle:Player',
                    'property'      => 'name',
                    'label'         => 'Spieler 1 Team 2'
                )
            )
            ->add(
                'pbtb', 'entity', array(
                    'class'         => 'AppBundle:Player',
                    'property'      => 'name',
                    'label'         => 'Spieler 2 Team 2'
                )
            )
            ->add(
                'score_team_a', 'text', array(
                    'label' => 'Punkte Team 1',

                )
            )
            ->add(
                'score_team_b', 'text', array(
                    'label' => 'Punkte Team 2',
                                    )
            )
            ->add(
                'create_schedule', 'submit', array(
                'label' => 'Ergebnis eintragen',
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
        return NAME;
    }
}