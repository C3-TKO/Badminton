<?php
/**
 *
 */

namespace AppBundle\Form;

/**
 * @TDODO Add a constraint to checks that all players are unique 
 */

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

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
                    'label'         => 'Punkte Team 1',
                    'constraints'   => array(
                        new NotBlank(
                            array(
                              'message' => 'Bitte trage ein Ergebnis für Team 1 ein')
                        ),
                        new Range(
                            array(
                                'min'               => 0,
                                'max'               => 30,
                                'minMessage'        => 'Das Ergebnis kann nicht schlechter als {{ limit }} sein!',
                                'maxMessage'        => 'Das Ergebnis kann nicht besser als {{ limit }} sein!',
                                'invalidMessage'    => 'Bitte trage nur Zahlen ein'
                            )
                        )
                    )
                )
            )
            ->add(
                'score_team_b', 'text', array(
                    'label'         => 'Punkte Team 2',
                    'constraints'   => array(
                        new NotBlank(
                            array(
                                'message' => 'Bitte trage ein Ergebnis für Team 2 ein')
                        ),
                        new Range(
                            array(
                                'min'               => 0,
                                'max'               => 30,
                                'minMessage'        => 'Das Ergebnis kann nicht schlechter als {{ limit }} sein!',
                                'maxMessage'        => 'Das Ergebnis kann nicht besser als {{ limit }} sein!',
                                'invalidMessage'    => 'Bitte trage nur Zahlen ein'
                            )
                        )
                    )
                )
            )
            ->add(
                'create_schedule', 'submit', array(
                'label' => 'Ergebnis eintragen',
                'attr'  => array(
                    'class' => 'btn btn-primary pull-right'
                )
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